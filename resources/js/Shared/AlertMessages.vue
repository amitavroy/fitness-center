<template>
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <div v-if="$page.flash.message" class="alert alert-primary">{{ $page.flash.message }}</div>
            <div v-if="$page.flash.success" class="alert alert-success">{{ $page.flash.success }}</div>
            <div v-if="$page.flash.error" class="alert alert-danger">{{ $page.flash.error }}</div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    updated() {
        var messageBlock = document.querySelector('.alert');
        if (messageBlock) {
            setTimeout(() => {
                this.$page.flash.message = "";
                this.$page.flash.success = "";
                this.$page.flash.error = "";
            }, 5000)
        }
    }
}
</script>
