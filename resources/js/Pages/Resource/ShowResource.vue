<template>
    <b-col class="mx-auto" lg="10">
        <b-card>
            <b-container fluid>
                <b-row>
                    <b-col sm="6" md="5" lg="4">
                        <div class="mb-4">
                            <div class="cover-wrapper">
                                <b-img class="resource-cover" :src="coverUrl"></b-img>
                                <template v-if="$page.user">
                                    <b-icon-bookmark-fill v-if="resource.is_favourite" variant="danger" scale="1.5"
                                                          class="bookmark"
                                                          @click="removeFromFavourite"></b-icon-bookmark-fill>
                                    <b-icon-bookmark v-else scale="1.5" class="bookmark"
                                                     @click="addToFavourite"></b-icon-bookmark>
                                </template>
                            </div>
                        </div>
                        <b-container fluid class="text-secondary mb-2">
                            <b-row align-v="baseline">
                                <b-icon-eye class="mr-1" shift-v="-2"></b-icon-eye>
                                <span class="mr-3">{{resource.views}}</span>

                                <b-icon-download class="mr-1" shift-v="-2"></b-icon-download>
                                <span>{{resource.downloads}}</span>
                            </b-row>
                        </b-container>
                        <a class="btn btn-info" download :href="route('files.download', resource.file_id)">
                            <b-icon-arrow-down></b-icon-arrow-down>
                            Скачать ресурс
                        </a>
                        <b-container class="mt-4" fluid v-if="resource.is_editable">
                            <b-row>
                                <a class="btn btn-info mr-3" :href="route('resources.edit', resource.id)">
                                    <b-icon-pencil></b-icon-pencil>
                                </a>
                                <b-button @click="destroy">
                                    <b-icon-trash></b-icon-trash>
                                </b-button>
                            </b-row>
                        </b-container>
                    </b-col>
                    <b-col>
                        <div>
                            <h1>{{ resource.title }}</h1>
                            <h3>Автор: {{ resource.author }}</h3>
                            <p class="bg-danger pb-1 px-1" v-if="!resource.is_public">Доступ ограничен</p>
                            <p v-if="resource.year">Год: {{ resource.year }}</p>
                            <p>Категория: {{ resource.category.name }}</p>
                            <p v-if="resource.description">{{ resource.description }}</p>
                            <b-container fluid>
                                <b-row>
                                    <b-tag class="mb-2" v-for="tag in resource.tags" :key="tag.name" size="lg" no-remove
                                           pill
                                           variant="info">
                                        {{ tag.name }}
                                    </b-tag>
                                </b-row>
                            </b-container>
                        </div>
                    </b-col>
                </b-row>
            </b-container>

        </b-card>
    </b-col>
</template>

<script>

import {getImageUrl} from '@/Api/imageGalleryApi';

export default {
    name: "Show",
    props: {
        resource: Object
    },
    data() {
        return {
            submitting: false
        }
    },
    computed: {
        coverUrl() {
            return getImageUrl(this.resource.cover_id, {width: 350})
        }
    },
    methods: {
        destroy() {
            this.$bvModal.msgBoxConfirm('Вы действительно хотите удалить ресурс "' + this.resource.title + '"?', {
                centered: true,
                buttonSize: 'sm',
                okTitle: 'Удалить',
                okVariant: 'info',
                cancelTitle: 'Отмена',
                cancelVariant: 'secondary',
                title: 'Подтверждение удаления'
            }).then(confirmed => {
                if (confirmed)
                    this.$inertia.delete(route('resources.destroy', this.resource.id))
            })
        },
        addToFavourite() {
            if (this.submitting)
                return;

            this.submitting = true;
            axios.post(route('favourite.store'), {resource: this.resource.id})
                .then(_ => this.resource.is_favourite = true)
                .finally(() => this.submitting = false)
        },
        removeFromFavourite() {
            if (this.submitting)
                return

            this.submitting = true;
            axios.delete(route('favourite.destroy', this.resource.id))
                .then(_ => this.resource.is_favourite = false)
                .finally(() => this.submitting = false)
        }
    }
}
</script>

<style scoped>

.cover-wrapper {
    position: relative;
}

.resource-cover {
    box-shadow: 4px 7px 10px 0px rgba(0, 0, 0, 0.44);
    width: 100%;
}

.bookmark {
    position: absolute;
    right: 18px;
}

.bookmark:hover {
    cursor: pointer;
}
</style>
