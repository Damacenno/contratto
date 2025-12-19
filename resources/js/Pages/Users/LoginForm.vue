<template>
    <AppHeader title="Login" />
    <div v-if="$page.props.flash.error" v-text="$page.props.flash.error">
    </div>
    <form @submit.prevent="login">
        <label for="">Email</label>
        <input type="text" v-model="form.email">
        <label for="">Senha</label>
        <input type="text" v-model="form.password">

        <button type="submit">Entrar</button>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    email: '',
    password: ''
});

function login() {
    form.post('/login');
}
</script>