<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h1 class="float-left">Packages</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">List of packages</div>
            <div class="card-body">
              <ul class="list-group list-group-flush" v-if="activePackages.length > 0">
                <li
                  class="list-group-item"
                  v-for="activePackage in activePackages"
                  :key="activePackage.id"
                >
                  <inertia-link
                    :href="$route('package.view', {package: activePackage})"
                  >{{activePackage.name}} ({{activePackage.number_of_days}} days)</inertia-link>
                  <span class="float-right">
                    <strong>₹ {{activePackage.amount}}</strong>
                  </span>
                </li>
              </ul>
              <div v-else>No packages added yet.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add new package</div>
            <div class="card-body">
              <package-add-form @packageAdded="handlePackageAdd" :package-data="blankPackage"></package-add-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "./../../Shared/Layout";
import PackageAddForm from "./PackageAddForm";
export default {
  props: {
    activePackages: Array
  },
  components: {
    Layout,
    PackageAddForm
  },
  data() {
    return {
      blankPackage: {
        name: "",
        amount: 0.0,
        number_of_days: 0
      }
    };
  },
  methods: {
    handlePackageAdd(newPackage) {
      this.$inertia.post(route("package.save"), newPackage);
    }
  }
};
</script>
