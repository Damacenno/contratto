<template>
    <AppHeader title="Criar Contrato" />

    <!-- ESCOLHA DO TEMPLATE -->
    <div v-if="!selectedContractType" class="space-y-3">
        <h2 class="text-xl font-semibold mb-4">Escolha um Template</h2>

        <div v-for="type in contractTypes" :key="type.id" @click="selectContractType(type)"
            class="cursor-pointer p-4 border rounded hover:bg-gray-50">
            {{ type.contract_type_name }}
        </div>
    </div>

    <!-- FORMULÁRIO -->
    <div v-else class="max-w-4xl mx-auto space-y-6">

        <!-- DADOS DA EMPRESA -->
        <div v-if="companyFields.length" class="border rounded p-4 bg-gray-50">
            <h3 class="font-semibold text-lg mb-3">Dados da Empresa</h3>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <div v-for="field in companyFields" :key="field.id">
                    <span class="font-medium">{{ field.display_name }}:</span>
                    <span class="ml-1 text-gray-700">
                        {{ formData[field.field_name] || '-' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- CAMPOS EDITÁVEIS -->
        <div class="space-y-4">
            <div v-for="field in formFields" :key="field.id">
                <label class="block font-semibold mb-1">
                    {{ field.display_name }}
                </label>

                <input v-model="formData[field.field_name]" type="text" class="w-full border rounded px-3 py-2" />
            </div>
        </div>

        <!-- BOTÃO -->
        <button @click="showPreview = true" :disabled="!isFormValid"
            class="w-full bg-black text-white py-2 rounded disabled:opacity-40">
            Visualizar Contrato
        </button>

        <!-- PRÉ-VISUALIZAÇÃO -->
        <div v-if="showPreview" class="border rounded p-6 bg-white shadow">
            <h3 class="text-xl font-semibold mb-4">
                Pré-visualização do Contrato
            </h3>

            <div class="prose max-w-none" v-html="renderedTemplate" />
        </div>
    </div>
</template>

<script setup>
import { computed, reactive, watch, ref } from 'vue'
import { router } from '@inertiajs/vue3'

/* =======================
   PROPS
======================= */
const props = defineProps({
    selectedContractTypeId: Number,
    fields: Array,
    contractTypes: Array,
    company: Object,
    templateHtml: String
})

/* =======================
   STATE
======================= */
const formData = reactive({})
const showPreview = ref(false)

/* =======================
   COMPUTEDS
======================= */
const selectedContractType = computed(() =>
    props.contractTypes.find(
        t => t.id === props.selectedContractTypeId
    )
)

// Campos da empresa (company_*)
const companyFields = computed(() =>
    props.fields.filter(f =>
        f.field_name?.startsWith('company_')
    )
)

// Campos editáveis
const formFields = computed(() =>
    props.fields.filter(f =>
        !f.field_name?.startsWith('company_') &&
        f.field_name !== 'CONTRACT_FIELD_SIGNATURE'
    )
)

/* =======================
   WATCH: POPULA FORM
======================= */
const currentYear = new Date().getFullYear()

watch(
    () => props.fields,
    (fields) => {
        showPreview.value = false

        const data = {}

        // campos vindos do banco
        fields.forEach(field => {
            if (
                field.field_name.startsWith('company_') &&
                props.company
            ) {
                data[field.field_name] =
                    props.company[field.field_name] ?? ''
                return
            }

            data[field.field_name] = ''
        })

        // campo DERIVADO (não vem do banco)
        data.contract_date = currentYear

        Object.assign(formData, data)
    },
    { immediate: true }
)


/* =======================
   VALIDAÇÃO
======================= */
const isFormValid = computed(() =>
    formFields.value.every(field => {
        const value = formData[field.field_name]
        return value && value.toString().trim() !== ''
    })
)

/* =======================
   TEMPLATE RENDER
======================= */
const renderedTemplate = computed(() => {
    if (!props.templateHtml) return ''

    let html = props.templateHtml

    Object.entries(formData).forEach(([key, value]) => {
        const regex = new RegExp(
            `\\$\\{\\{\\s*${key}\\s*\\}\\}`,
            'g'
        )
        html = html.replace(regex, value || '')
    })

    return html
})

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
                'company',
                'templateHtml'
            ]
        }
    )
}
</script>
