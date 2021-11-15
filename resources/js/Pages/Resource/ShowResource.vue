<template>
    <b-col class="mx-auto mt-5" lg="10">
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
                                <span class="mr-3">{{ resource.views }}</span>

                                <b-icon-download class="mr-1" shift-v="-2"></b-icon-download>
                                <span>{{ resource.downloads }}</span>
                            </b-row>
                        </b-container>

                        <inertia-link class="btn btn-info mr-2" target="_blank" :href="route('resources.open', resource.id)">
                            <b-icon-file-earmark-text></b-icon-file-earmark-text>
                        </inertia-link>
                        <inertia-link class="btn btn-info mr-2" download :href="route('resources.download', resource.id)">
                            <b-icon-arrow-down></b-icon-arrow-down>
                        </inertia-link>
                        <template v-if="resource.is_editable">
                            <inertia-link class="btn btn-info mr-2" :href="route('resources.edit', resource.id)">
                                <b-icon-pencil></b-icon-pencil>
                            </inertia-link>
                            <b-button @click="destroy">
                                <b-icon-trash></b-icon-trash>
                            </b-button>
                        </template>


                    </b-col>
                    <b-col>
                        <div>
                            <h1>{{ resource.title }}</h1>
                            <h3 class="first-letter-capitalize">{{ $t('label.author') }}:{{ resource.author }}</h3>
                            <p class="bg-danger pb-1 px-1 first-letter-capitalize" v-if="!resource.is_public">
                                {{ $t('label.limited_access') }}</p>
                            <p v-if="resource.year" class="first-letter-capitalize">{{ $t('label.year') }}:
                                {{ resource.year }}</p>
                            <p v-if="resource.category" class="first-letter-capitalize">{{$tc('label.subject',1)}}:  {{ $t('label.' + resource.category.name.replaceAll(' ', '_')) }}</p>
                            <p v-if="resource.theme" class="first-letter-capitalize">{{ $tc('label.theme', 1) }}: {{ resource.theme.name }}</p>
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
            this.$bvModal.msgBoxConfirm('Оё Шумо хоҳиши несткунии мавод "' + this.resource.title + '"-ро доред?', {
                centered: true,
                buttonSize: 'sm',
                okTitle: 'Нест кардан',
                okVariant: 'info',
                cancelTitle: 'Бекор кардан',
                cancelVariant: 'secondary',
                title: 'Тасдиқи несткунӣ'
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
