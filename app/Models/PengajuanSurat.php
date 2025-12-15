<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $table = 'pengajuan_surat';
    protected $fillable = [
        'nik_pemohon','jenis_surat_id','tanggal_pengajuan','status',
        'data_isian','file_syarat','alasan_penolakan','tanggal_selesai'
    ];

    protected $casts = [
        'data_isian' => 'array',
        'file_syarat' => 'array',
        'tanggal_pengajuan' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pemohon()
    {
        return $this->belongsTo(UserDesa::class, 'nik_pemohon', 'nik');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function suratTerbit()
    {
        return $this->hasOne(SuratTerbit::class, 'pengajuan_id');
    }

    // Log perubahan otomatis
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            \App\Models\LogPerubahan::create([
                'user_id' => auth()->id(),
                'model' => self::class,
                'model_id' => $model->id,
                'action' => 'created',
                'before' => null,
                'after' => json_encode($model->getAttributes()),
            ]);
        });

        static::updating(function ($model) {
            $original = $model->getOriginal();
            \App\Models\LogPerubahan::create([
                'user_id' => auth()->id(),
                'model' => self::class,
                'model_id' => $model->id,
                'action' => 'updated',
                'before' => json_encode($original),
                'after' => json_encode($model->getDirty()),
            ]);
        });

        static::deleted(function ($model) {
            \App\Models\LogPerubahan::create([
                'user_id' => auth()->id(),
                'model' => self::class,
                'model_id' => $model->id,
                'action' => 'deleted',
                'before' => json_encode($model->getAttributes()),
                'after' => null,
            ]);
        });
    }
}
