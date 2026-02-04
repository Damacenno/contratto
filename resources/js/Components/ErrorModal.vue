<script setup>
import { computed } from 'vue'

const props = defineProps({
    status: Number,
    message: String 
})

const errorDetails = computed(() => {
    return {
        503: { title: 'Serviço Indisponível', description: 'Estamos em manutenção.' },
        500: { title: 'Erro Interno', description: 'Algo deu errado nos nossos servidores.' },
        404: { title: 'Página não encontrada', description: 'O conteúdo que você busca sumiu.' },
        403: { title: 'Acesso Negado', description: 'Você não tem permissão para isso.' },
    }[props.status] || { title: 'Erro', description: 'Ocorreu um erro inesperado.' }
})
</script>

<template>
    <div v-if="status" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-xl p-8 max-w-sm w-full shadow-2xl">
            <h2 class="text-2xl font-bold text-red-600 mb-2">
                {{ errorDetails.title }} ({{ status }})
            </h2>
            <p class="text-gray-600 mb-6">
                {{ message || errorDetails.description }}
            </p>
            <button @click="$inertia.visit('/')" class="w-full py-3 bg-gray-900 text-white rounded-lg font-medium">
                Voltar para o Início
            </button>
        </div>
    </div>
</template>