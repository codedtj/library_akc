<template>
    <div v-images-loaded:on.progress="resizeAllGridItems" class="masonry-grid">
        <div class="item" v-for="resource in resources" :key="resource.id">
            <a :href="route('resources.show', resource.id)">
                <div class="content">
                    <div class="resource-preview">
                        <b-img :src="getCoverUrl(resource.cover_id)"></b-img>
                        <div class="title containger-fluid">
                            <div class="form-row">
                                <div class="col-8">{{ resource.title }}</div>
                                <a :href="route('resources.open', resource)" class="col-2">
                                    <img class="w-100" src="/icons/book-read.svg">
                                </a>
                                <a download :href="route('resources.download', resource)" class="col-2">
                                    <img class="w-100" src="/icons/download.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
import MasonryGrid from "@/Mixins/MasonryGrid";
import {getImageUrl} from "@/Api/imageGalleryApi";

export default {
    name: "ResourceMasonry",
    mixins: [MasonryGrid],
    props: {
        resources: Array
    },
    methods: {
        getCoverUrl(coverId) {
            return getImageUrl(coverId, {width: 350})
        }
    }
}
</script>
