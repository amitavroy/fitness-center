<template>
  <layout>
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h1 class="float-left">Subscribers</h1>
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
              <th>Renewal On</th>
              <th></th>
            </tr>
            <tr v-for="subscriber in subscribers.data" :key="subscriber.id">
              <td>{{subscriber.id}}</td>
              <td>
                <inertia-link href="#">{{subscriber.name}}</inertia-link>
              </td>
              <td>{{subscriber.email}}</td>
              <td>{{subscriber.phone}}</td>
              <td>{{subscriber.age}}</td>
              <td>{{subscriber.interested_package}}</td>
              <td>{{subscriber.renewal_date}}</td>
              <td>
                <inertia-link href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-icon">
                    <polygon
                      points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
                    />
                  </svg>
                </inertia-link>
              </td>
            </tr>
          </table>

          <pagination :links="subscribers.links"></pagination>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
  import Layout from './../../Shared/Layout';
  import Pagination from './../../Shared/Pagination';

  export default {
    props: {
      subscribers: Object
    },
    components: {
      Layout,
      Pagination
    }
  }
</script>
