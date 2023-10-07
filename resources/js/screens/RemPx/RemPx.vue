<template>
  <DevToolzPageLayout page-title="REM x PX conversion">
    <DevToolCard>
      <p class="card-text">Conversion between REM and Pixel 🏃</p>

      <p class="card-text mb-4">
        Just enter the value and let magic happens 😎
      </p>

      <div class="d-flex flex-row rem-pixel-inputs-container">
        <DevToolNumberInput
          v-model="rem"
          type="text"
          label="REMs"
          placeholder="Enter REM value"
          size="large"
          @change="convertFromRemToPx"
        />
        <span>
          <i class="ni ni-2x ni-bold-left"></i>
          <i class="ni ni-2x ni-bold-right"></i>
        </span>
        <DevToolNumberInput
          v-model="pixels"
          type="text"
          label="Pixels"
          placeholder="Enter Pixel value"
          size="large"
          @change="convertFromPxToRem"
        />
      </div>
    </DevToolCard>
  </DevToolzPageLayout>
</template>

<script setup lang="ts">
import DevToolzPageLayout from '../../components/DevToolPage/DevToolzPageLayout.vue';
import DevToolCard from '../../components/DevToolCard/DevToolCard.vue';
import DevToolNumberInput from '../../components/DevToolNumberInput/DevToolNumberInput.vue';
import { ref } from 'vue';

const REM_TO_PIXELS = 16;

const rem = ref(1);
const pixels = ref(REM_TO_PIXELS);

const convertFromRemToPx = () => {
  pixels.value = (rem.value || 0) * REM_TO_PIXELS;
};

const convertFromPxToRem = () => {
  rem.value = parseFloat(((pixels.value || 0) / REM_TO_PIXELS).toFixed(4));
};
</script>

<style scoped>
.rem-pixel-inputs-container {
  gap: 1rem;
  align-items: center;
}

.rem-pixel-inputs-container > .form-group {
  flex: 1;
}
</style>
