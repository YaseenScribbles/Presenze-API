<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'location',
        'created_at'
    ];

    public $timestamps = false;

    protected $table = 'check_in';

}
