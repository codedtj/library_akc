<template>
        <b-col md="8" class="mx-auto">
            <b-card header="Добавить ресурс">
                <b-overlay :show="form.processing" rounded="lg">
                    <template #overlay class="w-100">
                        <b-progress variant="info" style="width: 250px" :value="form.progress"
                                    max="100" animated></b-progress>
                    </template>
                    <b-card-body>
                        <b-form id="form" href="form" @submit.prevent="submit">
                            <b-form-group label="*Название" :state="!form.error('title')"
                                          :invalid-feedback="form.error('title')">
                                <b-form-input v-model="form.title" autofocus></b-form-input>
                            </b-form-group>
                            <b-form-group label="*Прикрепить ресурс" :state="!form.error('file')"
                                          :invalid-feedback="form.error('file')">
                                <file-picker v-model="form.file"></file-picker>
                            </b-form-group>
                            <b-form-group label="*Прикрепить обложку" :state="!form.error('cover')"
                                          :invalid-feedback="form.error('cover')">
                                <file-picker v-model="form.cover"></file-picker>
                            </b-form-group>
                            <b-form-group label="Автор" required :state="!form.error('author')"
                                          :invalid-feedback="form.error('author')">
                                <b-form-input v-model="form.author"></b-form-input>
                            </b-form-group>
                            <b-form-group label="Год" required :state="!form.error('year')"
                                          :invalid-feedback="form.error('year')">
                                <b-form-input v-model="form.year"></b-form-input>
                            </b-form-group>
                            <b-form-group label="Категория" :state="!form.error('category_id')"
                                          :invalid-feedback="form.error('category_id')">
                                <b-form-select v-model="form.category_id" required>
                                    <b-form-select-option :value="null">-- Выберите категорию --</b-form-select-option>
                                    <b-form-select-option v-for="category in categories" :value="category.id"
                                                          :key="category.id">
                                        {{ category.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group label="Описание" :state="!form.error('description')"
                                          :invalid-feedback="form.error('description')">
                                <b-form-textarea v-model="form.description"></b-form-textarea>
                            </b-form-group>
                            <b-form-group :state="!form.error('is_public')" :invalid-feedback="form.error('is_public')">
                                <b-form-checkbox class="my-3" v-model="form.is_public" name="check-button" switch>
                                    Доступно всем
                                </b-form-checkbox>
                            </b-form-group>


                            <b-form-group label="Теги">
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

                            <b-button type="submit" :disabled="form.processing" variant="info">Сохранить</b-button>
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
        resource: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                id: this.resource?.id,
                title: this.resource?.title,
                author: this.resource?.author ?? null,
                year: this.resource?.year ?? null,
                description: this.resource?.description ?? null,
                category_id: this.resource?.category_id,
                file: null,
                cover: null,
                is_public: this.resource?.is_public ?? false,
                progress: 0,
                tags: [],
                _method: this.resource?.id ? 'put' : 'post'
            }, {
                resetOnSuccess: true
            }),
            tags: this.resource?.tags ?? []
        }
    },
    methods: {
        submit: function () {
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
        }
    }
}
</script>
