<template>
  <DevToolzPageLayout page-title="Info Generator">
    <DevToolCard>
      <p class="card-text mb-4">
        Quickly generate fake person data for your testing purposes 💼

        <br />
        <br />
        P/s: only US info at the moment, we'll roll out other countries soon!
      </p>

      <div>
        <button
          class="btn btn-icon btn-primary"
          type="button"
          @click="onGenerate"
          :disabled="isLoading"
        >
          <span class="btn-inner--icon">
            <i class="ni ni-settings" />
          </span>
          <span class="btn-inner--text">Generate</span>
        </button>
      </div>
    </DevToolCard>
    <DevToolCard
      v-if="fakePerson"
      title="Generated Person"
    >
      <h3>Person Information</h3>
      <div class="row">
        <div class="col-lg-4">
          <DevToolInput
            label="First name"
            :model-value="fakePerson.firstName"
            type="text"
            readonly
            placeholder="First name"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="Last name"
            :model-value="fakePerson.lastName"
            type="text"
            readonly
            placeholder="Last name"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="Full name"
            :model-value="fakePerson.fullName"
            type="text"
            readonly
            placeholder="Full name"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <DevToolInput
            label="Address"
            :model-value="fakePerson.address"
            type="text"
            readonly
            placeholder="Address"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="City"
            :model-value="fakePerson.city"
            type="text"
            readonly
            placeholder="City"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="State"
            :model-value="fakePerson.state"
            type="text"
            readonly
            placeholder="State"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <DevToolInput
            label="Postal Code (ZipCode)"
            :model-value="fakePerson.zipCode"
            type="text"
            readonly
            placeholder="Postal Code (ZipCode)"
          />
        </div>
        <div class="col-lg-6">
          <DevToolInput
            label="Country"
            :model-value="fakePerson.country"
            type="text"
            readonly
            placeholder="Country"
          />
        </div>
      </div>

      <h3>Financial Information</h3>
      <div class="row">
        <div class="col-lg-4">
          <DevToolInput
            label="Credit Card Number"
            :model-value="fakePerson.creditCard.number"
            type="text"
            readonly
            placeholder="Credit Card Number"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="Expiration Date"
            :model-value="fakePerson.creditCard.expirationDate"
            type="text"
            readonly
            placeholder="Expiration Date"
          />
        </div>
        <div class="col-lg-4">
          <DevToolInput
            label="CVC"
            :model-value="String(fakePerson.creditCard.cvc)"
            type="text"
            readonly
            placeholder="CVC"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <DevToolInput
            label="IBAN"
            :model-value="fakePerson.banking.IBAN"
            type="text"
            readonly
            placeholder="IBAN"
          />
        </div>
      </div>
      <div class="mt-2">
        <button
          class="btn btn-default"
          @click="isViewingJson = !isViewingJson"
        >
          {{ isViewingJson ? 'Hide' : 'View' }} JSON
        </button>
      </div>
      <div class="mt-2">
        <DevToolCodeEditor
          v-if="isViewingJson"
          :model-value="JSON.stringify(fakePerson, null, 2)"
          language="json"
        />
      </div>
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
import { FakePerson } from './InfoGenerator.types';
import DevToolCodeEditor from '../../components/DevToolCodeEditor/DevToolCodeEditor.vue';

const isLoading = ref(false);

const fakePerson = ref<FakePerson>();
const isViewingJson = ref(false);

const onGenerate = async () => {
  if (isLoading.value) {
    return;
  }

  isLoading.value = true;
  isViewingJson.value = false;

  const res = await apiClient
    .post<FakePerson>('/random-person')
    .catch(() => null);

  isLoading.value = false;

  if (!res?.data) {
    return;
  }

  fakePerson.value = { ...res.data };
};
</script>
