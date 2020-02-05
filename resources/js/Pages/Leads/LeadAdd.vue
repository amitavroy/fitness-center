<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
            <span class="breadcrumb-sep">/</span>
            New lead
          </h1>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <lead-form @formSubmit="handleSubmit" :main-lead="lead" :packages="packages"></lead-form>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
import LeadForm from "./../../Shared/LeadForm";
export default {
  props: {
    packages: Array
  },
  components: {
    Layout,
    LeadForm
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        interested_package: ""
      }
    };
  },
  methods: {
    async handleSubmit() {
      let response = await this.$inertia.post("/leads/save", this.lead);
    }
  }
};
</script>
