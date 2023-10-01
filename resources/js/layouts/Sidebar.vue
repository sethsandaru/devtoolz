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
            <li class="nav-item">
              <router-link
                class="nav-link"
                to="/json-viewer"
                active-class="active"
              >
                <i class="ni ni-album-2 text-dark"></i>
                <span class="nav-link-text text-dark">JSON Viewer</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                class="nav-link"
                to="/encryptor"
                active-class="active"
              >
                <i class="ni ni-lock-circle-open text-dark"></i>
                <span class="nav-link-text text-dark">Encryptors</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                class="nav-link"
                to="/info-generator"
                active-class="active"
              >
                <i class="ni ni-briefcase-24 text-dark"></i>
                <span class="nav-link-text text-dark">Info generator</span>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>
