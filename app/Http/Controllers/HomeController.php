<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Contract;
use App\Models\Template;


class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login.index');
        }

        $companyId = $user->company_id ?? null;

        // Se o usuário não tiver company_id, pode exibir mensagem ou redirecionar
        if (!$companyId) {
            return Inertia::render('Home', [
                'stats' => [],
                'recentContracts' => [],
                'quickTemplates' => [],
                'error' => 'Nenhuma empresa associada ao usuário.'
            ]);
        }

        $stats = [
            'active' => Contract::where('contract_company_owner_id', $companyId)
                ->where('contract_status_id', 2)->count(),
            'pending' => Contract::where('contract_company_owner_id', $companyId)
                ->where('is_signed', false)->count(),
            'expiring' => Contract::where('contract_company_owner_id', $companyId)
                ->whereBetween('end_date', [now(), now()->addDays(30)])->count(),
        ];

        $recentContracts = Contract::where('contract_company_owner_id', $companyId)
            ->latest()
            ->take(5)
            ->get();

        $quickTemplates = Template::with('ContractType')->take(2)->get();

        return Inertia::render('Home', [
            'stats' => $stats,
            'recentContracts' => $recentContracts,
            'quickTemplates' => $quickTemplates
        ]);
    }

}
