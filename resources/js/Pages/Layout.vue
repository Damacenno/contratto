<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import ErrorModal from '@/Components/ErrorModal.vue'

const page = usePage()

// Verifica se a rota é a atual ou filha dela (ex: /contracts/1 mantém /contracts ativo)
const isCurrentPath = (path) => {
    if (path === '/') return page.url === '/'
    return page.url.startsWith(path)
}

const isOwner = computed(() => {
    return page.props.auth.user?.role === 'owner'
})

const showErrorModal = computed(() => {
    return !!page.props.flash?.error_status
})
</script>

<template>
    <div
        class="bg-slate-50 text-slate-600 font-sans antialiased selection:bg-purple-100 selection:text-purple-900 flex flex-col min-h-screen">

        <nav class="hidden md:block sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <div class="text-navy font-semibold tracking-tighter text-lg">CONTRATTO</div>

                    <div class="hidden md:flex items-center gap-6">
                        <Link href="/" :class="[
                            'text-sm font-medium transition-colors',
                            isCurrentPath('/') ? 'text-slate-900' : 'text-slate-500 hover:text-slate-900'
                        ]">
                            Home
                        </Link>

                        <Link href="/contracts" :class="[
                            'text-sm font-medium transition-colors',
                            isCurrentPath('/contracts') ? 'text-slate-900' : 'text-slate-500 hover:text-slate-900'
                        ]">
                            Contratos
                        </Link>

                        <Link href="/templates" :class="[
                            'text-sm font-medium transition-colors',
                            isCurrentPath('/templates') ? 'text-slate-900' : 'text-slate-500 hover:text-slate-900'
                        ]">
                            Templates
                        </Link>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div
                        class="h-8 w-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-xs font-medium text-navy uppercase">
                        {{ page.props.auth.user?.name?.substring(0, 2) || '??' }}
                    </div>

                    <Link href="/contracts/create"
                        class="hidden sm:flex items-center gap-2 bg-slate-900 text-white text-xs px-4 py-2 rounded-lg shadow-sm hover:bg-slate-800 transition-all">
                        <iconify-icon icon="solar:shield-user-linear" width="16"></iconify-icon>
                        <span>Criar</span>
                    </Link>
                </div>
            </div>
        </nav>

        <div
            class=" md:hidden fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-md bg-white/80 backdrop-blur-lg border border-gray-200 shadow-2xl rounded-2xl px-6 py-3 flex justify-between items-center z-50">

            <a href="#" class="flex flex-col items-center gap-1 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="">
                    <Link href="/" :class="[
                        'text-sm font-medium transition-colors',
                        isCurrentPath('/') ? 'text-slate-900' : 'text-slate-500'
                    ]">
                        Home
                    </Link>
                </span>
            </a>

            <a href="#" class="flex flex-col items-center gap-1 text-gray-500 hover:text-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="">
                    <Link href="/contracts" :class="[
                        'text-sm font-medium transition-colors',
                        isCurrentPath('/contracts') ? 'text-slate-900' : 'text-slate-500'
                    ]">
                        Contratos
                    </Link>
                </span>
            </a>

            <button
                class="bg-blue-600 text-white p-4 rounded-full -mt-12 shadow-lg border-4 border-white hover:bg-blue-700 transition-transform active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>

            <a href="#" class="flex flex-col items-center gap-1 text-gray-500 hover:text-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="">
                    <Link href="/templates" :class="[
                        'text-sm font-medium transition-colors',
                        isCurrentPath('/templates') ? 'text-slate-900' : 'text-slate-500'
                    ]">
                        Templates
                    </Link>
                </span>
            </a>

            <a href="#" class="flex flex-col items-center gap-1 text-gray-500 hover:text-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-xs font-medium">Ajustes</span>
            </a>

        </div>

        <article class="flex-1 max-w-7xl mx-auto px-6 py-10 w-full">
            <slot />
        </article>

        <ErrorModal v-if="showErrorModal" :status="page.props.flash.error_status" />
    </div>
</template>