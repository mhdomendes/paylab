<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    protected $fillable = ['usuario_id', 'plano_id', 'status', 'termina_em'];

    public function usuario()
    {
        return $this->belongsTo(user::class, 'usuario_id');
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

}
