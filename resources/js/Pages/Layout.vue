<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import ErrorModal from '@/Components/ErrorModal.vue'

const page = usePage()

const showErrorModal = computed(() => {
    return !!page.props.flash?.error_status
})
</script>

<template>

    <main>
        <header>
            <Link href="/">Home</Link>
            <Link href="/contracts">Contratos</Link>
            <Link href="/contracts/create">Criar Contrato</Link>
        </header>

        <article>
            <slot />
        </article>
    </main>
    <ErrorModal v-if="showErrorModal" :status="page.props.flash.error_status" />
</template>
