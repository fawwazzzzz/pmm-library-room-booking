<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'tempahan';
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomID');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'idJabatan');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'idProgram');
    }
}
