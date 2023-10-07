<template>
  <div class="form-group">
    <label
      class="form-control-label"
      :for="String($attrs.id) || ''"
      v-text="label"
    />
    <input
      class="form-control"
      type="number"
      :class="{
        'form-control-sm': size === 'small',
        'form-control-lg': size === 'large',
      }"
      :id="String($attrs.id) || ''"
      :placeholder="String($attrs.placeholder) || ''"
      :value="modelValue"
      :readonly="readonly"
      @change="(event) => onChange(event as KeyboardEvent)"
    />
  </div>
</template>

<script setup lang="ts">
type DevToolNumberInputProps = {
  label?: string;
  modelValue: number;
  size?: 'normal' | 'small' | 'large';
  readonly?: boolean;
};

type DevToolNumberInputEmits = {
  (e: 'update:modelValue', value: number): void;
  (e: 'change', value: number): void;
};

defineProps<DevToolNumberInputProps>();
const emits = defineEmits<DevToolNumberInputEmits>();

const onChange = (event: KeyboardEvent) => {
  const rawValue = (event.target as HTMLInputElement).value;
  const parsedValue = parseNumber(rawValue);

  emits('update:modelValue', parsedValue);
  emits('change', parsedValue);
};

const parseNumber = (value?: string | null): number => {
  const num = Number.parseFloat(value ?? '0');

  if (Number.isNaN(num) || !Number.isFinite(num)) {
    return 0;
  }

  return num;
};
</script>
