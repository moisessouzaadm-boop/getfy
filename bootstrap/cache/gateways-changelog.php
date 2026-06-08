<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CHANGELOG: Alterações implementadas em gateways
    | Gerado automaticamente pelo sistema
    | Data: 2026-06-08
    |--------------------------------------------------------------------------
    */
    
    'version' => '1.0.0',
    'timestamp' => 1717933577,
    
    'changes' => [
        [
            'date' => '2026-06-08T02:18:43Z',
            'commit' => 'f96b04c32c72bda3bfccf4e65ac4c5310197b3eb',
            'title' => 'feat: Configuração centralizada de gateways - apenas CajuPay e Asaas habilitados com URLs customizadas',
            'files' => [
                'config/gateways.php',
            ],
            'description' => 'Desativados todos os gateways exceto CajuPay e Asaas. URLs de cadastro atualizadas. Ordem de redundância simplificada.',
            'changes' => [
                'Gateways removidos: Spacepag, Efí, Stripe, Mercado Pago, Pushin Pay, Pagar.me',
                'Gateways mantidos: CajuPay e Asaas apenas',
                'CajuPay signup_url: https://cajupay.com.br/registro?ref=596d6c91fe',
                'Asaas signup_url: https://www.asaas.com/r/2617ea23-f001-4a8e-8413-2eb1a5f5145c',
                'Redundância PIX: [cajupay, asaas]',
                'Redundância Cartão: [cajupay, asaas]',
                'Redundância Boleto: [asaas]',
            ],
        ],
        [
            'date' => '2026-06-08T02:23:51Z',
            'commit' => 'ac820d4f5cae90f8c0458ac6fa828b8bdd94b18c',
            'title' => 'fix: Bloquear registro de gateways por plugins - apenas CajuPay e Asaas permitidos',
            'files' => [
                'app/Gateways/GatewayRegistry.php',
            ],
            'description' => 'Implementada whitelist rigorosa em GatewayRegistry para bloquear plugins de registrarem ou modificarem gateways.',
            'changes' => [
                'Whitelist de slugs: apenas cajupay e asaas permitidos',
                'Bloqueio de sobreescrita: plugins não podem modificar gateways core',
                'Logging de tentativas: todas as tentativas não autorizadas são registradas',
                'Método all() atualizado: retorna apenas gateways do config (sem plugins)',
            ],
        ],
        [
            'date' => '2026-06-08T02:26:17Z',
            'commit' => '3dc50a30154ddfcb1a9bc8cede0ff5264bc29e6f',
            'title' => 'cache: Registro centralizado de configurações de gateways em bootstrap',
            'files' => [
                'bootstrap/cache/gateways.php',
            ],
            'description' => 'Cache centralizado com configurações autorizadas de gateways para acesso rápido em tempo de boot.',
            'changes' => [
                'Allowed gateways: cajupay, asaas',
                'Blocked gateways: spacepag, sapcepag, efi, stripe, mercadopago, pushinpay, pagarme',
                'URLs customizadas armazenadas em cache',
                'Cache version: 1.0',
            ],
        ],
    ],
    
    'security_notes' => [
        'Plugins não podem registrar novos gateways',
        'Plugins não podem modificar gateways existentes',
        'Apenas CajuPay e Asaas estão habilitados',
        'Todas as tentativas de bypass são registradas em logs',
        'Configuração centralizada garante consistência entre execuções',
    ],
];
