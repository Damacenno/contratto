<template>
    <AppHeader title="Escolha um Template" />

    <h2>Criar Contrato</h2>

    <!-- ESCOLHA DO TIPO -->
    <div v-if="!selectedContractType">
        <div v-for="type in contractTypes" :key="type.id" @click="selectContractType(type)"
            style="cursor:pointer; padding:8px; border:1px solid #ccc; margin-bottom:6px">
            {{ type.contract_type_name }}
        </div>
    </div>

    <!-- FORMULÁRIO DINÂMICO -->
    <div v-else>
        <div v-for="field in fields" :key="field.id" style="margin-bottom:12px">
            <!-- IGNORA SIGNATURE COMPLETAMENTE -->
            <template v-if="field.field_key !== 'CONTRACT_FIELD_SIGNATURE'">

                <label style="display:block; font-weight:600">
                    {{ field.display_name }}
                </label>

                <input v-model="formData[field.field_name]" type="text" :readonly="isCompanyField(field.field_name)"
                    style="width:100%; padding:6px" />
            </template>
        </div>

    </div>
</template>

<script setup>
import { computed, reactive, watch } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    selectedContractTypeId: {
        type: Number,
        default: null
    },
    fields: {
        type: Array,
        default: () => []
    },
    contractTypes: {
        type: Array,
        default: () => []
    },
    company: {
        type: Object,
        default: null
    }
})

const formData = reactive({})

const selectedContractType = computed(() => {
    if (!props.selectedContractTypeId) return null
    return props.contractTypes.find(
        t => t.id === props.selectedContractTypeId
    )
})

const isCompanyField = (key) => key.startsWith('company_')
watch(
    () => props.fields,
    (fields) => {
        // limpa tudo
        Object.keys(formData).forEach(k => delete formData[k])

        fields.forEach(field => {
            // assinatura nunca preenche
            if (field.field_name === 'signature') {
                formData[field.field_name] = null
                return
            }

            // campos da empresa
            if (isCompanyField(field.field_name) && props.company) {
                const companyKey = field.field_name.replace('company_', '')
                formData[field.field_name] = props.company[companyKey] ?? null
                // console.log('Preenchendo campo da empresa:', field.field_name, '=>', formData[field.field_name]);
                return
            }

            // campo normal
            formData[field.field_name] = null
        })
    },
    { immediate: true }
)

/* =======================
   ACTIONS
======================= */
const selectContractType = (contractType) => {
    router.get(
        '/contracts/create',
        { contract_type_id: contractType.id },
        {
            preserveState: true,
            replace: true,
            only: [
                'fields',
                'selectedContractTypeId',
                'company' // 👈 MUITO IMPORTANTE
            ]
        }
    )
}
</script>
