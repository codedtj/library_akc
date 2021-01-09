<template>
    <b-col cols="12" v-images-loaded="onImagesLoaded">
        <resource-masonry :resources="resources"></resource-masonry>
        <b-row align-h="center" class="mt-5" v-b-visible.500="fetchResources">
            <b-spinner v-if="fetching" variant="info"></b-spinner>
        </b-row>
    </b-col>
</template>

<script>
import MasonryGrid from "@/Mixins/MasonryGrid";
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";

export default {
    name: 'Index',
    components: {ResourceMasonry},
    mounted() {
        this.resources.push(...this.pagination.data);
    },
    props: {
        pagination: Object
    },
    data() {
        return {
            resources: [],
            imagesLoaded: false,
            page: 1,
            fetching: false,
            stopFetching: false
        }
    },
    mixins: [
        MasonryGrid
    ],
    methods: {
        fetchResources: function () {
            if (this.stopFetching || !this.imagesLoaded || this.fetching)
                return;

            this.page++;
            this.fetching = true;
            axios.get(route('resources.index') + '?page=' + this.page)
                .then(response => {
                    if (response.data.data.length > 0)
                        this.resources.push(...response.data.data);
                        // console.log(response.data.data.filter(_ => true))
                    else this.stopFetching = true;
                }).finally(() => this.fetching = false)
        },
        onImagesLoaded() {
            setTimeout(_ => this.imagesLoaded = true, 100);
        }
    }
}
</script>

<style>

</style>
