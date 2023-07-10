<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEquipamiento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detalle_equipamiento';
    
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function equipamiento()
    {
        return $this->belongsTo(Equipamiento::class);
    }


}
