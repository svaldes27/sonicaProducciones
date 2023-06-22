<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'detalle_representante';

    protected $fillable = ['nombre', 'email', 'contacto'];
}

