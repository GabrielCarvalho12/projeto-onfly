<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{
    protected $table ='despesas';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'descricao', 'data', 'usuario', 'valor'];
}
