<template>
    <AppHeader title="Contratos" />

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div
            class="p-4 border-b border-slate-200 flex flex-col sm:flex-row gap-4 justify-between items-center bg-white">
            <div class="relative w-full sm:w-80 group">
                <iconify-icon icon="solar:magnifer-linear"
                    class="absolute left-3 top-2.5 text-slate-400 group-focus-within:text-purple-600 transition-colors"
                    width="18"></iconify-icon>
                <input type="text" placeholder="Buscar por cliente, ID ou nome..."
                    class="w-full pl-10 pr-4 py-2 text-sm bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all placeholder:text-slate-400 text-navy">
            </div>
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <div class="relative">
                    <select
                        class="appearance-none bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 block w-full pl-3 pr-10 py-2 cursor-pointer hover:border-slate-300 transition-colors">
                        <option>WIP</option>
                    </select>
                    <iconify-icon icon="solar:alt-arrow-down-linear"
                        class="absolute right-3 top-3 text-slate-400 pointer-events-none" width="14"></iconify-icon>
                </div>
                <button
                    class="p-2 text-slate-500 hover:text-navy hover:bg-slate-100 rounded-lg transition-colors border border-transparent hover:border-slate-200">
                    <iconify-icon icon="solar:filter-linear" width="20" stroke-width="1.5"></iconify-icon>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider text-slate-500">ID Contrato
                        </th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider text-slate-500">Cliente</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider text-slate-500">Data Criação
                        </th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider text-slate-500 text-right">
                            Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="contract in contracts" :key="contract.id"
                        class="group hover:bg-slate-50 transition-colors cursor-pointer"
                        @click="router.visit(`/contracts/details/${contract.id}`)">
                        <td class=" px-6 py-4 text-sm font-medium text-navy font-mono">{{ contract.contract_number }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ contract.client_name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ contract.start_date }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20">
                                {{ contract.status.toUpperCase() }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div
                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="text-slate-400 hover:text-purple-600 transition-colors p-1"
                                    title="Visualizar">
                                    <iconify-icon icon="solar:eye-linear" width="18"></iconify-icon>
                                </button>
                                <button class="text-slate-400 hover:text-navy transition-colors p-1" title="Baixar PDF">
                                    <iconify-icon icon="solar:download-minimalistic-linear" width="18"></iconify-icon>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- ainda nao funciona -->
        <div class="px-6 py-3 border-t border-slate-200 flex items-center justify-between">
            <span class="text-xs text-slate-500">Mostrando 1-3 de 124 resultados - NÃO FUNCONA :/</span>
            <div class="flex gap-1">
                <button class="px-2 py-1 text-xs border border-slate-200 rounded text-slate-500 disabled:opacity-50"
                    disabled>Ant</button>
                <button
                    class="px-2 py-1 text-xs border border-slate-200 rounded text-slate-500 hover:bg-slate-50">Próx</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage, router } from '@inertiajs/vue3'
defineProps({
    contracts: Array
});
</script>