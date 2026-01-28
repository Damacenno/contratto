<template>
  <AppHeader title="Criar Contrato" />

  <div v-if="!selectedContractType" class="space-y-3">
    <h2 class="text-xl font-semibold mb-4">Escolha um Template</h2>
    <div v-for="type in contractTypes" :key="type.id" @click="selectContractType(type)"
      class="cursor-pointer p-4 border rounded hover:bg-gray-50">
      {{ type.contract_type_name }}
    </div>
  </div>

  <div v-else class="max-w-4xl mx-auto space-y-6">
    <div v-if="$page.props.flash.error" v-text="$page.props.flash.error"> </div>
    <div v-if="companyFields.length" class="border rounded p-4 bg-gray-50">
      <h3 class="font-semibold text-lg mb-3">Dados da Empresa</h3>
      <div class="grid grid-cols-2 gap-3 text-sm">
        <div v-for="field in companyFields" :key="field.id">
          <span class="font-medium">{{ field.display_name }}:</span>
          <span class="ml-1 text-gray-700">{{ formData[field.field_name] || "-" }}</span>
        </div>
      </div>
    </div>

    <div class="space-y-4">
      <div>
        <label class="block font-semibold mb-1">Número do Contrato</label>
        <input v-model="formData.contract_number" type="text" class="w-full border rounded px-3 py-2" />
      </div>

      <div v-for="field in formFields" :key="field.id">
        <label class="block font-semibold mb-1">{{ field.display_name }}</label>
        <input v-model="formData[field.field_name]" type="text" class="w-full border rounded px-3 py-2" />
      </div>
    </div>

    <button @click="openPreview" :disabled="!isFormValid"
      class="w-full bg-black text-white py-2 rounded disabled:opacity-40">
      Visualizar Contrato
    </button>

    <div v-if="showPreview" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
      @click.self="closePreview">
      <div class="bg-white w-full h-full max-w-5xl overflow-y-auto rounded-lg shadow-2xl flex flex-col">
        <div class="p-4 border-b flex justify-between items-center bg-gray-50 sticky top-0">
          <h2 class="text-xl font-bold">Pré-visualização do Contrato</h2>
          <div class="space-x-2">
            <button @click="generatePDF" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              Baixar PDF
            </button>
            <button @click="saveContract" :disabled="isSaving"
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 disabled:opacity-50">
              {{ isSaving ? "Salvando..." : "Finalizar e Salvar" }}
            </button>
            <button @click="closePreview" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
              Fechar
            </button>
          </div>
        </div>

        <div class="p-10 flex-grow">
          <div id="contract-pdf-content" class="prose max-w-none bg-white" v-html="renderedTemplate" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, reactive, watch, ref } from "vue";
import { router } from "@inertiajs/vue3";
import html2pdf from "html2pdf.js";

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