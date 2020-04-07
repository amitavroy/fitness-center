<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h1 class="float-left">Leads</h1>
          <inertia-link :href="$route('lead.add')" class="float-right btn btn-primary">Add Lead</inertia-link>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <form class="form-inline" method="get" :action="$route('lead.list')">
            <input type="text" class="form-control mr-3 col-sm-4" placeholder="Search a lead by name or phone" name="search">
            <select name="package_search" id="search=package" class="form-control col-sm-2 mr-3">
              <option value="0" selected>All</option>
              <option value="3">Yearly package</option>
              <option value="2">Half yearly package</option>
              <option value="1">Monthly package</option>
            </select>
            <button class="btn btn-primary mr-3">Filter</button>
            <a :href="$route('lead.list')">Reset</a>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered bg-white">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Age</th>
              <th>Package</th>
              <th>Added On</th>
              <th></th>
            </tr>
            <tr v-for="lead in leads.data" :key="lead.id">
              <td>{{lead.id}}</td>
              <td>
                <inertia-link :href="$route('lead.view', {lead: lead})">{{lead.name}}</inertia-link>
              </td>
              <td>{{lead.email}}</td>
              <td>{{lead.phone}}</td>
              <td>{{lead.age}}</td>
              <td>{{lead.interested_package}}</td>
              <td>{{lead.created_at}}</td>
              <td>
                <inertia-link :href="$route('lead.view', {lead: lead})">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-icon">
                    <polygon
                      points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
                    />
                  </svg>
                </inertia-link>
              </td>
            </tr>
          </table>

          <pagination :links="leads.links"></pagination>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./../../Shared/Layout";
import Pagination from "./../../Shared/Pagination";
export default {
  components: {
    Layout,
    Pagination
  },
  props: ["leads"]
};
</script>
