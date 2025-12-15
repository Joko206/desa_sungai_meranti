<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogPerubahan extends Model
{
    protected $table = 'log_perubahan';
    protected $fillable = [
        'user_id',
        'model',
        'model_id',
        'action',
        'before',
        'after',
    ];
}
