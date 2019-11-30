<template>
    <layout>
        <div class="container">
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
    </layout>
</template>

<script>
import Layout from './../../Shared/Layout'
export default {
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
                interested_package: ''
            }
        }
    },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/leads/save', this.lead)
        }
    }
}
</script>
