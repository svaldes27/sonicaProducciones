<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'locals';
    

    public function users()
    {
        //return $this->hasMany(User::class);
    }

    public function ciudad()
    {
        //return $this->hasMany(Ciudad::class);
    }

    public function region()
    {
        //return $this->hasMany(Region::class);
    }

    public function evento()
    {
        //return $this->hasMany(Evento::class);
    }
}
