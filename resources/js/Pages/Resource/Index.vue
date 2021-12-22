<template>
    <div class="container-fluid">
        <!--        <div class="position-relative">-->
        <!--            <div class="overlay">-->
        <!--                <b-img class="w-100" src="/images/main-page-banner.jpg"></b-img>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="row">
            <div class="container-fluid pt-3 pt-md-5 bg-akf-favourite" style="color: white">
                <div class="row pt-md-5">
                    <div class="pl-md-5 col-md-7 pr-md-5">
                        <h1 class="px-md-4" style="font-size: 2.45rem">{{ $t('message.main_page') }}</h1>
                    </div>
                    <div class="col-md-5">
                        <p>{{ $t('message.random_buttons_instruction')}}</p>
                        <div class="d-flex w-100">
                            <inertia-link :href="route('resources.random')" class="mr-3 text-decoration-none">
                                <div style="color:black;padding: 5px 20px;background: #edc5eb" class="text-capitalize" >
                                    <img class="mr-2"
                                         style="filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%); width:24px;"
                                         src="/icons/material.svg">
                                    {{$tc('label.resource')}}
                                </div>
                            </inertia-link>
                            <inertia-link class="text-decoration-none" :href="route('videos.random')"
                                          style="border: solid white 2px">
                                <div style="color:white;padding: 4px 20px;" class="text-capitalize">
                                    <img class="mr-2" style="width: 24px" src="/icons/video.svg">
                                    {{$t('label.video')}}
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid pt-5 pb-3 pb-md-0 main-page-banner-container position-relative">
                <b-carousel
                    id="carousel-fade"
                    fade
                    style="text-shadow: 0px 0px 2px #000"
                    indicators
                    img-width="1024"
                    img-height="480"
                >
                    <b-carousel-slide
                        img-src="/images/main-page-carousel-1.JPG"
                    ></b-carousel-slide>
                    <b-carousel-slide
                        img-src="/images/main-page-carousel-2.JPG"
                    ></b-carousel-slide>
                </b-carousel>
            </div>
        </div>
        <b-row class="mt-3">
            <b-container fluid>
                <button @click="toggleShowFilter"
                        style="color: #01795c; background-color: transparent;border: none; outline: none;">
                    <span class="text-uppercase font-weight-bold">{{$tc('label.filter',2)}}</span>
                    <img v-if="showFilter" src="/icons/arrow-down.svg">
                    <img v-else style="transform: rotate(270deg)" src="/icons/arrow-down.svg">
                </button>
                <hr class="mt-1">
            </b-container>

            <div v-if="showFilter" class="col-12">
                <b-jumbotron class="bg-info">
                    <b-container fluid>
                        <b-row>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" :placeholder="$t('label.name')"
                                              v-model="filters.title"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" :placeholder="$t('label.author')"
                                              v-model="filters.author"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-input size="sm" :placeholder="$t('label.year')"
                                              v-model="filters.year"></b-form-input>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.type">
                                    <b-form-select-option :value="null">-- {{ $tc('label.type') }} --
                                    </b-form-select-option>
                                    <b-form-select-option value="Китобҳои бадеӣ">Китобҳои бадеӣ</b-form-select-option>
                                    <b-form-select-option value="Китобҳои дарсӣ">Китобҳои дарсӣ</b-form-select-option>
                                    <b-form-select-option value="Дарсҳои видеоӣ">Дарсҳои видеоӣ</b-form-select-option>
                                    <b-form-select-option value="Дарсҳои амалии виртуалӣ">Дарсҳои амалии виртуалӣ</b-form-select-option>
                                    <b-form-select-option value="Китобҳои интерактивӣ">Китобҳои интерактивӣ
                                    </b-form-select-option>
                                    <b-form-select-option value="Намоишномаҳо">Намоишномаҳо</b-form-select-option>
                                    <b-form-select-option value="Маводҳои аудиоӣ">Маводҳои аудиоӣ</b-form-select-option>
                                    <b-form-select-option value="Маводҳои соҳавӣ">Маводҳои соҳавӣ</b-form-select-option>
                                    <b-form-select-option value="Маводҳои дарсҳои иловагӣ">Маводҳои дарсҳои иловагӣ
                                    </b-form-select-option>
                                    <b-form-select-option value="Маводҳои такмили ихтисоси омӯзгорон">Маводҳои такмили
                                        ихтисоси омӯзгорон
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.language">
                                    <b-form-select-option :value="null">-- {{ $t('label.language') }} --
                                    </b-form-select-option>
                                    <b-form-select-option value="ru">{{ $t('label.russian_language') }}
                                    </b-form-select-option>
                                    <b-form-select-option value="tj">{{ $t('label.tajik_language') }}
                                    </b-form-select-option>
                                    <b-form-select-option value="en">{{ $t('label.english_language') }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.category">
                                    <b-form-select-option :value="null">-- {{ $tc('label.subject', 1) }} --
                                    </b-form-select-option>
                                    <b-form-select-option v-for="category in categories" :value="category.id"
                                                          :key="category.id">
                                        {{ $t('label.' + category.name.replaceAll(' ', '_')) }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.theme">
                                    <b-form-select-option :value="null">-- {{ $tc('label.theme', 1) }} --
                                    </b-form-select-option>
                                    <b-form-select-option v-for="theme in themes" :value="theme.id"
                                                          :key="theme.id">{{ theme.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.grade">
                                    <b-form-select-option :value="null">-- {{ $tc('label.grade', 1) }} --
                                    </b-form-select-option>
                                    <b-form-select-option v-for="grade in grades" :value="grade.id"
                                                          :key="grade.id">
                                        {{ $t('label.' + grade.name.replaceAll(' ', '_')) }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <b-form-select size="sm" v-model="filters.role">
                                    <b-form-select-option :value="null">-- {{ $tc('label.user') }} --
                                    </b-form-select-option>
                                    <b-form-select-option v-for="role in roles" :value="role.id"
                                                          :key="role.id">{{ $t('label.' + role.name + '_role') }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="col-sm-12 col-md-3">
                                <suggestion-input displayPropertyName="name"
                                                  ref="tagInput"
                                                  :placeholder="$tc('label.tag',2)"
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
                            <button class="text-capitalize py-1 px-4 search-btn"
                                    @click="filter">
                                {{ $t('label.search') }}
                            </button>
                        </b-row>
                    </b-container>

                </b-jumbotron>
            </div>
        </b-row>
        <b-row class="text-center">
            <h2 class="text-uppercase mx-auto">{{ $tc('label.resource', 2) }}</h2>
        </b-row>
        <b-row>
            <resource-masonry-with-data-fetching ref="resources-list"
                                                 :resources="this.pagination.data"
                                                 :url="fetchUrl">
            </resource-masonry-with-data-fetching>
        </b-row>

    </div>
</template>

<script>
import ResourceMasonryWithDataFetching from "@/Components/Resource/ResourceMasonryWithDataFetching";
import SuggestionInput from "@/Components/Inputs/SuggestionInput";
import {mapGetters} from "vuex";

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
            showFilter: true,
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
        toggleShowFilter() {
            this.showFilter = !this.showFilter
        },
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

    },
    // computed: {
    //     randomQuote() {
    //
    //         let en = [
    //             'An investment in knowledge pays the best interest.',
    //             'Change is the end result of all true learning.',
    //             'Education is the passport to the future, for tomorrow belongs to those who prepare for it today.',
    //             'Education is what remains after one has forgotten what one has learned in school.'
    //         ]
    //
    //         let ru = [
    //             'Причина того, что трудно управлять народом, заключается в том, что народ просвещается и в нем много умных.',
    //             'Кто достиг высот образования, должен заранее предположить, что большинство будет против него.',
    //             'Образованный человек тем и отличается от необразованного, что продолжает считать свое образование незаконченным.',
    //             'Человек образованный – тот, кто знает, где найти то, чего он не знает.'
    //         ]
    //
    //         let tj = [
    //             'Хонед, хонед боз хонед'
    //         ]
    //
    //         switch (this.LANGUAGE) {
    //             case 'tj':
    //                 return tj[Math.floor(Math.random() * tj.length)]
    //             case 'ru':
    //                 return ru[Math.floor(Math.random() * ru.length)]
    //             case 'en':
    //                 return en[Math.floor(Math.random() * en.length)]
    //         }
    //     },
    //     ...mapGetters([
    //         'LANGUAGE',
    //     ])
    // }
}
</script>

<style>

</style>
