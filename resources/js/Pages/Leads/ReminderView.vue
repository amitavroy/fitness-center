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
                        Reminder view
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add reminder</div>
                        <div class="card-body">
                            <reminder-form
                                :main-reminder="reminder"
                                :lead="lead"
                                @reminderSubmit="handleFormSubmit"
                                @addNewReminder="handleAddNewReminder"
                            ></reminder-form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </layout>
</template>

<script>
    import Layout from './../../Shared/Layout';
    import ReminderForm from './ReminderForm';
    export default {
        props: {
            lead: Object,
            reminder: Object
        },
        components: {
            Layout, ReminderForm
        },
        methods: {
            handleFormSubmit(postData) {
                console.log('postData', postData);
            },
            handleAddNewReminder(data) {
                const postData = {
                    reminder_id: data.id
                }

                this.$inertia.post(route('reminder.update'), postData);
            }
        }
    }
</script>
