<template>
    <layout>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <p>Welcome {{$page.auth.user.name}}</p>
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
import Layout from './../../Shared/Layout';
import ReminderList from './ReminderList';
export default {
    components: {
        Layout, ReminderList
    },
    props: ['reminders']
}
</script>
