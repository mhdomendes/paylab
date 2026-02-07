<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'pedido_id',
        'status',
        'metodo',
        'valor',
        'gateway_id',
        'pago_em',
    ];

    protected $casts = [
        'pago_em' => 'datetime',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}