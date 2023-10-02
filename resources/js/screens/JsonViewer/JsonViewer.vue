<template>
  <DevToolzPageLayout page-title="JSON Viewer">
    <DevToolCard>
      <TabsList
        :items="jsonRecords"
        @add="addNewRecord"
        @selected="selectedRecord"
      />
      <JsonViewerEditor
        v-if="activeRecord"
        :key="activeRecord.title"
        v-model="activeRecord.json"
      />
    </DevToolCard>
  </DevToolzPageLayout>
</template>

<script setup lang="ts">
import DevToolzPageLayout from '../../components/DevToolPage/DevToolzPageLayout.vue';
import DevToolCard from '../../components/DevToolCard/DevToolCard.vue';
import { onMounted, ref } from 'vue';
import { JsonViewerRecord } from './JsonViewer.types';
import * as JsonViewerMethods from './JsonViewer.methods';
import TabsList from './components/TabsList.vue';
import JsonViewerEditor from './components/JsonViewerEditor.vue';

const jsonRecords = ref<JsonViewerRecord[]>([]);
const activeRecord = ref<JsonViewerRecord>();

const addNewRecord = () => {
  resetActive();
  const size = jsonRecords.value.length;

  jsonRecords.value.push({
    title: `New Json Viewer ${size > 0 ? ` (${size})` : ''}`,
    json: '{}',
    isActive: true,
  });

  activeRecord.value = { ...jsonRecords.value[size] };
};

const resetActive = () => {
  jsonRecords.value.forEach((record) => (record.isActive = false));
  activeRecord.value = undefined;
};

const selectedRecord = (record: JsonViewerRecord) => {
  resetActive();
  record.isActive = true;
  activeRecord.value = { ...record };
};

onMounted(() => {
  const historyRecords = JsonViewerMethods.getAllFromStorage();

  jsonRecords.value = [...historyRecords];

  // if we don't have any history record, create a blank one
  if (!historyRecords.length) {
    addNewRecord();
  }
});
</script>
