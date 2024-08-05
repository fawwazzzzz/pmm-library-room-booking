<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    protected $primaryKey = "monthID";
    public $incrementing = false;
    protected $table = 'month';
    protected $guarded = [];

    public function reservations() {

        return $this->hasMany(Reservation::class);
    }
}
