<template>
  <DevToolzPageLayout page-title="Random IDs">
    <DevToolCard>
      <p class="card-text mb-4">
        Quickly generate popular identifiers in no time 😎
      </p>

      <div>
        <button
          class="btn btn-icon btn-primary"
          type="button"
          @click="onGenerateIds"
          :disabled="isLoading"
        >
          <span class="btn-inner--icon">
            <i class="ni ni-settings" />
          </span>
          <span class="btn-inner--text">Generate IDs</span>
        </button>
      </div>

      <form
        @submit.prevent
        class="mt-4 d-flex flex-column"
      >
        <DevToolInput
          label="UUID"
          :model-value="uuid"
          type="text"
          readonly
          placeholder="UUID"
        />
        <DevToolInput
          label="UUID v4"
          :model-value="uuidV4"
          type="text"
          readonly
          placeholder="UUID v4"
        />
        <DevToolInput
          label="ULID"
          :model-value="ulid"
          type="text"
          readonly
          placeholder="ULID"
        />
      </form>
    </DevToolCard>
  </DevToolzPageLayout>
</template>

<script setup lang="ts">
import DevToolzPageLayout from '../../components/DevToolPage/DevToolzPageLayout.vue';
import DevToolCard from '../../components/DevToolCard/DevToolCard.vue';
import DevToolInput from '../../components/DevToolInput/DevToolInput.vue';
import { ref } from 'vue';
import { apiClient } from '../../utils/api-client';
import * as ulidLib from 'ulid';

const isLoading = ref(false);

const uuid = ref('');
const uuidV4 = ref('');
const ulid = ref('');

const onGenerateIds = async () => {
  if (isLoading.value) {
    return;
  }

  isLoading.value = true;

  const res = await apiClient.post('/random-ids').catch(() => null);

  isLoading.value = false;

  if (!res?.data) {
    return;
  }

  uuid.value = res.data.uuid;
  uuidV4.value = res.data.uuidV4;
  ulid.value = ulidLib.ulid();
};
</script>
