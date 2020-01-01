<template>
    <layout>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('lead.view', {lead: lead})">Lead details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder add note
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add note</div>
                        <div class="card-body">
                            <form @submit.prevent="handleAddNote">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" class="form-control" v-model="note"></textarea>
                                    <div v-if="$page.errors.note" class="error">{{ $page.errors.note[0] }}</div>
                                </div>

                                <button class="btn btn-success">Close</button>
                            </form>
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
            lead: Object,
            reminder: Object
        },
        data() {
            return {
                note: ''
            }
        },
        components: {
            Layout
        },
        methods: {
            handleAddNote() {
                const postData = {
                    reminder_id: this.reminder.id,
                    note: this.note
                }

                this.$inertia.post(route('reminder.close'), postData);
            }
        }
    }
</script>
