<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'contact_name',
        'city',
        'zipcode',
        'state',
        'district',
        'phone',
        'email',
        'user_id',
        'is_active'
    ];

    public function visit()
    {
        return $this->hasMany(Visit::class);
    }

}
