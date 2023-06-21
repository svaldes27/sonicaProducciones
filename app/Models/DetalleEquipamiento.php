<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEquipamiento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detalle_equipamiento';
    
    public function equipamiento()
    {
        //return $this->hasMany(Equipamiento::class);
    }

    public function banda()
    {
        //return $this->hasMany(Banda::class);
    }
}
