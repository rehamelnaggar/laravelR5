<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City; 

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'clientName',
        'phone',
        'email',
        'website',
        'address',
        'city_id',
        'active',
        'image'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}