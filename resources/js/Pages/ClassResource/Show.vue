<template>
    <b-col cols="12">
        <h1 class="mb-4">Класс {{ classId }}</h1>
        <resource-masonry-with-data-fetching :resources="pagination.data"
                                             :url="route('class-resources.show')"></resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Show",
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object,
        classId: String
    }
}
</script>
<style>
h1 {
    margin-left: 20px;
}
</style>
