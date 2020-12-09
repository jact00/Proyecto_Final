<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'movimiento_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'movimiento_id',
    ];

    public function movimiento()
    {
    	return $this->belongsTo('App\Models\Movimiento');
    }

    public function devoluciones()
    {
    	return $this->hasMany('App\Models\Devolucion', 'prestamo_id', 'movimiento_id');
    }
}
