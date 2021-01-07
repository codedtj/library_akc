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
.grid {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-auto-rows: 15px;
}

.item {
    background-color: #ffffff;
    margin: 10px;
    width: 200px;
}

.content {
    box-shadow: 4px 7px 10px 0px rgba(0, 0, 0, 0.44);
}

.content :hover {
    cursor: pointer;
}

.resource-preview {
    position: relative;
}

.title {
    background-color: #17a2b8;
    color: #ffffff;
    padding: 2px 4px;
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    font-size: 0.8rem;
}
</style>
