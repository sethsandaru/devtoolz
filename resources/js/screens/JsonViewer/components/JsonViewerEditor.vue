<template>
  <div class="d-flex mt-3 main-container">
    <div class="d-flex flex-column">
      <h3>Raw JSON</h3>
      <DevToolCodeEditor
        language="json"
        :model-value="modelValue"
        @update:model-value="onValueChanges"
      />
    </div>
    <div class="d-flex flex-column">
      <h3>Beautifier JSON</h3>
      <div
        v-if="parseJsonError"
        class="alert alert-warning alert-dismissible fade show"
        role="alert"
      >
        <span class="alert-text">
          <strong>Parse Error:</strong> {{ parseJsonError }}
        </span>
      </div>
      <DevToolCodeEditor
        :key="beautifierJsonString"
        :model-value="beautifierJsonString"
        readonly
        language="json"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import DevToolCodeEditor from '../../../components/DevToolCodeEditor/DevToolCodeEditor.vue';
import { onMounted, ref } from 'vue';

type JsonViewerEditorProps = {
  modelValue: string;
};

type JsonViewerEditorEmits = {
  (e: 'update:modelValue', value: string): void;
};

const props = defineProps<JsonViewerEditorProps>();
const emits = defineEmits<JsonViewerEditorEmits>();

const beautifierJsonString = ref<string>('{}');
const parseJsonError = ref<string>();

const makeUpJson = (value: string) => {
  try {
    const obj = JSON.parse(value);

    parseJsonError.value = '';
    beautifierJsonString.value = JSON.stringify(obj, null, 2);
  } catch (e) {
    parseJsonError.value =
      e instanceof Error ? e.message : 'Parse JSON failed.';
  }
};

const onValueChanges = (value: string) => {
  emits('update:modelValue', value);
  makeUpJson(value);
};

onMounted(() => {
  makeUpJson(props.modelValue);
});
</script>

<style scoped>
.main-container {
  gap: 0.5rem;
}

.main-container > * {
  flex: 1;
}
</style>
