<?php

namespace Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id';

    public function book()
    {
        return $this->hasMany('\Blog\Models\Book','idCategoria', 'id');
    }
    
}
