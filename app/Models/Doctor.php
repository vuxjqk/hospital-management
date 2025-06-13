<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'full_name',
        'room_id',
        'role',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
