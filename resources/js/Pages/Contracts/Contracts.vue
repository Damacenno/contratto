<template>
    <AppHeader title="Contratos" />
    <div>
        <ul>
            <li v-for="contract in contracts" :key="contract.id">
                <b>{{ contract.access_level }} </b> - {{ contract.contract_number }} - {{ contract.client_name }}
                <Link :href="`/contract/details`" :data="{ id: contract.id }">
                    Abrir
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    contracts: Array
});
</script>