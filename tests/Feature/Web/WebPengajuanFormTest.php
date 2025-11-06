<?php

namespace Tests\Feature\Web;

use App\Models\JenisSurat;
use App\Models\Role;
use App\Models\UserDesa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WebPengajuanFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::factory()->create(['nama_role' => 'warga']);
        Role::factory()->create(['nama_role' => 'admin']);

        Route::middleware('web')->group(base_path('routes/web.php'));
    }

    public function test_warga_can_submit_pengajuan_via_web_form()
    {
        Storage::fake('public');

        $jenisSurat = JenisSurat::factory()->create([
            'form_structure' => json_encode([
                ['name' => 'nama', 'label' => 'Nama Lengkap', 'type' => 'text', 'required' => true],
                ['name' => 'nik', 'label' => 'NIK', 'type' => 'text', 'required' => true],
            ]),
            'syarat' => ['KTP', 'KK'],
        ]);

        $warga = UserDesa::factory()->create([
            'role_id' => Role::where('nama_role', 'warga')->first()->id,
            'nik' => '1234567890123456',
            'nama' => 'Warga Pengajuan',
        ]);

        $this->actingAs($warga, guard: 'web');

        $payload = [
            'jenis_surat_id' => $jenisSurat->id,
            'agree_terms' => 'on',
            'data_pemohon' => [
                'nama' => 'Warga Pengajuan',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. Pengajuan Web',
                'no_hp' => '081234567890',
            ],
            'keterangan' => 'Pengajuan surat melalui form web.',
            'dokumen_1' => UploadedFile::fake()->create('ktp.pdf', 120, 'application/pdf'),
        ];

        $response = $this->post(route('pengajuan.create.post'), $payload);

        $response->assertRedirect(route('warga.dashboard'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pengajuan_surat', [
            'nik_pemohon' => '1234567890123456',
            'jenis_surat_id' => $jenisSurat->id,
            'status' => 'menunggu',
        ]);
    }
}