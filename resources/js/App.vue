<template>
  <Sidebar />
  <div
    class="main-content"
    id="panel"
  >
    <router-view />
    <div class="container-fluid mt-6">
      <Footer />
    </div>
  </div>
</template>

<script setup lang="ts">
import Sidebar from './layouts/Sidebar.vue';
import Footer from './layouts/Footer.vue';
</script>
