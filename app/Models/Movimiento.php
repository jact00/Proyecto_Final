<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'alumno_id',
        'operador_id',
    ];

    protected $attributes = [
    	'es_prestamo' => 1,
    ];

    protected $casts = [
    	'es_prestamo' => 'boolean',
    ];

    public function prestamo()
    {
    	return $this->hasOne('App\Models\Prestamo');
    }

    public function devolucion()
    {
    	return $this->hasOne('App\Models\Devolucion');
    }

    public function alumno()
    {
    	return $this->belongsTo('App\Models\Alumno', 'user_id', 'alumno_id');
    }

    public function operador()
    {
    	return $this->belongsTo('App\Models\Operador', 'user_id', 'operador_id');
    }

    public function ejemplares()
    {
        return $this->belongsToMany('App\Models\Ejemplar');
    }
}
