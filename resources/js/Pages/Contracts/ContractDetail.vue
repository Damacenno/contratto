<template>
    <AppHeader :title="'Contrato: ' + contract.contract_number" />

    <div class="max-w-[1400px] mx-auto p-6 flex gap-6 h-[calc(100vh-100px)]">

        <div class="flex-1 flex flex-col min-w-0">
            <div class="flex justify-between items-center mb-4 bg-white p-4 rounded-lg shadow-sm border">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">{{ contract.contract_number }}</h2>
                    <p class="text-sm text-slate-500">Cliente: {{ contract.client_name }}</p>
                </div>
                <div class="flex gap-2">
                    <button @click="generatePDF"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition cursor-pointer text-sm">
                        Baixar PDF
                    </button>
                    <button @click="generateSigningLink"
                        class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700 transition cursor-pointer text-sm font-semibold">
                        Gerar Link de Assinatura
                    </button>
                </div>
            </div>

            <div class="bg-slate-100 border rounded-lg p-8 overflow-y-auto flex-1 shadow-inner">
                <div id="contract-pdf-content"
                    class="paper mx-auto bg-white p-[20mm] shadow-2xl min-h-[297mm] w-[210mm]"
                    v-html="renderedTemplate" />
            </div>
        </div>

        <div class="w-80 flex flex-col gap-4">
            <div class="bg-white border rounded-lg shadow-sm flex flex-col h-full">
                <div class="p-4 border-b bg-slate-50 rounded-t-lg">
                    <h3 class="font-bold text-slate-700 flex items-center gap-2">
                        <span>📋 Log de Eventos</span>
                    </h3>
                </div>

                <div class="p-4 overflow-y-auto flex-1">
                    <ul class="space-y-4">
                        <li v-for="(event, index) in contract.events" :key="index"
                            class="relative pl-6 pb-4 border-l-2 border-slate-200 last:border-0">
                            <div class="absolute -left-[7px] top-1 w-3 h-3 rounded-full bg-slate-300"></div>

                            <p class="text-xs font-bold text-slate-600 uppercase">{{ event.date }}</p>
                            <p class="text-sm text-slate-800 font-medium leading-tight">{{ event.description }}</p>
                            <p class="text-xs text-slate-500 italic">por: {{ event.user }}</p>
                        </li>

                        <li v-if="!contract.events?.length" class="text-sm text-slate-400 text-center py-10">
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
import html2pdf from "html2pdf.js";
import axios from "axios";

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
    line-height: 1.5;
    word-wrap: break-word;
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