<template>
    <AppHeader :title="'Contrato: ' + contract.contract_number" />

    <div class="max-w-5xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow-sm border">
            <div>
                <h2 class="text-xl font-bold text-navy">{{ contract.contract_number }}</h2>
                <p class="text-sm text-slate-500">Cliente: {{ contract.client_name }}</p>
            </div>
            <div class="space-x-3">
                <button @click="generatePDF"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Baixar PDF
                </button>
                <button class="bg-slate-200 px-4 py-2 rounded hover:bg-slate-300 transition">
                    Imprimir
                </button>
            </div>
        </div>

        <div class="bg-white shadow-lg border rounded-lg p-12 min-h-[1123px]">
            <div id="contract-pdf-content" class="paper max-w-none bg-white" v-html="renderedTemplate" />
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import html2pdf from "html2pdf.js";

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
        margin: 15,
        filename: `Contrato_${props.contract.contract_number}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(options).from(element).save();
};
</script>

<style scoped>
.paper {
    font-family: 'Times New Roman', Times, serif;
    color: #000;
    line-height: 1.6;
}
</style>