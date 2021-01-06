<template>
    <div v-images-loaded:on.progress="resizeAllGridItems" class="grid">
        <div class="item" v-for="resource in pagination.data" :key="resource.id">
            <a :href="route('resources.show', resource.id)">
                <div class="content">
                    <div class="resource-preview">
                        <b-img :src="getCoverUrl(resource.cover_id)"></b-img>
                        <div class="title">
                            {{resource.title}}
                        </div>s
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
import {getImageUrl} from "@/Api/imageGalleryApi";
import MasonryGrid from "@/Mixins/MasonryGrid";

export default {
    name: 'Index',
    props: {
        pagination: Object
    },
    mixins: [
        MasonryGrid
    ],
    methods: {
        getCoverUrl(coverId) {
            return getImageUrl(coverId, {width: 200})
        },
    }
}
</script>

<style>
.grid {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-auto-rows: 15px;
}

.item {
    background-color: #ffffff;
    margin: 10px;
    width: 200px;
}

.content{
    box-shadow: 4px 7px 10px 0px rgba(0,0,0,0.44);
}

.content :hover{
    cursor: pointer;
}

.resource-preview{
    position: relative;
}

.title {
    background-color: #17a2b8;
    color: #ffffff;
    padding: 2px 4px;
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    font-size: 0.8rem;
}
</style>
