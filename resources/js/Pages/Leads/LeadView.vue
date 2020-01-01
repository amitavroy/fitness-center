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

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Lead details</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name" v-model="lead.name" id="name" tabindex="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" placeholder="Enter phone" v-model="lead.phone" id="phone" tabindex="3">
                                        </div>
                                        <div class="form-group">
                                            <label for="ip">Interested package</label>
                                            <input type="text" class="form-control" placeholder="Enter the package interested in" v-model="lead.interested_package" id="ip" tabindex="5">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" placeholder="Enter email" v-model="lead.email" id="email" tabindex="2">
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Birthday</label>
                                            <input type="date" class="form-control" placeholder="Enter dob" v-model="lead.dob" id="dob" tabindex="4">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success">Save</button>
                                        <inertia-link class="btn btn-warning" :href="$route('lead.list')">Back</inertia-link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" v-if="lead.reminders.length > 0">
                        <div class="card-header">Lead reminders</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action"
                                    v-for="reminder in lead.reminders" :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-6">{{reminder.reminder}}</div>
                                        <div class="col-md-2">{{reminder.reminder_date}}</div>
                                        <div class="col-md-2"><strong>{{reminder.status}}</strong></div>
                                        <div class="col-md-2">
                                            <inertia-link :href="$route('reminder.view', {lead: lead, reminder: reminder})" class="float-right">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-icon">
                                                    <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                                                </svg>
                                            </inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" v-else>
                        <div class="card-header">Lead reminders</div>
                        <div class="card-body d-flex justify-content-center">
                            <inertia-link :href="$route('reminder.add', {lead: lead})" class="btn btn-success">
                                Add new reminder
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </layout>
</template>

<script>
    import Layout from './../../Shared/Layout'
    export default {
        props: {
            leadProp: Object
        },
        components: {
            Layout
        },
        data() {
            return {
                lead: {
                    name: '',
                    email: '',
                    phone: '',
                    dob: '',
                    package: ''
                }
            }
        },
        created() {
            this.lead = this.leadProp
        },
        methods: {
            async handleSubmit() {
                let response = await this.$inertia.post('/leads/update', this.lead)
            }
        }
    }
</script>
