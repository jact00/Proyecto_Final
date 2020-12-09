<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ejemplar extends Model
{
    use HasFactory;

    protected $primaryKey = ['isbn', 'numero'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'ejemplares';
    public $timestamps = false;

    protected $fillable = [
    	'isbn','numero', 'en_prestamo',
    ];

    protected $attributes = [
        'en_prestamo' => 0,
    ];

    protected $casts = [
        'en_prestamo' => 'boolean',
    ];

    public function libro()
    {
        return $this->belongsTo('App\Models\Libro', 'isbn', 'isbn');
    }
}
