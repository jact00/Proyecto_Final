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
    
    public function alumno()
    {
    	return $this->belongsTo('App\Models\Alumno', 'alumno_id', 'user_id');
    }

    public function operador()
    {
    	return $this->belongsTo('App\Models\Operador', 'operador_id', 'user_id');
    }

    public function ejemplares()
    {
        return $this->belongsToMany('App\Models\Ejemplar')->as('prestamo')->withPivot('fecha_devolucion');
    }

    public function ejemplares_en_prestamo()
    {
        return $this->belongsToMany('App\Models\Ejemplar')->withPivot('fecha_devolucion')->wherePivot('fecha_devolucion',null);
    }
}
