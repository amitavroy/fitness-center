<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
            <span class="breadcrumb-sep">/</span>
            Lead details
          </h1>
        </div>
      </div>

      <div class="card">
        <div class="card-header">Lead details</div>
        <div class="card-body">
          <lead-form @formSubmit="handleSubmit" :main-lead="lead" :packages="packages"></lead-form>
        </div>
      </div>

      <div class="card mt-3" v-if="lead.reminders.length > 0">
        <div class="card-header">Reminders</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <inertia-link
                class="btn btn-success float-right mb-2"
                :href="$route('reminder.add', {lead: leadProp})"
              >Add a reminder</inertia-link>
            </div>
          </div>
          <ul class="list-group list-group-flush">
            <li
              class="list-group-item list-group-item-action"
              v-for="reminder in lead.reminders"
              :key="reminder.id"
            >
              <div class="row">
                <div class="col-md-6">{{reminder.reminder}}</div>
                <div class="col-md-2">{{reminder.reminder_date}}</div>
                <div class="col-md-2">
                  <strong>{{reminder.status}}</strong>
                </div>
                <div class="col-md-2">
                  <inertia-link :href="$route('reminder.view', {lead: lead, reminder: reminder})">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      class="arrow-icon float-right"
                    >
                      <polygon
                        points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
                      />
                    </svg>
                  </inertia-link>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="card mt-3" v-if="lead.reminders.length == 0">
        <div class="card-header">Reminders</div>
        <div class="card-body d-flex justify-content-center">
          <inertia-link
            class="btn btn-success"
            :href="$route('reminder.add', {lead: leadProp})"
          >Add a reminder</inertia-link>
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
    leadProp: Object,
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
        package: ""
      }
    };
  },
  created() {
    this.lead = this.leadProp;
  },
  methods: {
    async handleSubmit(lead) {
      let response = await this.$inertia.post("/leads/update", lead);
    }
  }
};
</script>
