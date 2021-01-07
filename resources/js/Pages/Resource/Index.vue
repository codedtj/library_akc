<template>
    <resource-masonry :resources="resources"></resource-masonry>
</template>

<script>
import MasonryGrid from "@/Mixins/MasonryGrid";
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";

export default {
    name: 'Index',
    components: {ResourceMasonry},
    mounted() {
        this.resources = this.pagination.data.filter(_ => true);
    },
    props: {
        pagination: Object
    },
    data() {
        return {
            resources: []
        }
    },
    mixins: [
        MasonryGrid
    ],
    methods: {}
}
</script>

<style>

</style>
