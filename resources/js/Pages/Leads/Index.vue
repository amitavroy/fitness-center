<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
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
                            <th>DOB</th>
                            <th>Package</th>
                            <th>Added On</th>
                            <th></th>
                        </tr>
                        <tr v-for="lead in leads.data" :key="lead.id">
                            <td>{{lead.id}}</td>
                            <td>{{lead.name}}</td>
                            <td>{{lead.email}}</td>
                            <td>{{lead.phone}}</td>
                            <td>{{lead.dob}}</td>
                            <td>{{lead.interested_package}}</td>
                            <td>{{lead.created_at}}</td>
                            <td>
                                <inertia-link :href="$route('lead.view', {lead: lead})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-icon">
                                        <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
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
    import Layout from './../../Shared/Layout'
    import Pagination from './../../Shared/Pagination'
    export default {
        components: {
            Layout,
            Pagination
        },
        props: ['leads']
    }
</script>
