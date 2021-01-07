<template>
    <resource-masonry :resources="resources"></resource-masonry>
</template>

<script>
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";

export default {
    name: "Index",
    components: {ResourceMasonry},
    props: {
        pagination: Object
    },
    mounted() {
        this.resources = this.pagination.data.filter(_ => true);
    },
    data() {
        return {
            resources: []
        }
    }
}
</script>

<style scoped>

</style>
