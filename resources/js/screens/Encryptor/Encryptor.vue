<template>
  <DevToolzPageLayout page-title="Encryptor">
    <DevToolCard>
      <p class="card-text mb-4">
        Encrypt your desired value using multiple popular hashing algorithms 🌹
      </p>

      <div class="d-flex flex-column">
        <DevToolInput
          v-model="encryptValue"
          type="text"
          label="Encrypt Value"
          placeholder="Enter your desired value here"
        />

        <button
          class="btn btn-icon btn-primary"
          type="button"
          @click="onEncrypt"
          :disabled="isLoading"
        >
          <span class="btn-inner--icon">
            <i class="ni ni-lock-circle-open" />
          </span>
          <span class="btn-inner--text">Encrypt</span>
        </button>
      </div>

      <form
        @submit.prevent
        class="mt-4 d-flex flex-column"
      >
        <DevToolInput
          label="MD5"
          :model-value="md5"
          type="text"
          readonly
          placeholder="MD5"
        />
        <DevToolInput
          label="Hex"
          :model-value="hex"
          type="text"
          readonly
          placeholder="Hex"
        />
        <DevToolInput
          label="SHA1"
          :model-value="sha1"
          type="text"
          readonly
          placeholder="SHA1"
        />
        <DevToolInput
          label="SHA256"
          :model-value="sha256"
          type="text"
          readonly
          placeholder="SHA256"
        />
        <DevToolInput
          label="SHA512"
          :model-value="sha512"
          type="text"
          readonly
          placeholder="SHA512"
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

const isLoading = ref(false);

const encryptValue = ref('');
const md5 = ref('');
const hex = ref('');
const sha1 = ref('');
const sha256 = ref('');
const sha512 = ref('');

const onEncrypt = async () => {
  if (isLoading.value) {
    return;
  }

  isLoading.value = true;

  const res = await apiClient
    .post('/encrypt', {
      value: encryptValue.value,
    })
    .catch((err) => {
      if (err.response.data.message) {
        alert(err.response.data.message);
      }
    });

  isLoading.value = false;

  if (!res?.data) {
    return;
  }

  md5.value = res.data.md5;
  hex.value = res.data.hex;
  sha1.value = res.data.sha1;
  sha256.value = res.data.sha256;
  sha512.value = res.data.sha512;
};
</script>
