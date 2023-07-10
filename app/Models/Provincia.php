<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $primaryKey = 'provincia_id';
    protected $table = 'provincias';

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
    
    public function comuna()
    {
        return $this->hasMany(Comuna::class, 'provincia_id');
    }
    

    


}