<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import ErrorModal from '@/Components/ErrorModal.vue'

const page = usePage()

const isOwner = computed(() => {
    return page.props.auth.user?.role === 'owner'
})

const showErrorModal = computed(() => {
    return !!page.props.flash?.error_status
})
</script>

<template>

    <body
        class="bg-slate-50 text-slate-600 font-sans antialiased selection:bg-purple-100 selection:text-purple-900 pb-20">

        <nav class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <div class="text-navy font-semibold tracking-tighter text-lg">CONTRATTO</div>
                    <div class="hidden md:flex items-center gap-6">
                        <a href="#" class="text-sm font-medium text-slate-900 hover:text-purple-600 transition-colors">
                            <Link href="/">Home</Link>
                        </a>
                        <a href="#" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                            <Link href="/contracts">Contratos</Link>
                        </a>
                        <a href="#" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                            <Link href="/templates">Templates</Link>
                        </a>
                        <a href="#" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                            <Link href="/contracts/create">Criar</Link>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors">
                        <iconify-icon icon="solar:bell-linear" width="20" stroke-width="1.5"></iconify-icon>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div
                        class="h-8 w-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-xs font-medium text-navy">
                        JD
                    </div>
                    <!-- Admin Link Highlighted -->
                    <a href="#"
                        class="hidden sm:flex items-center gap-2 bg-navy text-white text-xs font-medium px-3 py-1.5 rounded-lg hover:bg-slate-800 transition-colors shadow-sm ring-1 ring-white/10">
                        <iconify-icon icon="solar:shield-user-linear" width="16" stroke-width="1.5"></iconify-icon>
                        <Link v-if="isOwner" href="/admin">Painel Admin</Link>
                    </a>
                </div>
            </div>
        </nav>

        <article class="w-full h-screen mx-auto px-6 py-10 space-y-12">
            <slot />
        </article>
        <ErrorModal v-if="showErrorModal" :status="page.props.flash.error_status" />
    </body>

</template>