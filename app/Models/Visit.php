<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'purpose',
        'location',
        'is_active',
        'user_id'
    ];

    public function contact ()
    {
        return $this->hasMany(Contact::class);
    }


}
