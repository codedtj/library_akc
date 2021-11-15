<template>
    <b-col class="mt-5" cols="12">
        <h1 class="mb-4 first-letter-capitalize">{{ $t('label.' + grade.name.replaceAll(' ', '_')) }}</h1>
        <resource-masonry-with-data-fetching :resources="pagination.data"
                                             :url="route('grade-resources.show', grade.id)"></resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Show",
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object,
        grade: Object
    }
}
</script>
<style>
h1 {
    margin-left: 20px;
}
</style>
