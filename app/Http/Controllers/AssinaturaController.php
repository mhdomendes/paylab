<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\Assinatura;

class AssinaturaController extends Controller
{
    public function assinar(Request $request)
    {
        $plano = Plano::findOrFail($request->plano_id);

        Assinatura::updateOrCreate(
            ['usuario_id' => auth()->id()],
            [
                'plano_id' => $plano->id,
                'status' => 'ativa'
            ]
        );

        return redirect()->route('dashboard')
            ->with('success', 'Assinatura ativada com sucesso!');
    }

    public function cancelar()
    {
        $assinatura = auth()->user()->assinatura;

        $assinatura->update([
            'status' => 'cancelada',
            'termina_em' => now()
        ]);

        return back()->with('success', 'Assinatura cancelada.');
    }
}
