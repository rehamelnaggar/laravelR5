<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
<<<<<<< HEAD
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'studentName',
        'age',
        'active',
        'image'
    ];

    
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_student', 'student_id', 'client_id');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_student', 'student_id', 'city_id');
    }
=======
    use HasFactory,SoftDeletes;
    protected $fillable = ['studentName',
                                   'age',
                                'active',
                                 'image'];
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
}