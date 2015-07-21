<?php

namespace Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    public function categoria()
    {
        return $this->belongsTo('\Blog\Models\Categoria', 'idCategoria' , 'id');
    }

	public $timestamps = false;

    protected $fillable=[
        'isbn',
        'titulo',
        'autor',
        'publicacion',
        'imagen',
        'idCategoria'
    ];

    public static $rules = array(
        'isbn'             => 'required',                        // just a normal required validation
        'titulo'            => 'required',     // required and must be unique in the ducks table
        'autor'         => 'required',
        'publicacion' => 'required',
        'imagen' => 'required' ,          // required and has to match the password field
        'idCategoria' => 'required'           // required and has to match the password field
    );

    public static $messages = array(
        'required' => 'The :attribute is really really really important.',
        'same'  => 'The :others must match.'
    );
}
