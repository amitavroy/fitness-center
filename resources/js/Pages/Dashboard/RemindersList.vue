<template>
    <div class="card">
        <div class="card-header">Reminders list</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"
                    v-for="reminder in reminders" :key="reminder.id">
                    <inertia-link :href="$route('reminder.view', {lead: reminder.lead, reminder: reminder})">
                        <strong>{{reminder.lead.name}}</strong>
                        <br>
                        {{reminder.reminder}}
                    </inertia-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            reminders: Array
        }
    }
</script>
