<template>
    <b-col class="mt-5" cols="12">
        <h1 class="mb-4">{{ theme.name }}</h1>
        <resource-masonry-with-data-fetching :resources="pagination.data"
                                             :url="route('theme-resources.show', theme.id)"></resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Show",
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object,
        theme: Object
    }
}
</script>
<style>
h1 {
    margin-left: 20px;
}
</style>
