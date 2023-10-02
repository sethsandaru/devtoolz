<template>
  <div
    class="editor"
    ref="codeEditor"
    :style="[`height: ${height ?? '600px'}`]"
  />
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import * as monaco from 'monaco-editor';
import { onUnmounted } from '@vue/runtime-core';
import { debounce } from 'lodash';
import { rescue } from '../../utils/rescue';

type DevToolCodeEditorProps = {
  language: 'javascript' | 'html' | 'json';
  modelValue: string;
  height?: string;
  readonly?: boolean;
};

type DevToolCodeEditorEmits = {
  (e: 'update:modelValue', value: string): void;
};

const props = defineProps<DevToolCodeEditorProps>();
const emits = defineEmits<DevToolCodeEditorEmits>();

const codeEditor = ref<HTMLElement>();
const monacoEl = ref<monaco.editor.IStandaloneCodeEditor | null>(null);

onMounted(() => {
  const editor = monaco.editor.create(codeEditor.value!, {
    value: props.modelValue,
    language: props.language,
    automaticLayout: true,
    theme: 'vs-dark',
    tabSize: 2,
    minimap: {
      enabled: false,
    },
    readOnly: !!props.readonly,
  });

  monacoEl.value = Object.freeze(editor);

  const debouncedGetValue = debounce(
    () => emits('update:modelValue', monacoEl.value?.getValue() || ''),
    200
  );

  monacoEl.value.onDidChangeModelContent(debouncedGetValue);
});

onUnmounted(() => rescue(() => monacoEl.value?.dispose()));
</script>

<style scoped>
.editor {
  width: 100%;
}
</style>
