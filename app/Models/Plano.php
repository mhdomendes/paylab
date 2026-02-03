<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'slug', 'preco', 'intervalo'];

    public function assinaturas()
    {
        return $this->hasMany(Assinatura::class);
    }
}
