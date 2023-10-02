<template>
  <div class="container-fluid pt-4">
    <DevToolCard title="Welcome to DevToolz ⚒️">
      <div class="d-flex justify-content-center m-2">
        <img
          src="/assets/images/logo.png"
          class="w-25"
          alt="DevToolz's Logo"
        />
      </div>

      <p class="card-text mb-4">
        Feel free to use <strong>DevToolz</strong> to skyrocket your workflows &
        development experience 😎
      </p>
      <p class="card-text mb-4">
        DevToolz is fully open-sourced & everything is on GitHub. If you want to
        contribute (bug report, new features,...), feel free to add an issue on
        the GitHub Repository.
      </p>
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
</script>
