<template>
    <div class="min-h-screen bg-slate-50 flex flex-col items-center py-12 px-4">
        <div class="max-w-4xl w-full mb-8 text-center">
            <h1 class="text-3xl font-bold text-slate-900">Assinatura de Contrato</h1>
            <p class="text-slate-600 mt-2">Olá, {{ contract.client_name }}. Por favor, revise os termos abaixo.</p>
        </div>

        <div class="max-w-4xl w-full bg-white shadow-xl border rounded-lg overflow-hidden flex flex-col">
            <div class="p-4 bg-slate-100 border-b flex justify-between items-center text-sm text-slate-500">
                <span>Documento: {{ contract.contract_number }}</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Conexão Segura
                </span>
            </div>

            <div class="p-12 overflow-y-auto max-h-[600px] bg-slate-200 shadow-inner">
                <div 
                    class="bg-white p-10 shadow-sm mx-auto min-h-[842px] paper"
                    v-html="contract.rendered_content"
                ></div>
            </div>

            <div class="p-6 bg-white border-t flex flex-col items-center gap-4">
                <div class="flex items-start gap-3 max-w-lg text-sm text-slate-600">
                    <input type="checkbox" v-model="form.accepted" id="terms" class="mt-1 h-4 w-4 rounded border-gray-300 text-blue-600">
                    <label for="terms">
                        Eu li e concordo com todos os termos e condições descritos neste contrato digital, 
                        compreendendo que minha assinatura eletrônica tem validade jurídica.
                    </label>
                </div>

                <div class="flex gap-4">
                    <button 
                        @click="handleSign"
                        :disabled="!form.accepted || form.processing"
                        class="px-8 py-3 rounded-lg font-bold text-white transition-all"
                        :class="form.accepted ? 'bg-emerald-600 hover:bg-emerald-700 shadow-lg' : 'bg-slate-300 cursor-not-allowed'"
                    >
                        {{ form.processing ? 'Processando...' : 'Assinar Digitalmente' }}
                    </button>
                </div>
            </div>
        </div>

        <p class="mt-8 text-slate-400 text-xs text-center">
            Este link é único e pessoal. Não o compartilhe com terceiros.<br>
            IP Registrado: {{ $page.props.auth?.user_ip ?? 'Detectado no envio' }}
        </p>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    contract: Object
});

const form = useForm({
    accepted: false,
});

const handleSign = () => {
    form.post(route('public.contract.confirm_sign', props.contract.id), {
        onSuccess: () => {
            alert('Contrato assinado com sucesso! Você receberá uma cópia por e-mail.');
        }
    });
};
</script>

<style scoped>
.paper {
    font-family: 'Times New Roman', Times, serif;
    line-height: 1.6;
    color: #1a1a1a;
    max-width: 800px;
}
</style>