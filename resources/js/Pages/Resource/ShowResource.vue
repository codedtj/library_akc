<template>
    <b-col class="mx-auto" lg="10">
        <b-card>
            <b-card-body>
                <b-row>
                    <b-col>
                        <div class="mb-4">
                            <div class="position-relative" style="width: 300px">
                                <b-img :src="coverUrl"></b-img>
                                <template v-if="$page.user">
                                    <b-icon-bookmark-fill v-if="resource.is_favourite" variant="danger" scale="1.5"
                                                          class="bookmark"
                                                          @click="removeFromFavourite"></b-icon-bookmark-fill>
                                    <b-icon-bookmark v-else scale="1.5" class="bookmark"
                                                     @click="addToFavourite"></b-icon-bookmark>
                                </template>
                            </div>
                        </div>
                        <a class="btn btn-info" download :href="route('files.download', resource.file_id)">
                            <b-icon-arrow-down></b-icon-arrow-down>
                            Скачать
                            ресурс</a>
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
            return getImageUrl(this.resource.cover_id, {width: 300})
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
img {
    box-shadow: 4px 7px 10px 0px rgba(0, 0, 0, 0.44);
}

.bookmark {
    position: absolute;
    right: 18px;
}

.bookmark:hover {
    cursor: pointer;
}
</style>
