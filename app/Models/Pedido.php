<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'total',
        'criado_em',
    ];

    protected $casts = [
        'criado_em' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedido::class);
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}