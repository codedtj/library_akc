<template>
    <b-row align-h="center">
        <b-col md="10">
            <b-card>
                <b-card-body>
                    <b-row>
                        <b-col>
                            <div>
                                <b-img :src="coverUrl"></b-img>
                            </div>
                            <a href="#">Скачать ресурс</a>
                        </b-col>
                        <b-col>
                            <div>
                                <h1>{{ resource.title }}</h1>
                                <h3>Автор: {{ resource.author }}</h3>
                                <p>Год: {{ resource.year }}</p>
                                <p>{{ resource.description }}</p>
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

</style>
