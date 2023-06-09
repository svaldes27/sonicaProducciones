<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'local';
    public $timestamps = false;

    public function comuna(){

    return $this->belongsTo(Comuna::class, 'comuna_id');
    }
    
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


}