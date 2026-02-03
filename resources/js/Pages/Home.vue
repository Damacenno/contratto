<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    stats: Object,
    recentContracts: Array,
    quickTemplates: Array
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};

</script>

<template>

    <Head title="Dashboard" />

    <div class="p-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <header class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600">Bem-vindo, <span class="font-semibold">{{ $page.props.auth.user.name }}</span>
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Contratos Ativos</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.active }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Aguardando Assinatura</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.pending }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Expirando em 3 Dias</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.expiring }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h3 class="font-bold text-gray-700">Contratos Recentes</h3>
                        <Link href="/contracts" class="text-sm text-indigo-600 hover:underline">Ver todos</Link>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                            <tr>
                                <th class="px-6 py-3">Número</th>
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Vencimento</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="contract in recentContracts" :key="contract.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">#{{ contract.contract_number }}</td>
                                <td class="px-6 py-4">{{ contract.client_name }}</td>
                                <td class="px-6 py-4 text-sm">{{ formatDate(contract.end_date) }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="contract.is_signed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                                        class="px-2 py-1 rounded-full text-xs font-bold">
                                        {{ contract.is_signed ? 'Assinado' : 'Pendente' }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="space-y-6">
                    <h3 class="font-bold text-gray-700">Acesso Rápido</h3>
                    <div v-for="template in quickTemplates" :key="template.id">
                        <Link :href="`/contracts/create?contract_type_id=${template.contract_type[0].id}`"
                            class="block p-6 bg-indigo-600 rounded-xl text-white shadow-lg hover:bg-indigo-700 transition relative overflow-hidden group mb-4">
                            <span v-if="template.contract_type && template.contract_type.length > 0"
                                class="bg-indigo-500 text-xs px-2 py-1 rounded mb-2 inline-block font-semibold">
                                {{ template.contract_type[0].contract_type_name }}
                            </span>

                            <h4 class="font-bold text-lg leading-tight">
                                {{ template.id }}
                            </h4>

                            <p class="text-indigo-100 text-xs mt-2">Clique para usar</p>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>