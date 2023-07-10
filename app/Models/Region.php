<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $primaryKey = 'region_id';
    protected $table = 'regiones';

    public function provincia()
    {
        return $this->hasMany(Provincia::class, 'region_id');
    }
    


}