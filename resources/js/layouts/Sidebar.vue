<template>
  <!-- Sidenav -->
  <nav
    class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white"
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
            src="/assets/images/logo.png"
            class="navbar-brand-img"
            alt="DevToolz from Seth Phat"
          />
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div
          class="collapse navbar-collapse"
          id="sidenav-collapse-main"
        >
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li
              v-for="navItem in navigationItems"
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
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
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
</script>
