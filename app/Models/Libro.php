<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'isbn';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $attributes = [
    	'autor' => 'anonimo',
    ];

    protected $fillable = [
    	'isbn', 
        'nombre', 
        'autor', 
        'editorial', 
        'edicion', 
        'anio', 
        'paginas', 
        'categoria_id'
    ];

    public function ejemplares()
    {
        return $this->hasMany('App\Models\Ejemplar', 'isbn');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function setNombreAttribute ($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

    public function setAutorAttribute ($value)
    {
        $this->attributes['autor'] = ucwords(strtolower($value));
    }

    public function setEditorialAttribute ($value)
    {
        $this->attributes['editorial'] = ucwords(strtolower($value));
    }
}
