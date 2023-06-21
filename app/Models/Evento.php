<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'eventos';
    
    public function local()
    {
        return $this->hasMany(Local::class);
    }

    public function detalleEquipamiento()
    {
        //return $this->hasMany(Equipamiento::class);
    }

    public function banda()
    {
        //return $this->hasMany(Banda::class);
    }
}
