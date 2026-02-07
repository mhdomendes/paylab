<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'item_pedidos';

    protected $fillable = [
        'pedido_id',
        'gift_card_id',
        'quantidade',
        'valor_unitario',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function giftCard()
    {
        return $this->belongsTo(GiftCard::class);
    }
}

