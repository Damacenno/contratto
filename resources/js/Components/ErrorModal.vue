<script setup>
defineProps({
    status: Number,
})
</script>

<template>
    <div class="fixed w-screen border border-black h-screen inset-0 bg-black/40 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-[360px] shadow-xl fixed w-screen border border-black h-screen">
            <h2 class="text-lg font-semibold mb-2">
                Erro {{ status }}
            </h2>

            <p class="text-sm text-gray-600 mb-4">
                Você não tem permissão para acessar este conteúdo.
            </p>

            <div class="flex justify-end">
                <button
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                    @click="$inertia.visit('/')"
                >
                    OK
                </button>
            </div>
        </div>
    </div>
</template>
