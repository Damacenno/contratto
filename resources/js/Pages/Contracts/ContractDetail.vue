<template>
    <AppHeader :title="'Contrato: ' + contract.contract_number" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 grid grid-cols-1 lg:grid-cols-3 gap-6 auto-rows-max lg:auto-rows-min">

        <div class="lg:col-span-2 flex flex-col gap-4 min-w-0">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-4 sm:p-6 rounded-xl shadow-sm border border-slate-200">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-slate-900">{{ contract.contract_number }}</h2>
                    <p class="text-sm text-slate-600 mt-1">📊 Cliente: <span class="font-medium">{{ contract.client_name }}</span></p>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    <button @click="generatePDF"
                        class="flex-1 sm:flex-none bg-blue-600 text-white px-4 py-2.5 rounded-lg hover:bg-blue-700 transition cursor-pointer text-sm font-medium shadow-sm hover:shadow-md">
                        📥 Baixar PDF
                    </button>
                    <button @click="generateSigningLink"
                        class="flex-1 sm:flex-none bg-emerald-600 text-white px-4 py-2.5 rounded-lg hover:bg-emerald-700 transition cursor-pointer text-sm font-semibold shadow-sm hover:shadow-md">
                        ✍️ Link de Assinatura
                    </button>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 sm:p-6 overflow-y-auto shadow-sm text-sm" style="max-height: calc(100vh - 280px);">
                <div id="contract-pdf-content"
                    class="paper mx-auto bg-white p-4 sm:p-6 md:p-8 shadow-md rounded-lg max-w-2xl border border-slate-100"
                    v-html="renderedTemplate" />
            </div>
        </div>

        <div class="lg:col-span-1 flex flex-col">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden flex flex-col h-full">
                <div class="p-4 sm:p-5 border-b bg-gradient-to-r from-slate-50 to-slate-100">
                    <h3 class="font-bold text-slate-800 flex items-center gap-2 text-base">
                        <span class="text-lg">📋</span>
                        <span>Log de Eventos</span>
                    </h3>
                </div>

                <div class="p-4 sm:p-5 overflow-y-auto flex-1" style="max-height: calc(100vh - 280px);">
                    <ul class="space-y-3">
                        <li v-for="(event, index) in contract.events" :key="index"
                            class="relative pl-6 pb-3 border-l-2 border-slate-200 last:border-0 last:pb-0">
                            <div class="absolute -left-[7px] top-1.5 w-3 h-3 rounded-full bg-slate-400"></div>

                            <p class="text-xs font-semibold text-slate-600 uppercase tracking-wide">{{ event.date }}</p>
                            <p class="text-sm text-slate-800 font-medium leading-snug mt-0.5">{{ event.description }}</p>
                            <p class="text-xs text-slate-500 italic mt-1">👤 {{ event.user }}</p>
                        </li>

                        <li v-if="!contract.events?.length" class="text-sm text-slate-400 text-center py-12">
                            <span class="text-2xl block mb-2">📭</span>
                            Nenhum evento registrado.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import html2pdf from "html2pdf.js";
import axios from "axios";
import AppHeader from "@/Components/AppHeader.vue";

const page = usePage();

const props = defineProps({
    contract: Object,
    templateHtml: String
});

const renderedTemplate = computed(() => {
    if (!props.templateHtml || !props.contract) return "";
    let html = props.templateHtml;

    Object.entries(props.contract).forEach(([key, value]) => {
        const regex = new RegExp(`\\$\\{\\{\\s*${key}\\s*\\}\\}`, "g");
        let displayValue = value;
        if (value === null) displayValue = "___";
        if (typeof value === 'boolean') displayValue = value ? 'Sim' : 'Não';

        html = html.replace(regex, displayValue);
    });

    return html;
});

const generatePDF = () => {
    const element = document.getElementById('contract-pdf-content');
    const options = {
        margin: 10,
        filename: `Contrato_${props.contract.contract_number}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(options).from(element).save();
};

const generateSigningLink = async () => {
    try {
        const response = await axios.post(`/contracts/${props.contract.id}/generate-signature-link`);
        const urlParaCopiar = response.data.link;

        if (urlParaCopiar) {
            await navigator.clipboard.writeText(urlParaCopiar);
            alert("Link de assinatura copiado com sucesso!");
        } else {
            throw new Error("Link não encontrado na resposta");
        }
    } catch (error) {
        console.error("Erro detalhado:", error);
        alert("Falha ao gerar o link. Verifique o console do navegador.");
    }
};
</script>

<style scoped>
.paper {
    font-family: 'Times New Roman', Times, serif;
    color: #000;
    line-height: 1.6;
    word-wrap: break-word;
    font-size: 14px;
}

::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: transparent;
}

::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>