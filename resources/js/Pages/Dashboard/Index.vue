<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h4>Welcome, {{fname}} {{lname}}</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <reminder-list :reminders="reminders"></reminder-list>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
import ReminderList from "./RemindersList";
export default {
  components: {
    Layout,
    ReminderList
  },
  props: ["fname", "lname", "reminders"]
};
</script>
