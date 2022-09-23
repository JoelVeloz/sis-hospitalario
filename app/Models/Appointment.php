<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Atributos permitidos por assignacion masiv
    protected $fillable = [
        'status',
        'date',
        'record_id',
        'doctor_id',
        'patient_id',
    ];

    // Relacion uno a muchos inversa - Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    // Relacion uno a muchos inversa - Doctor
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    // Relacion uno a muchos inversa - Record
    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
