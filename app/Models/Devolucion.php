<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'devoluciones';
    protected $primaryKey = 'movimiento_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'movimiento_id',
        'prestamo_id'
    ];

    public function movimiento()
    {
    	return $this->belongsTo('App\Models\Movimiento');
    }

    public function prestamo()
    {
    	return $this->belongsTo('App\Models\Prestamo', 'movimiento_id', 'prestamo_id');
    }
}

