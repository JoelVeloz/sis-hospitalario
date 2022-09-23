<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    // Atributos permitidos por assignacion masiv
    protected $fillable = [
        'name',
        'lastname',
        'identification',
        'birthdate',
        'phone',
        'address',
        'email',
        'gender',
        'age',
    ];


    // Relacion uno a muchos - Record
    public function records()
    {
        return $this->hasMany(Record::class);
    }

    // Relacion uno a muchos - Appointment
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
