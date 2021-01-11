<template>
    <div v-images-loaded:on.progress="resizeAllGridItems" class="masonry-grid">
        <div class="item" v-for="resource in resources" :key="resource.id">
            <a :href="route('resources.show', resource.id)">
                <div class="content">
                    <div class="resource-preview">
                        <b-img :src="getCoverUrl(resource.cover_id)"></b-img>
                        <div class="title">
                            {{ resource.title }}
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
