<template>
    <h2>{{ contract.contract_number }}</h2>
</template>
<script setup>
defineProps({
    contract: Object
});
</script>