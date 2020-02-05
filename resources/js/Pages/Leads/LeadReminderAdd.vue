<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <inertia-link :href="$route('lead.view', {lead: lead})">Reminders</inertia-link>
            <span class="breadcrumb-sep">/</span>
            Add Reminder
          </h1>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">Add Reminder</div>
            <div class="card-body">
              <reminder-form
                :prop-reminder="reminder"
                :lead="lead"
                @reminderSubmit="handleReminderSave"
              ></reminder-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
import ReminderForm from "./ReminderForm";
export default {
  props: {
    lead: Object
  },
  components: {
    Layout,
    ReminderForm
  },
  created() {
    this.reminder.reminder_date = this.getToday();
  },
  data() {
    return {
      reminder: {
        reminder: "",
        reminder_date: "",
        note: ""
      }
    };
  },
  methods: {
    handleReminderSave(reminder) {
      this.$inertia.post(route("reminder.save"), reminder);
    },
    getToday() {
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      return today;
    }
  }
};
</script>
