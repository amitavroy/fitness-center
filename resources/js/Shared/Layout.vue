<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <inertia-link class="navbar-brand" href="/">FitApp</inertia-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a
                id="navbarDropdownLeft"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                v-pre
              >
                Manage
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLeft">
                <inertia-link :href="$route('lead.list')" class="dropdown-item">Leads</inertia-link>
                <inertia-link :href="$route('subscribers.list')" class="dropdown-item">Subscribers</inertia-link>
                <inertia-link :href="$route('package.list')" class="dropdown-item">Packages</inertia-link>
              </div>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a
                id="navbarDropdown"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ userName }}
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" @click="handleLogout">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <alert-messages></alert-messages>

    <main class="py-4">
      <slot />
    </main>
  </div>
</template>

<script>
import axios from "axios";
import AlertMessages from "./AlertMessages";
export default {
  components: {
    AlertMessages
  },
  mounted() {
    this.userName = this.$page.auth.user.name;
  },
  data() {
    return {
      userName: ""
    };
  },
  methods: {
    async handleLogout() {
      await axios.post("/logout", {});
      window.location.href = "/";
    }
  }
};
</script>
