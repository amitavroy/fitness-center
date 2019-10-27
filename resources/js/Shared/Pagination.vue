<template>
    <nav aria-label="Page navigation example" v-if="showPagination">
        <ul class="pagination">
            <li class="page-item" v-for="(link, key) in links" :key="key" v-bind:class="isActive(link)">
                <inertia-link class="page-link" :href="link.url" v-if="link.url">{{ link.label }}</inertia-link>
                <a class="page-link" href="#" v-else @click.prevent="handleNoLink">{{ link.label }}</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: {
            links: Array,
        },
        computed: {
            showPagination() {
                return this.links.length > 3
            }
        },
        methods: {
            isActive(link) {
                return (link.active === true) ? 'active' : 'normal'
            },
            handleNoLink() {
                return false
            }
        }
    }
</script>
