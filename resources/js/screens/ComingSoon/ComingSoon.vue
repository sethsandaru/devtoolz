<template>
  <div class="container-fluid pt-4">
    <DevToolCard title="Not implemented yet - DevToolz ⚒️">
      <div class="d-flex justify-content-center m-2">
        <img
          src="../../../images/logo.png"
          class="w-25"
          alt="DevToolz's Logo"
        />
      </div>

      <div
        class="alert alert-warning alert-dismissible fade show"
        role="alert"
      >
        <span class="alert-text">
          <strong>Warning:</strong> this tool is under development / not
          implemented just yet. Coming soon ASAP ❤️
        </span>
      </div>

      <a
        href="https://github.com/sethsandaru/devtoolz"
        class="btn btn-primary"
        target="_blank"
      >
        SethSandaru/DevToolz
      </a>
    </DevToolCard>
  </div>
</template>

<script setup lang="ts">
import DevToolCard from '../../components/DevToolCard/DevToolCard.vue';
import { onBeforeMount } from 'vue';

onBeforeMount(() => {
  document.title = `Coming soon - DevToolz from Seth Phat`;
});
</script>
