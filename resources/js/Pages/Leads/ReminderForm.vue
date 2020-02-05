<template>
  <form @submit.prevent="handleSubmit">
    <div class="form-group">
      <label for="reminder">Reminder</label>
      <textarea name="reminder" id="reminder" class="form-control" v-model="reminder.reminder"></textarea>
    </div>

    <div class="form-group">
      <label for="date">Reminder date</label>
      <input
        type="date"
        name="date"
        id="date"
        class="form-control"
        v-model="reminder.reminder_date"
      />
    </div>

    <button class="btn btn-success">Save</button>
    <inertia-link :href="$route('lead.view', {lead: lead})" class="btn btn-warning">Back</inertia-link>
  </form>
</template>

<script>
export default {
  props: {
    propReminder: Object,
    lead: Object
  },
  created() {
    this.reminder = this.propReminder;
  },
  data() {
    return {
      reminder: {
        reminder: "",
        reminder_date: ""
      }
    };
  },
  methods: {
    handleSubmit() {
      let postData = this.reminder;
      postData.lead_id = this.lead.id;

      this.$emit("reminderSubmit", postData);
    }
  }
};
</script>
