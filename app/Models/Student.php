<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
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
}