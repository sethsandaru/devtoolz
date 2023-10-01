<template>
  <Sidebar />
  <div
    class="main-content"
    id="panel"
  >
    <TopNavigation />
    <router-view />
  </div>
</template>

<script setup lang="ts">
import Sidebar from './layouts/Sidebar.vue';
import TopNavigation from './layouts/TopNavigation.vue';
</script>
