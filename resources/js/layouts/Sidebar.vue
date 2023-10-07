<template>
  <!-- Sidenav -->
  <nav
    class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-translucent-neutral"
    id="sidenav-main"
  >
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a
          class="navbar-brand"
          href="/"
        >
          <img
            src="../../images/logo.png"
            class="navbar-brand-img"
            alt="DevToolz from Seth Phat"
          />
        </a>
      </div>
      <div class="navbar-inner">
        <div class="form-group mt-1 mb-1">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="ni ni-compass-04"></i>
              </span>
            </div>
            <input
              v-model="search"
              class="form-control text-dark"
              placeholder="Search for Tool"
              type="text"
              @keyup="filterNavigation"
            />
          </div>
        </div>
        <!-- Collapse -->
        <div
          class="collapse navbar-collapse"
          id="sidenav-collapse-main"
        >
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li
              v-for="navItem in visibleItems"
              :key="navItem.label"
              class="nav-item"
            >
              <router-link
                class="nav-link"
                :to="navItem.path"
                active-class="active"
              >
                <i
                  class="ni text-dark"
                  :class="navItem.icon"
                />
                <span class="nav-link-text text-dark">{{ navItem.label }}</span>
              </router-link>
            </li>
            <li
              v-if="visibleItems.length === 0"
              class="nav-item"
            >
              <a
                href="javascript:void(0)"
                class="nav-link"
              >
                No tool found 👀
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';

type NavigationItem = {
  label: string;
  path: string;
  icon: string;
};

const navigationItems: NavigationItem[] = [
  { label: 'JSON Viewer', icon: 'ni-album-2', path: '/json-viewer' },
  { label: 'Encryptors', icon: 'ni-lock-circle-open', path: '/encryptor' },
  { label: 'Random IDs', icon: 'ni-settings', path: '/identifiers' },
  { label: 'Info generator', icon: 'ni-briefcase-24', path: '/info-generator' },
  { label: 'CSV to JSON', icon: 'ni-books', path: '/csv-to-json' },
  { label: 'JSON to CSV', icon: 'ni-single-copy-04', path: '/json-to-csv' },
  { label: 'HTML to PDF', icon: 'ni-collection', path: '/html-to-pdf' },
];

const visibleItems = ref([...navigationItems]);
const search = ref('');

const filterNavigation = () => {
  const keyword = search.value || '';

  visibleItems.value = [...navigationItems].filter((item) =>
    item.label.toLowerCase().includes(keyword.toLowerCase())
  );
};
</script>
