<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'descricao',
        'ativo',
    ];

    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class);
    }
}
