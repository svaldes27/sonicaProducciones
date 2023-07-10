<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

    protected $primaryKey = 'comuna_id';
    protected $table = 'comunas';


    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
    

}
