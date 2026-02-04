<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contract;
use App\Models\Template;


class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user || !$user->company_id) {
            return Inertia::render('Home', [
                'stats' => ['active' => 0, 'pending' => 0, 'expiring' => 0],
                'recentContracts' => [],
                'ganttContracts' => [],
                'quickTemplates' => [],
            ]);
        }

        $companyId = $user->company_id;
        $now = now();
        $sixMonthsFromNow = now()->addMonths(6);

        // 1. Estatísticas (mantido)
        $stats = [
            'active' => Contract::where('contract_company_owner_id', $companyId)->where('contract_status_id', 2)->count(),
            'pending' => Contract::where('contract_company_owner_id', $companyId)->where('is_signed', false)->count(),
            'expiring' => Contract::where('contract_company_owner_id', $companyId)->whereBetween('end_date', [$now, $now->addDays(30)])->count(),
        ];

        // 2. Contratos para a TABELA (3 mais recentes por start_date)
        $recentContracts = Contract::where('contract_company_owner_id', $companyId)
            ->whereNotNull('start_date')
            ->orderBy('start_date', 'desc')
            ->take(3)
            ->get();

        // 3. Contratos para o GANTT (Janela de 6 meses a partir de hoje)
        // Filtra contratos onde o início OU o fim cai nos próximos 6 meses
        $ganttContracts = Contract::where('contract_company_owner_id', $companyId)
            ->where(function ($query) use ($now, $sixMonthsFromNow) {
                $query->whereBetween('start_date', [$now, $sixMonthsFromNow])
                    ->orWhereBetween('end_date', [$now, $sixMonthsFromNow]);
            })
            ->get()
            ->map(fn($contract) => [
                'id' => $contract->id,
                'contract_number' => $contract->contract_number,
                'client_name' => $contract->client_name,
                'start_date' => $contract->start_date,
                'end_date' => $contract->end_date,
                'is_signed' => (bool) $contract->is_signed,
            ]);

        $quickTemplates = Template::with('ContractType')->take(2)->get();

        return Inertia::render('Home', [
            'stats' => $stats,
            'recentContracts' => $recentContracts,
            'ganttContracts' => $ganttContracts,
            'quickTemplates' => $quickTemplates
        ]);
    }

}
