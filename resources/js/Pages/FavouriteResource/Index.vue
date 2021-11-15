<template>
    <b-col class="mt-5" cols="12">
        <h1 class="mb-4 first-letter-capitalize">{{ $t('label.favourite') }}</h1>
        <resource-masonry-with-data-fetching :resources="pagination.data"
                                             :url="route('my-resources')">
        </resource-masonry-with-data-fetching>
    </b-col>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: "Index",
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object
    }
}
</script>

<style>
h1{
    margin-left: 20px;
}
</style>
