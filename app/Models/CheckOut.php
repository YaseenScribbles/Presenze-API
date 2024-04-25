<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'location',
        'created_at',
        'is_active'
    ];

    public $timestamps = false;

    protected $table = 'check_out';

}
