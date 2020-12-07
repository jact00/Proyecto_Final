<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $primaryKey = 'isbn';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $attributes = [
    	'autor' => 'anonimo',
    ];

    protected $fillable = [
    	'isbn', 'nombre', 'autor', 'editorial', 'edicion', 'anio', 'paginas'
    ];

    public function ejemplares()
    {
        return $this->hasMany('App\Models\Ejemplar', 'isbn', 'isbn');
    }
}
