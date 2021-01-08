<template>
    <b-row align-h="center">
        <b-col lg="10">
            <b-card>
                <b-card-body>
                    <b-row>
                        <b-col>
                            <div class="mb-4">
                                <b-img :src="coverUrl"></b-img>
                            </div>
                            <a class="text-info" download :href="route('files.download', resource.file_id)">Скачать ресурс</a>
                            <b-container class="mt-4" fluid>
                                <b-row>
                                    <a class="btn btn-info mr-3" :href="route('resources.edit', resource.id)"><b-icon-pencil></b-icon-pencil></a>
                                    <b-button><b-icon-trash></b-icon-trash></b-button>
                                </b-row>
                            </b-container>
                        </b-col>
                        <b-col>
                            <div>
                                <h1>{{ resource.title }}</h1>
                                <h3>Автор: {{ resource.author }}</h3>
                                <p class="bg-danger pb-1 px-1" v-if="!resource.is_public">Доступ ограничен</p>
                                <p>Год: {{ resource.year }}</p>
                                <p>Категория: {{ resource.category.name }}</p>
                                <p>{{ resource.description }}</p>
                                <b-container fluid>
                                    <b-row>
                                        <b-tag v-for="tag in resource.tags" :key="tag.name" size="lg" no-remove pill
                                               variant="info">
                                            {{ tag.name }}
                                        </b-tag>
                                    </b-row>
                                </b-container>
                            </div>
                        </b-col>
                    </b-row>
                </b-card-body>
            </b-card>
        </b-col>
    </b-row>
</template>

<script>

import {getImageUrl} from '@/Api/imageGalleryApi';

export default {
    name: "Show",
    props: {
        resource: Object
    },
    computed: {
        coverUrl() {
            return getImageUrl(this.resource.cover_id, {width: 300})
        }
    }
}
</script>

<style scoped>
img{
    box-shadow: 4px 7px 10px 0px rgba(0, 0, 0, 0.44);
}
</style>
