<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable=[
        'titulo',
        'descricao',
        'data'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
