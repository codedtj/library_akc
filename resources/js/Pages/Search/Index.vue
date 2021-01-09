<template>
    <b-col cols="12">
        <h1> {{ query }} </h1>
        <resource-masonry-with-data-fetching :resources="this.pagination.data"
                                             :url="route('search', query)"></resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Index",
    components: {ResourceMasonryWithDataFetching, ResourceMasonry},
    props: {
        pagination: Object,
        query: String
    }
}
</script>

<style scoped>
h1:first-letter {
    text-transform: uppercase;
    margin-left: 10px;
}
</style>
