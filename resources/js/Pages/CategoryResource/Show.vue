<template>
    <b-col cols="12">
        <h1 class="mb-4">{{ category.name }}</h1>
        <resource-masonry-with-data-fetching :resources="pagination.data"
                                             :url="route('category-resources.show', category.id)">
        </resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Show",
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object,
        category: Object
    }
}
</script>

<style scoped>
h1 {
    margin-left: 20px;
}
</style>
