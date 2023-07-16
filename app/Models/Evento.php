<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    static $rules = [

       'id' => 'required',
       /*'local_id' => 'required',
        'banda_id' => 'required',
        'start' => 'required',
        'end' => 'required', */
    ]; 


    protected $fillable=['id','local_id','banda_id','start','end'];
    protected $primaryKey = 'id';
    protected $table = 'eventos';
    
    public function local()
    {
        return $this->hasMany(Local::class);
    }

    public function detallesEquipamiento()
    {
        return $this->hasMany(DetalleEquipamiento::class);
    }

}