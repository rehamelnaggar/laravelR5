<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
use App\Models\City; // تم استيراد نموذج City
=======
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3

class Client extends Model
{
    use HasFactory, SoftDeletes;
<<<<<<< HEAD

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
=======
    protected $fillable = ['clientName',
                                'phone',
                                'email',
                              'website',
                                 'city',
                               'active',
                                'image'];

>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
}