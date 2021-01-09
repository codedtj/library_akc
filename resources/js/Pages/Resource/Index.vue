<template>
    <resource-masonry-with-data-fetching :resources="this.pagination.data"
                                         :url="route('resources.index')"></resource-masonry-with-data-fetching>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";

export default {
    name: 'Index',
    components: {ResourceMasonryWithDataFetching},
    props: {
        pagination: Object
    }
}
</script>
