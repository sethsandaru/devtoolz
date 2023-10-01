<template>
  <!-- Topnav -->
  <nav
    class="navbar navbar-top navbar-expand navbar-dark bg-gradient-dark border-bottom"
  >
    <div class="container-fluid">
      <div
        class="collapse navbar-collapse"
        id="navbarSupportedContent"
      >
        <!-- Search form -->
        <form
          class="navbar-search navbar-search-light form-inline mr-sm-3"
          id="navbar-search-main"
        >
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="ni ni-compass-04"></i>
                </span>
              </div>
              <input
                class="form-control"
                placeholder="Search"
                type="text"
              />
            </div>
          </div>
          <button
            type="button"
            class="close"
            data-action="search-close"
            data-target="#navbar-search-main"
            aria-label="Close"
          >
            <span aria-hidden="true">×</span>
          </button>
        </form>
      </div>
    </div>
  </nav>
</template>

<style scoped></style>
