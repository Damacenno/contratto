<template>
    <AppHeader title="Home"/>
    <h2>Home</h2>
    <p>Bem Vindo, <span>{{ $page.props.auth.user.name }}</span></p>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
let page = usePage();
</script>