<template>
  <div class="header header-dark bg-gradient-gray-dark pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6">
            <h6 class="h2 text-white d-inline-block mb-0">
              {{ pageTitle }}
            </h6>
            <nav
              aria-label="breadcrumb"
              class="d-none d-lg-inline-block ml-lg-4"
            >
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item">
                  <a href="/"><i class="ni ni-shop"></i></a>
                </li>
                <li
                  class="breadcrumb-item active"
                  aria-current="page"
                >
                  {{ pageTitle }}
                </li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
            <slot name="header-right" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue';

type DevToolzPageLayoutProps = {
  pageTitle: string;
};

const props = defineProps<DevToolzPageLayoutProps>();

onBeforeMount(() => {
  document.title = `${props.pageTitle} - DevToolz from Seth Phat`;
});
</script>

<style scoped></style>
