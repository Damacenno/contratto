<template>
  <AppHeader title="Criar Contrato" />

  <!-- Seletor de Tipo de Contrato -->
  <div v-if="!selectedContractType" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
    <div class="mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Criar Novo Contrato</h1>
      <p class="text-lg text-slate-600">Selecione o tipo de contrato que deseja gerar</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6">
      <div v-for="type in contractTypes" :key="type.id" @click="selectContractType(type)"
        class="group cursor-pointer bg-white border-2 border-slate-200 hover:border-slate-900 rounded-xl p-6 md:p-8 transition-all duration-300 hover:shadow-lg hover:scale-105">
        <div class="flex items-center justify-center w-12 h-12 bg-slate-100 group-hover:bg-slate-900 group-hover:text-white rounded-lg transition mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900 group-hover:text-slate-900 transition">{{ type.contract_type_name }}</h3>
        <p class="text-sm text-slate-500 mt-2">Clique para continuar</p>
        <div class="mt-4 flex items-center text-slate-900 font-medium text-sm opacity-0 group-hover:opacity-100 transition">
          Selecionar
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- Formulário -->
  <div v-else class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
      <div>
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900">{{ selectedContractType?.contract_type_name }}</h1>
        <p class="text-slate-600 mt-1">Preencha os dados do contrato abaixo</p>
      </div>
      <button @click="goBack" class="text-slate-600 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </button>
    </div>

    <!-- Mensagem de erro -->
    <div v-if="$page.props.flash?.error" class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
      <p class="text-red-800 font-medium">⚠️ {{ $page.props.flash.error }}</p>
    </div>

    <!-- Dados da Empresa -->
    <div v-if="companyFields.length" class="mb-8 bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-xl p-6 md:p-8">
      <h2 class="text-lg font-bold text-slate-900 mb-5 flex items-center gap-2">
        <span class="text-2xl">🏢</span>
        Dados da Empresa
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="field in companyFields" :key="field.id" class="flex flex-col">
          <span class="text-xs font-semibold text-slate-600 uppercase tracking-wide mb-1">{{ field.display_name }}</span>
          <span class="text-sm font-medium text-slate-900">{{ formData[field.field_name] || "—" }}</span>
        </div>
      </div>
    </div>

    <!-- Campos do Formulário -->
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 md:p-8 mb-8">
      <h2 class="text-lg font-bold text-slate-900 mb-6">Informações do Contrato</h2>
      
      <div class="space-y-5">
        <!-- Número do Contrato - Full Width -->
        <div>
          <label class="block text-sm font-semibold text-slate-900 mb-2">Número do Contrato <span class="text-red-500">*</span></label>
          <input v-model="formData.contract_number" type="text" placeholder="Ex: CONT-2025-001"
            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition" />
        </div>

        <!-- Grid de Campos Dinâmicos - 2 Colunas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div v-for="field in formFields" :key="field.id">
            <label class="block text-sm font-semibold text-slate-900 mb-2 flex items-center gap-1">
              {{ field.display_name }} 
              <span class="text-red-500">*</span>
            </label>
            <input v-model="formData[field.field_name]" type="text" :placeholder="`Digite ${field.display_name.toLowerCase()}`"
              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition" />
          </div>
        </div>
      </div>
    </div>

    <!-- Botões -->
    <div class="flex flex-col sm:flex-row gap-3">
      <button @click="goBack" class="flex-1 px-6 py-3 border-2 border-slate-300 text-slate-900 font-medium rounded-lg hover:bg-slate-50 transition">
        ← Voltar
      </button>
      <button @click="openPreview" :disabled="!isFormValid"
        class="flex-1 px-6 py-3 bg-slate-900 text-white font-medium rounded-lg hover:bg-slate-800 disabled:opacity-50 disabled:cursor-not-allowed transition flex items-center justify-center gap-2">
        <span v-if="!isFormValid" class="text-sm">Preencha todos os campos</span>
        <span v-else>
          👁️ Visualizar Contrato
        </span>
      </button>
    </div>
  </div>

  <!-- Modal de Preview -->
  <div v-if="showPreview" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 backdrop-blur-sm">
    <div class="bg-white w-full h-[90vh] max-w-5xl rounded-2xl shadow-2xl flex flex-col overflow-hidden">
      <!-- Header do Modal -->
      <div class="px-6 md:px-8 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-slate-100 flex justify-between items-center sticky top-0 z-10">
        <div>
          <h2 class="text-xl md:text-2xl font-bold text-slate-900">Pré-visualização do Contrato</h2>
          <p class="text-sm text-slate-600 mt-1">{{ selectedContractType?.contract_type_name }}</p>
        </div>
        <button @click="closePreview" class="text-slate-500 hover:text-slate-900 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Conteúdo do Modal -->
      <div class="flex-1 overflow-y-auto p-6 md:p-10 bg-slate-50 flex justify-center">
        <div id="contract-pdf-content" class="contract-preview bg-white rounded-lg shadow-md" v-html="renderedTemplate" />
      </div>

      <!-- Footer do Modal -->
      <div class="px-6 md:px-8 py-4 border-t border-slate-200 bg-white flex flex-col sm:flex-row gap-3 sticky bottom-0">
        <button @click="closePreview" class="flex-1 px-4 py-3 border border-slate-300 text-slate-900 font-medium rounded-lg hover:bg-slate-50 transition">
          Fechar
        </button>
        <button @click="generatePDF" class="flex-1 px-4 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition flex items-center justify-center gap-2">
          <span>📥</span> Baixar PDF
        </button>
        <button @click="saveContract" :disabled="isSaving"
          class="flex-1 px-4 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 disabled:opacity-50 disabled:cursor-not-allowed transition flex items-center justify-center gap-2">
          <span v-if="!isSaving">💾</span>
          <span v-if="isSaving">⏳</span>
          {{ isSaving ? "Salvando..." : "Finalizar e Salvar" }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, reactive, watch, ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import html2pdf from "html2pdf.js";
import AppHeader from "@/Components/AppHeader.vue";

const page = usePage();

const props = defineProps({
  selectedContractTypeId: Number,
  fields: Array,
  contractTypes: Array,
  company: Object,
  templateHtml: String,
});

const formData = reactive({});
const showPreview = ref(false);
const isSaving = ref(false);

const openPreview = () => {
  showPreview.value = true;
};

const closePreview = () => {
  showPreview.value = false;
};

const goBack = () => {
  router.get("/contracts/create", {}, {
    preserveState: false,
    replace: true,
  });
};

const selectedContractType = computed(() =>
  props.contractTypes.find((t) => t.id === props.selectedContractTypeId)
);

const companyFields = computed(() =>
  props.fields.filter((f) => f.field_name?.startsWith("company_"))
);

const formFields = computed(() =>
  props.fields.filter(
    (f) =>
      !f.field_name?.startsWith("company_") && f.field_name !== "CONTRACT_FIELD_SIGNATURE"
  )
);

watch(
  () => props.fields,
  (fields) => {
    showPreview.value = false;
    const data = {};

    data.contract_number = "";

    fields.forEach((field) => {
      if (field.field_name.startsWith("company_") && props.company) {
        data[field.field_name] = props.company[field.field_name] ?? "";
        return;
      }
      data[field.field_name] = "";
    });

    data.contract_date = new Date().getFullYear();
    Object.assign(formData, data);
  },
  { immediate: true }
);

const isFormValid = computed(() => {
  const hasContractNumber = formData.contract_number?.toString().trim() !== "";
  const fieldsAreValid = formFields.value.every((field) => {
    const value = formData[field.field_name];
    return value && value.toString().trim() !== "";
  });
  return hasContractNumber && fieldsAreValid;
});

const renderedTemplate = computed(() => {
  if (!props.templateHtml) return "";
  let html = props.templateHtml;
  Object.entries(formData).forEach(([key, value]) => {
    const regex = new RegExp(`\\$\\{\\{\\s*${key}\\s*\\}\\}`, "g");
    html = html.replace(regex, value || "");
  });
  return html;
});

const selectContractType = (contractType) => {
  router.get(
    "/contracts/create",
    { contract_type_id: contractType.id },
    {
      preserveState: true,
      replace: true,
      only: ["fields", "selectedContractTypeId", "company", "templateHtml"],
    }
  );
};

const generatePDF = () => {
  const element = document.getElementById('contract-pdf-content');
  const options = {
    margin: 10,
    filename: `contrato_${props.selectedContractTypeId}.pdf`,
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  html2pdf().set(options).from(element).save();
};

const saveContract = async () => {
  if (isSaving.value) return;
  isSaving.value = true;

  const element = document.getElementById("contract-pdf-content");
  const options = {
    margin: 10,
    filename: `contrato_${formData.contract_number || 'novo'}.pdf`,
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
  };

  try {
    const worker = html2pdf().set(options).from(element);
    const pdfBlob = await worker.output("blob");

    const formDataPayload = new FormData();
    formDataPayload.append("pdf_file", pdfBlob, "contrato.pdf");
    formDataPayload.append("contract_type_id", props.selectedContractTypeId);

    Object.entries(formData).forEach(([key, value]) => {
      formDataPayload.append(key, value ?? "");
    });

    router.post("/contracts", formDataPayload, {
      forceFormData: true,
      onSuccess: () => {
        showPreview.value = false;
      },
      onFinish: () => (isSaving.value = false),
    });
  } catch (error) {
    console.error(error);
    isSaving.value = false;
  }
};
</script>

<style scoped>
.contract-preview {
  font-family: 'Times New Roman', Times, serif;
  color: #000;
  line-height: 1.6;
  word-wrap: break-word;
  padding: 24px;
  font-size: 13px;
  max-width: 600px;
}

::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: transparent;
}

::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}
</style>