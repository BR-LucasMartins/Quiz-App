<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'options', 'correct_answer', 'id_categoria', 'difficulty'];

    public function categoria(){
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }
}
