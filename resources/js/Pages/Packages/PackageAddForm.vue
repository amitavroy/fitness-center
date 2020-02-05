<template>
  <form v-on:submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" v-model="localPackage.name" />
      <div v-if="$page.errors.name" class="error">{{ $page.errors.name[0] }}</div>
    </div>

    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="text" class="form-control" v-model="localPackage.amount" />
      <div v-if="$page.errors.amount" class="error">{{ $page.errors.amount[0] }}</div>
    </div>

    <div class="form-group">
      <label for="amount">Number of days</label>
      <input type="number" class="form-control" v-model="localPackage.number_of_days" />
      <div v-if="$page.errors.number_of_days" class="error">{{ $page.errors.number_of_days[0] }}</div>
    </div>

    <button class="btn btn-success">Save</button>
  </form>
</template>

<script>
export default {
  props: {
    packageData: Object
  },
  created() {
    this.localPackage = this.packageData;
  },
  data() {
    return {
      localPackage: {
        name: "",
        amount: 0.0,
        number_of_days: 0
      }
    };
  },
  methods: {
    handleFormSubmit() {
      let postData = {
        name: this.localPackage.name,
        amount: this.localPackage.amount,
        number_of_days: this.localPackage.number_of_days
      };

      this.$emit("packageAdded", postData);

      this.localPackage = {
        name: "",
        amount: 0.0,
        number_of_days: 0
      };
    }
  }
};
</script>
