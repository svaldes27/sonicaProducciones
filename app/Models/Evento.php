<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'evento';

    public $timestamps = false;
    
    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
        //return $this->hasMany(Local::class);
    }

    public function banda()
    {
        return $this->belongsTo(Banda::class, 'banda_id');
        //return $this->hasMany(Banda::class);
    }

    public function equipamiento()
    {
        return $this->belongsTo(Equipamiento::class, 'detalleEquipamiento_id');
    }

}
