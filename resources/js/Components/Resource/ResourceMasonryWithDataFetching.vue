<template>
    <b-col cols="12" v-images-loaded="onImagesLoaded">
        <resource-masonry :resources="data"></resource-masonry>
        <b-row align-h="center" class="mt-5" v-b-visible.500="fetchResources">
            <b-spinner v-if="fetching" variant="info"></b-spinner>
        </b-row>
    </b-col>
</template>

<script>
import MasonryGrid from "@/Mixins/MasonryGrid";
import ResourceMasonry from "@/Components/Resource/ResourceMasonry";

export default {
    name: "ResourceMasonryWithDataFetching",
    components: {ResourceMasonry},
    props: {
        url: {
            type: String,
            required: true
        },
        resources: Array
    },
    data() {
        return {
            data: this.resources,
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
            axios.get(this.url + '?page=' + this.page)
                .then(response => {
                    if (response.data.data.length > 0)
                        this.data.push(...response.data.data);
                    else this.stopFetching = true;
                }).finally(() => this.fetching = false)
        },
        onImagesLoaded() {
            setTimeout(_ => this.imagesLoaded = true, 100);
        }
    }
}
</script>
