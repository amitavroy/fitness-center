<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('package.list')">Packages</inertia-link>
            <span class="breadcrumb-sep">/</span>
            Package details
          </h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{package.name}}</div>
            <div class="card-body">
              <package-add-form :packageData="package" @packageAdded="handlePackageUpdate"></package-add-form>
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
    package: Object
  },
  components: {
    Layout,
    PackageAddForm
  },
  methods: {
    handlePackageUpdate(postData) {
      postData["id"] = this.package.id;
      this.$inertia.post(route("package.update"), postData);
    }
  }
};
</script>
