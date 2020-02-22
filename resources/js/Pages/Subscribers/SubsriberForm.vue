<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" v-model="localLead.name" class="form-control" disabled />
    </div>

    <div class="form-group">
      <label for="interest_pacakge">Interested package</label>
      <select name="ip" id="ip" class="form-control" v-model="lead.interested_package" tabindex="5">
        <option
          v-for="(option, key) in packages"
          v-bind:value="option.name"
          :key="key"
        >{{option.name}} ({{option.number_of_days}} days for ₹{{option.amount}})</option>
      </select>
    </div>

    <div class="form-group">
      <label for="date">Subscription ends at</label>
      <input type="date" class="form-control" v-model="subcriptionEndsDate" disabled />
    </div>

    <div class="form-group">
      <label for="date">Subscription price</label>
      <input type="text" class="form-control" v-model="userPaymentAmount" disabled />
    </div>

    <button class="btn btn-success">Save</button>
  </form>
</template>

<script>
import moment from "moment";
export default {
  props: {
    lead: Object,
    packages: Array
  },
  data() {
    return {
      localLead: {
        name: "",
        interested_package: ""
      }
    };
  },
  created() {
    this.localLead = this.lead;
  },
  methods: {
    handleFormSubmit() {
      const userPackage = this.packages.filter(pckg => {
        return pckg.name === this.localLead.interested_package;
      })[0];

      const postData = {
        name: this.localLead.name,
        package_id: userPackage.id,
        lead_id: this.lead.id,
        renewal_date: moment()
          .add(userPackage.number_of_days, "days")
          .format("YYYY-MM-DD"),
        amount: userPackage.amount
      };
      this.$emit("subscribeFormSubmit", postData);
    }
  },
  computed: {
    subcriptionEndsDate() {
      const userPackage = this.packages.filter(pckg => {
        return pckg.name === this.localLead.interested_package;
      })[0];

      return moment()
        .add(userPackage.number_of_days, "days")
        .format("YYYY-MM-DD");
    },
    userPaymentAmount() {
      const userPackage = this.packages.filter(pckg => {
        return pckg.name === this.localLead.interested_package;
      })[0];
      return "₹ " + userPackage.amount;
    }
  }
};
</script>
