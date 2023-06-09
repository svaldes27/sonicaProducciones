<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamiento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'equipamiento';
    
    public function detalleEquipamiento()
    {
        return $this->hasOne(DetalleEquipamiento::class);
    }

}
