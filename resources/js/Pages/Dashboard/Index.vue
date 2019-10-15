<template>
    <div>
        <p>This is Dashboard, welcome {{fname}}, {{lname}}</p>
    </div>
</template>

<script>
export default {
    props: ['fname', 'lname']
}
</script>
