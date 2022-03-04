<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['categoria'];

    public function question() {
        return $this->belongsTo('App\Models\Question', 'id', 'id_categoria');
    }
}
