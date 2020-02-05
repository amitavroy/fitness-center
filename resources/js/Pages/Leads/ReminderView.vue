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
            Edit Reminder
          </h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Edit reminder</div>
            <div class="card-body">
              <div class="form-group">
                <label for="reminder">Reminder</label>
                <textarea
                  name="reminder"
                  id="reminder"
                  class="form-control"
                  v-model="localReminder.reminder"
                ></textarea>
              </div>

              <div class="form-group">
                <label for="date">Reminder date</label>
                <input
                  type="date"
                  name="date"
                  id="date"
                  class="form-control"
                  v-model="localReminder.reminder_date"
                />
              </div>

              <div
                class="form-group"
                v-if="reminder.status == 'Completed' && reminder.note != null"
              >
                <label for="note">Note</label>
                <textarea name="note" id="note" class="form-control" v-model="localReminder.note"></textarea>
              </div>

              <div v-if="reminder.status != 'Completed'">
                <button class="btn btn-success" @click="handleReminderEdit">Add new reminder</button>
                <button class="btn btn-outline-danger" @click="handleReminderClose">Close reminder</button>
              </div>

              <div v-else>This reminder is closed.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
export default {
  props: {
    lead: Object,
    reminder: Object
  },
  components: {
    Layout
  },
  created() {
    console.log("Created was called");
    this.localReminder = this.reminder;
  },
  beforeMount() {
    console.log("Before mount");
  },
  data() {
    return {
      localReminder: {
        userId: "",
        leadId: "",
        reminder: "",
        reminder_date: "",
        note: "",
        status: ""
      }
    };
  },
  methods: {
    handleReminderEdit() {
      if (!this.handleReminderAndNoteValidation()) {
        return;
      }

      const postData = {
        note: this.localReminder.note,
        reminder_id: this.localReminder.id
      };

      this.$inertia.post(route("reminder.update"), postData);
    },
    handleReminderClose() {
      if (!this.handleReminderAndNoteValidation()) {
        return;
      }
    },
    handleReminderAndNoteValidation() {
      if (this.localReminder.reminder == "") {
        alert("The reminder cannot be empty");
        return false;
      }
      return true;
    }
  }
};
</script>
