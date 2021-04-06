<template>
    <b-container fluid>
        <div class="position-relative">
            <div class="overlay">
                <b-img class="w-100 " src="/images/main-page-banner.jpg"></b-img>
            </div>
        </div>

        <b-row>
            <div class="col-12">
                <b-jumbotron>
                    <b-container fluid>
                        <b-row>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" placeholder="Ном" v-model="filters.title"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" placeholder="Муаллиф" v-model="filters.author"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" placeholder="Сол" v-model="filters.year"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.type">
                                    <b-form-select-option :value="null">-- Намудҳо --</b-form-select-option>
                                    <b-form-select-option value="Китобҳои бадеӣ">Китобҳои бадеӣ</b-form-select-option>
                                    <b-form-select-option value="Китобҳои дарсӣ">Китобҳои дарсӣ</b-form-select-option>
                                    <b-form-select-option value="Дарсҳои видеоӣ">Дарсҳои видеоӣ</b-form-select-option>
                                    <b-form-select-option value="Китобҳои интерактивӣ">Китобҳои интерактивӣ</b-form-select-option>
                                    <b-form-select-option value="Намоишномаҳо">Намоишномаҳо</b-form-select-option>
                                    <b-form-select-option value="Маводҳои аудиоӣ">Маводҳои аудиоӣ</b-form-select-option>
                                    <b-form-select-option value="Маводҳои соҳавӣ">Маводҳои соҳавӣ</b-form-select-option>
                                    <b-form-select-option value="Маводҳои дарсҳои иловагӣ">Маводҳои дарсҳои иловагӣ</b-form-select-option>
                                    <b-form-select-option value="Маводҳои такмили ихтисоси омӯзгорон">Маводҳои такмили ихтисоси омӯзгорон</b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.language">
                                    <b-form-select-option :value="null">-- Забон --</b-form-select-option>
                                    <b-form-select-option value="ru">Русӣ</b-form-select-option>
                                    <b-form-select-option value="tj">Тоҷикӣ</b-form-select-option>
                                    <b-form-select-option value="en">Англисӣ</b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.category">
                                    <b-form-select-option :value="null">-- Фан --</b-form-select-option>
                                    <b-form-select-option v-for="category in categories" :value="category.id"
                                                          :key="category.id">{{ category.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.theme">
                                    <b-form-select-option :value="null">-- Мавзӯъ --</b-form-select-option>
                                    <b-form-select-option v-for="theme in themes" :value="theme.id"
                                                          :key="theme.id">{{ theme.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.grade">
                                    <b-form-select-option :value="null">-- Синф --</b-form-select-option>
                                    <b-form-select-option v-for="grade in grades" :value="grade.id"
                                                          :key="grade.id">{{ grade.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.role">
                                    <b-form-select-option :value="null">-- Истифодабаранда --</b-form-select-option>
                                    <b-form-select-option v-for="role in roles" :value="role.id"
                                                          :key="role.id">{{ role.local_name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <suggestion-input displayPropertyName="name"
                                                  ref="tagInput"
                                                  placeholder="Барчаспҳо"
                                                  size="sm"
                                                  @selected="onTagSelected"
                                                  action-url="/tags/filtered/"
                                                  show
                                >
                                </suggestion-input>
                            </b-form-group>
                        </b-row>
                        <b-row>
                            <b-form-group class="col-12">
                                <ul
                                    class="list-unstyled d-inline-flex flex-wrap mb-0">
                                    <b-card
                                        v-for="tag in filters.tags"
                                        :key="tag.name"
                                        :id="`tags_${tag.name.replace(/\s/g, '_')}_`"
                                        tag="li"
                                        class="mt-1 mr-1 bg-light"
                                        body-class="py-1 pr-2 text-nowrap"
                                    >
                                        <strong>{{ tag.name }}</strong>
                                        <b-button
                                            @click="removeTag(tag.name)"
                                            variant="link"
                                            class="text-decoration-none"
                                            size="sm"
                                            :aria-controls="`albumsTagList__${tag.name.replace(/\s/g, '_')}_`"
                                        >&times;
                                        </b-button>
                                    </b-card>
                                </ul>

                            </b-form-group>
                        </b-row>
                        <b-row align-h="center">
                            <b-button size="sm" variant="info" @click="filter">Ҷустуҷӯ</b-button>
                        </b-row>
                    </b-container>

                </b-jumbotron>
            </div>

        </b-row>
        <b-row>
            <resource-masonry-with-data-fetching ref="resources-list"
                                                 :resources="this.pagination.data"
                                                 :url="fetchUrl">
            </resource-masonry-with-data-fetching>
        </b-row>

    </b-container>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";
import SuggestionInput from "@/Components/Inputs/SuggestionInput";

export default {
    name: 'Index',
    components: {ResourceMasonryWithDataFetching, SuggestionInput},
    props: {
        pagination: Object,
        categories: Array,
        themes: Array,
        grades: Array,
        roles: Array
    },
    data() {
        return {
            filters: {
                title: null,
                author: null,
                year: null,
                type: null,
                language: null,
                description: null,
                category: null,
                theme: null,
                grade: null,
                role: null,
                tags: [],
            },
            fetchUrl: route('resources.index') + '?'
        }
    },
    methods: {
        onTagSelected(tag) {
            if (!this.filters.tags.find(t => t.name === tag.name))
                this.filters.tags.push(tag)
            this.clearTagInput();
        },
        removeTag(name) {
            this.filters.tags = this.filters.tags.filter(t => t.name !== name);
        },
        filter() {
            this.fetchUrl = this.route('filtered-resources.index') + '?';

            if (this.filters.name)
                this.fetchUrl += `name=${this.filters.name}`;
            if (this.filters.author)
                this.fetchUrl += `&author=${this.filters.author}`;
            if (this.filters.year)
                this.fetchUrl += `&year=${this.filters.year}`;
            if (this.filters.type)
                this.fetchUrl += `&type=${this.filters.type}`;
            if (this.filters.language)
                this.fetchUrl += `&language=${this.filters.language}`;
            if (this.filters.category)
                this.fetchUrl += `&category=${this.filters.category}`;
            if (this.filters.theme)
                this.fetchUrl += `&theme=${this.filters.theme}`;
            if (this.filters.grade)
                this.fetchUrl += `&grade=${this.filters.grade}`;
            if (this.filters.role)
                this.fetchUrl += `&role=${this.filters.role}`;
            if (this.filters.tags)
                this.fetchUrl += `&tags=` + this.filters.tags.map(t => t.id).join();


            let view = this.$refs['resources-list'];
            view.data = [];
            view.page = 0;
            view.stopFetching = false;
            this.$nextTick(_ => view.fetchResources())

        },
        clearTagInput() {
            this.$refs['tagInput'].query = '';
            this.$refs['tagInput'].options = [];
        },
    }
}
</script>

<style>
.overlay::before {
    content: "";
    position: absolute;
    background-color: #00000066;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
}

.overlay::after {
    content: "“Хонед, омӯзед ва рушд ёбед” – тавассути ин китобхонаи электронӣ.";
    color: white;
    position: absolute;
    text-align: center;
    top: 20%;
    right: 0;
    width: 100%;
    height: 100%;
    font-size: 1rem;
}

@media only screen and (min-width: 400px) {
    .overlay::after {
        top: 30% !important;
    }
}

@media only screen and (min-width: 768px) {
    .overlay::after {
        font-size: 1.8rem !important;
        top: 45% !important;
    }
}
</style>
