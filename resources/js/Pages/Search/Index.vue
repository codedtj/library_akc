<template>
    <div class="row">
        <b-col cols="12">
            <h1> {{ query }} </h1>
        </b-col>
        <b-col cols="12">
            <resource-masonry :resources="resources"></resource-masonry>
        </b-col>
    </div>
</template>

<script>
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";

export default {
    name: "Index",
    components: {ResourceMasonry},
    props: {
        pagination: Object,
        query: String
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
h1:first-letter {
    text-transform: uppercase;
    margin-left: 10px;
}
</style>
