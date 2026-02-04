<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    templates: Array
});

const selectedTemplate = ref(null);

const selectTemplate = (template) => {
    selectedTemplate.value = template;
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

const clearSelection = () => {
    selectedTemplate.value = null;
};
</script>

<template>
    <Head title="Gerenciador de Templates" />

    <div class="min-h-screen px-4">
        <div class=" mx-auto">
            
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ selectedTemplate ? selectedTemplate.id : 'Selecione um Modelo' }}
                    </h1>
                    <p class="text-gray-600">
                        {{ selectedTemplate ? 'Visualize e preencha o contrato abaixo.' : 'Escolha um template base para iniciar o contrato.' }}
                    </p>
                </div>
                
                <button 
                    v-if="selectedTemplate" 
                    @click="clearSelection"
                    class="flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition hover:cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Voltar para a lista
                </button>
            </div>

            <div v-if="!selectedTemplate" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div 
                    v-for="template in templates" 
                    :key="template.id"
                    @click="selectTemplate(template)"
                    class="bg-white p-6 rounded-xl shadow-sm border border-transparent hover:border-indigo-500 cursor-pointer transition-all hover:shadow-md group"
                >
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ template.id }}</h3>
                    <p class="text-sm text-gray-500 mt-2 line-clamp-2">Clique para visualizar o modelo e gerar o documento.</p>
                </div>
            </div>

            <div v-else class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-in fade-in slide-in-from-bottom-4 duration-500">
                <div class="bg-gray-50 px-8 py-4 border-b flex justify-between items-center text-sm text-gray-500">
                    <span>Visualização do Documento</span>
                    <div class="flex space-x-4">
                        <button class="hover:text-indigo-600 hover:cursor-pointer">🖨️ Imprimir</button>
                        <button class="bg-indigo-600 text-white px-4 py-1.5 rounded-lg hover:bg-indigo-700 transition hover:cursor-pointer">Usar este modelo</button>
                    </div>
                </div>

                <div class="p-12 md:p-20">
                    <article 
                        class="prose prose-indigo max-w-none mx-auto"
                        v-html="selectedTemplate.html_content"
                    ></article>
                </div>
            </div>

        </div>
    </div>
</template>

<style>
.prose {
    color: #374151;
    line-height: 1.8;
}
.prose h1, .prose h2 {
    color: #111827;
    margin-top: 2em;
    margin-bottom: 1em;
}
</style>