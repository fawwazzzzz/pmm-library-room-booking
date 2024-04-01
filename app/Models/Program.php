<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProgram';
    public $incrementing = false;
    protected $table = 'program';
    protected $guarded = [];
    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
