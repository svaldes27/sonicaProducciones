<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'banda';
    public $timestamps = false;

    public function representante()
    {
        //return $this->hasMany(Representante::class);
    }

    public function evento()
    {
        //return $this->hasMany(Evento::class);
    }
}
