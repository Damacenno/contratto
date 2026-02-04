<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    stats: Object,
    recentContracts: Array,
    ganttContracts: Array,
    quickTemplates: Array
});

const formatDate = (date) => {
    return date ? new Date(date).toLocaleDateString('pt-BR') : '---';
};

const nextSixMonths = computed(() => {
    const monthsNames = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    const result = [];
    const today = new Date();

    for (let i = 0; i < 6; i++) {
        const monthIndex = (today.getMonth() + i) % 12;
        result.push(monthsNames[monthIndex]);
    }
    return result;
});

const getGanttStyle = (startDate, endDate) => {
    const today = new Date();
    const start = new Date(startDate);
    const end = new Date(endDate);

    let startCol = (start.getFullYear() - today.getFullYear()) * 12 + (start.getMonth() - today.getMonth());
    let endCol = (end.getFullYear() - today.getFullYear()) * 12 + (end.getMonth() - today.getMonth());

    const viewStart = Math.max(0, startCol);
    const viewEnd = Math.min(5, endCol);

    if (endCol < 0 || startCol > 5) return { display: 'none' };

    const span = (viewEnd - viewStart) + 1;

    return {
        gridColumnStart: viewStart + 1,
        gridColumnEnd: `span ${span}`
    };
};
</script>

<template>

    <Head title="Dashboard" />

    <div class="p-4 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto space-y-8">

            <h2 class="block md:hidden font-bold">DASHBOARD</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="md:col-span-1 bg-white px-5 py-4 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold text-[10px]">Contratos Ativos</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.active }}</p>
                </div>
                <div class="md:col-span-1 bg-white px-5 py-4 rounded-xl shadow-sm border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-500 uppercase font-bold text-[10px]">Aguardando Ass.</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.pending }}</p>
                </div>
                <div class=" md:col-span-1 col-span-2 bg-white px-5 py-4 rounded-xl shadow-sm border-l-4 border-red-500">
                    <p class="text-sm text-gray-500 uppercase font-bold text-[10px]">Expirando (30 dias)</p>
                    <p class="text-3xl font-black text-gray-800">{{ stats.expiring }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-scroll border border-gray-100">
                    <div class="p-6 border-b flex justify-between items-center text-gray-700">
                        <h3 class="font-bold">Contratos Recentes</h3>
                        <Link href="/contracts" class="text-xs text-indigo-600 hover:underline">Ver todos</Link>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-[10px] text-gray-500 uppercase font-bold">
                            <tr>
                                <th class="hidden md:block px-6 py-3">Número</th>
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Início</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="contract in recentContracts" :key="contract.id"
                                class="hover:bg-gray-50 transition-colors">
                                <td class="hidden md:block px-6 py-4 font-medium text-xs text-gray-700">#{{ contract.contract_number }}
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-600">{{ contract.client_name }}</td>
                                <td class="px-6 py-4 text-xs text-gray-600">{{ formatDate(contract.start_date) }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="contract.is_signed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                                        class="px-2 py-1 rounded-full text-[9px] font-bold uppercase">
                                        {{ contract.is_signed ? 'Assinado' : 'Pendente' }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="space-y-4">
                    <h3 class="font-bold text-gray-700">Acesso Rápido</h3>
                    <div v-for="template in quickTemplates" :key="template.id">
                        <Link :href="`/contracts/create?contract_type_id=${template.contract_type[0]?.id}`"
                            class="block p-5 bg-indigo-600 rounded-xl text-white shadow-md hover:bg-indigo-700 transition relative overflow-hidden group">
                            <span v-if="template.contract_type?.length"
                                class="bg-indigo-500 text-[9px] px-2 py-0.5 rounded mb-2 inline-block font-bold uppercase">
                                {{ template.contract_type[0].contract_type_name }}
                            </span>
                            <h4 class="font-bold text-base leading-tight">
                                {{ template.template_name || 'Template #' + template.id }}
                            </h4>
                            <p class="text-indigo-200 text-[10px] mt-2 group-hover:text-white transition-colors">Clique
                                para utilizar agora</p>
                        </Link>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-gray-700">Cronograma de Vigência</h3>
                        <p class="text-[10px] text-gray-400">Janela de 6 meses a partir de hoje</p>
                    </div>
                </div>
                <div class="p-6 overflow-x-auto">
                    <div class="min-w-[800px]">
                        <div class="grid grid-cols-6 border-b border-gray-100 pb-2 mb-4">
                            <div v-for="month in nextSixMonths" :key="month"
                                class="text-center text-[10px] font-black text-gray-400 uppercase">
                                {{ month }}
                            </div>
                        </div>

                        <div class="space-y-3 relative">
                            <div class="absolute inset-0 grid grid-cols-6 pointer-events-none">
                                <div v-for="i in 6" :key="i" class="border-l border-gray-50 h-full"></div>
                            </div>

                            <div v-for="contract in ganttContracts" :key="contract.id"
                                class="grid grid-cols-6 items-center group relative z-10">

                                <div :style="getGanttStyle(contract.start_date, contract.end_date)"
                                    class="h-7 rounded-md relative flex items-center px-3 transition-all hover:scale-[1.01] hover:shadow-md cursor-default group"
                                    :class="contract.is_signed
                                        ? 'bg-gradient-to-r from-emerald-400 to-teal-400 text-white'
                                        : 'bg-gradient-to-r from-yellow-400 to-yellow-400 text-white'">

                                    <span class="text-[9px] font-bold tracking-tight uppercase truncate">
                                        #{{ contract.contract_number }} - {{ contract.client_name }}
                                    </span>

                                    <div
                                        class="absolute hidden group-hover:block bottom-full mb-2 left-0 bg-gray-900 text-white text-[9px] p-2 rounded shadow-xl z-50 whitespace-nowrap">
                                        {{ formatDate(contract.start_date) }} — {{ formatDate(contract.end_date) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>