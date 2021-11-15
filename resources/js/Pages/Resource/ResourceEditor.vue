<template>
    <b-col md="8" class="mx-auto mt-5">
        <b-card>
            <template #header>
                <h6 class="first-letter-capitalize">{{$t('label.add_resource')}}</h6>
            </template>
            <b-overlay :show="form.processing" rounded="lg">
                <template #overlay class="w-100">
                    <b-progress variant="info" style="width: 250px" :value="form.progress"
                                max="100" animated></b-progress>
                </template>
                <b-card-body>
                    <b-form id="form" href="form" @submit.prevent="submit">
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $t('label.name')"
                                      :state="!form.error('title')"
                                      :invalid-feedback="form.error('title')">
                            <b-form-input v-model="form.title" autofocus></b-form-input>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.resource')"
                                      :state="!form.error('file') && validation.file">
                            <file-picker v-model="form.file"></file-picker>
                            <b-form-invalid-feedback :state="!form.error('file') && validation.file">
                                <span v-if="!validation.file">{{ $t('message.max_resource_size_error') }} </span>
                                {{ form.error('file') }}
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.cover')" :state="!form.error('cover') && validation.cover">
                            <b-form-file :browse-text="$t('label.browse')" :placeholder="$t('message.no_file_chosen')" accept="image/jpeg, image/png" v-model="form.cover">
                            </b-form-file>
                            <b-form-invalid-feedback :state="!form.error('cover') && validation.cover">
                                <span v-if="!validation.cover">{{ $t('message.max_cover_size_error') }}</span>
                                {{ form.error('cover') }}
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.author')" required :state="!form.error('author')"
                                      :invalid-feedback="form.error('author')">
                            <b-form-input v-model="form.author"></b-form-input>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="$tc('label.year')" required :state="!form.error('year')"
                                      :invalid-feedback="form.error('year')">
                            <b-form-input v-model="form.year"></b-form-input>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.subject')" :state="!form.error('category_id')"
                                      :invalid-feedback="form.error('category_id')">
                            <b-form-select v-model="form.category_id" required>
                                <b-form-select-option :value="null">-- {{ $tc('label.subject',2) }} --</b-form-select-option>
                                <b-form-select-option v-for="category in categories" :value="category.id"
                                                      :key="category.id">
                                    {{ $t('label.' + category.name.replaceAll(' ', '_')) }}
                                </b-form-select-option>
                            </b-form-select>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.theme')" :state="!form.error('theme_id')"
                                      :invalid-feedback="form.error('theme_id')">
                            <b-form-select v-model="form.theme_id" required>
                                <b-form-select-option :value="null" disabled>-- {{ $tc('label.theme',2) }} --</b-form-select-option>
                                <b-form-select-option v-for="theme in themes" :value="theme.id"
                                                      :key="theme.id">
                                    {{ theme.name }}
                                </b-form-select-option>
                            </b-form-select>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.type')"  :state="!form.error('type')"
                                      :invalid-feedback="form.error('type')">
                            <b-form-select v-model="form.type" required>
                                <b-form-select-option :value="null" disabled>-- {{ $tc('label.type',2) }} --</b-form-select-option>
                                <b-form-select-option value="Китобҳои бадеӣ">Китобҳои бадеӣ</b-form-select-option>
                                <b-form-select-option value="Китобҳои дарсӣ">Китобҳои дарсӣ</b-form-select-option>
                                <b-form-select-option value="Дарсҳои видеоӣ">Дарсҳои видеоӣ</b-form-select-option>
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
                        <b-form-group label-class="first-letter-capitalize" :label="'*' + $tc('label.language')"  :state="!form.error('language')"
                                      :invalid-feedback="form.error('language')">
                            <b-form-select v-model="form.language" required>
                                <b-form-select-option value="ru">{{ $t('label.russian_language') }}</b-form-select-option>
                                <b-form-select-option value="tj">{{ $t('label.tajik_language') }}</b-form-select-option>
                                <b-form-select-option value="en">{{ $t('label.english_language') }}</b-form-select-option>
                            </b-form-select>
                        </b-form-group>
                        <b-form-group label-class="first-letter-capitalize" :label="$tc('label.description')"  :state="!form.error('description')"
                                      :invalid-feedback="form.error('description')">
                            <b-form-textarea v-model="form.description"></b-form-textarea>
                        </b-form-group>
                        <b-form-group :state="!form.error('is_public')" :invalid-feedback="form.error('is_public')">
                            <b-form-checkbox class="my-3" v-model="form.is_public" name="check-button" switch>
                                {{$t('label.public_access')}}
                            </b-form-checkbox>
                        </b-form-group>

                        <b-form-group label-class="first-letter-capitalize" :label="$tc('label.role',2)" :state="!form.error('roles')"
                                      :invalid-feedback="form.error('roles')">
                            <b-form-select multiple v-model="form.roles" :select-size="4" required>
                                <b-form-select-option v-for="role in roles" :value="role.id"
                                                      :key="role.id">
                                    {{ $t('label.' + role.name + '_role') }}
                                </b-form-select-option>
                            </b-form-select>
                        </b-form-group>

                        <b-form-group label-class="first-letter-capitalize" :label="$tc('label.grade',2)" :state="!form.error('grades')"
                                      :invalid-feedback="form.error('grades')">
                            <b-form-select multiple v-model="form.grades" :select-size="13" required>
                                <b-form-select-option v-for="grade in grades" :value="grade.id"
                                                      :key="grade.id">
                                    {{ $t('label.' + grade.name.replaceAll(' ', '_')) }}
                                </b-form-select-option>
                            </b-form-select>
                        </b-form-group>

                        <b-form-group label-class="first-letter-capitalize" :label="$tc('label.tag',2)">
                            <suggestion-input displayPropertyName="name"
                                              query-is-first-option
                                              ref="tagInput"
                                              @selected="onTagSelected"
                                              @notfound="addNewTag"
                                              action-url="/tags/filtered/"
                                              show
                            >
                            </suggestion-input>
                            <ul
                                class="list-unstyled d-inline-flex flex-wrap mb-0">
                                <b-card
                                    v-for="tag in tags"
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

                        <b-button type="submit" :disabled="form.processing" variant="info" class="first-letter-capitalize">{{$t('label.submit')}}</b-button>
                    </b-form>
                </b-card-body>
            </b-overlay>
        </b-card>
    </b-col>
</template>

<script>
import FilePicker from "@/Components/Inputs/FilePicker";
import SuggestionInput from "@/Components/Inputs/SuggestionInput";

export default {
    name: "ResourceEditor",
    components: {FilePicker, SuggestionInput},
    props: {
        categories: Array,
        themes: Array,
        resource: Object,
        roles: Array,
        grades: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                id: this.resource?.id,
                title: this.resource?.title,
                author: this.resource?.author ?? null,
                year: this.resource?.year ?? null,
                description: this.resource?.description ?? null,
                category_id: this.resource?.category_id ?? null,
                theme_id: this.resource?.theme_id ?? null,
                type: this.resource?.type ?? null,
                language: this.resource?.language ?? 'ru',
                file: null,
                cover: null,
                is_public: this.resource?.is_public ?? false,
                progress: 0,
                tags: [],
                roles: this.resource?.roles.map(r => r.id) ?? [],
                grades: this.resource?.grades.map(g => g.id) ?? [],
                _method: this.resource?.id ? 'put' : 'post'
            }, {
                resetOnSuccess: true
            }),
            tags: this.resource?.tags ?? [],
            validation: {
                cover: true,
                file: true
            }
        }
    },
    methods: {
        submit: function () {
            if (!this.validation.cover || !this.validation.file)
                return;
            this.$inertia.on('progress', (event) => {
                this.form.progress = event.detail.progress.percentage
            });

            this.form.tags = this.tags.map(t => t.name);

            if (this.form.id)
                this.update();
            else this.store();
        },
        store() {
            this.form
                .post(route('resources.store').url())
                .finally(this.form.progress = 0)
        },
        update() {
            this.form
                .post(route('resources.update', this.form.id).url())
                .finally(this.form.progress = 0)
        },
        addNewTag(name) {
            if (!this.tags.find(t => t.name === name))
                this.tags.push({name: name})
            this.clearTagInput();
        },
        onTagSelected(tag) {
            if (!this.tags.find(t => t.name === tag.name))
                this.tags.push(tag)
            this.clearTagInput();
        },
        clearTagInput() {
            this.$refs['tagInput'].query = '';
            this.$refs['tagInput'].options = [];
        },
        removeTag(name) {
            this.tags = this.tags.filter(t => t.name !== name);
        },
    },
    watch: {
        'form.description'() {
            if (this.form.language === "tj") {
                this.form.description = this.form.description
                    .replaceAll('њ', 'ҳ')
                    .replaceAll('ї', 'ӣ')
                    .replaceAll('ѓ', 'ғ')
                    .replaceAll('љ', 'ҷ')
                    .replaceAll('ќ', 'қ')
                    .replaceAll('Њ', 'Ҳ')
                    .replaceAll('Ї', 'Ӣ')
                    .replaceAll('Ѓ', 'Ғ')
                    .replaceAll('Љ', 'Ҷ')
                    .replaceAll('Ќ', 'Қ')

            }
        },
        'form.cover'() {
            this.validation.cover = this.form.cover.size / 1024 / 1024 <= 1;
        },
        'form.file'() {
            // let extension = getFileExtension(this.form.file.name);
            let size = this.form.file.size / 1024 / 1024;
            console.log(size);
            this.validation.file = size <= 300;
        }
    }
}
</script>
