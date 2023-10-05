<template>
  <div class="form-group">
    <label
      class="form-control-label"
      :for="String($attrs.id) || ''"
      v-text="label"
    />
    <input
      class="form-control"
      :type="type"
      :class="{ 'form-control-sm': size === 'small' }"
      :id="String($attrs.id) || ''"
      :placeholder="String($attrs.placeholder) || ''"
      :value="modelValue"
      :readonly="readonly"
      @keyup="
        (event) =>
          $emit('update:modelValue', (event.target as HTMLInputElement).value)
      "
    />
  </div>
</template>

<script setup lang="ts">
type DevToolInputProps = {
  label?: string;
  modelValue: string;
  type: 'text' | 'email' | 'phone';
  size?: 'normal' | 'small';
  readonly?: boolean;
};

type DevToolInputEmits = { (e: 'update:modelValue', value: string): void };

defineProps<DevToolInputProps>();
defineEmits<DevToolInputEmits>();
</script>
