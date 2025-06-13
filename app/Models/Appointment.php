<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'patient_id',
        'room_id',
        'number',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
