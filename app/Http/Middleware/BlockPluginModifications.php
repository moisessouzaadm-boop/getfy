<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware para bloquear modificações de plugins (enable, disable, uninstall, install).
 * 
 * Retorna um erro 403 (Forbidden) quando um usuário tenta:
 * - Ativar um plugin
 * - Desativar um plugin
 * - Desinstalar/Excluir um plugin
 * - Instalar um plugin
 */
class BlockPluginModifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Bloqueia as rotas de modificação de plugins
        return response()->json([
            'message' => 'Operações de gerenciamento de plugins estão bloqueadas.',
            'error' => 'forbidden',
        ], 403);
    }
}
