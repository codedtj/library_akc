<template>
    <b-row align-h="center">
        <b-col md="8">
            <b-card header="Добавить ресурс">
                <b-overlay :show="form.processing" rounded="lg">
                    <template #overlay class="w-100">
                        <b-progress variant="info" style="width: 250px" :value="form.progress"
                                    max="100" animated></b-progress>
                    </template>
                    <b-card-body>
                        <b-form href="form" @submit.prevent="submit">
                            <b-form-group label="*Название" :state="!form.error('title')"
                                          :invalid-feedback="form.error('title')">
                                <b-form-input v-model="form.title"></b-form-input>
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
                            <b-form-group label="Описание" :state="!form.error('description')"
                                          :invalid-feedback="form.error('description')">
                                <b-form-textarea v-model="form.description"></b-form-textarea>
                            </b-form-group>
                            <b-form-checkbox class="my-3" v-model="form.is_public" name="check-button" switch
                                             :state="!form.error('is_public')"
                                             :invalid-feedback="form.error('is_public')">
                                Доступно всем
                            </b-form-checkbox>

                            <b-button type="submit" :disabled="form.processing" variant="info">Сохранить</b-button>
                        </b-form>
                    </b-card-body>
                </b-overlay>
            </b-card>
        </b-col>
    </b-row>
</template>

<script>
import FilePicker from "@/Components/FilePicker";

export default {
    name: "ResourceEditor",
    components: {FilePicker},
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                author: null,
                year: null,
                description: null,
                file: null,
                cover: null,
                is_public: true,
                progress: 0
            }, {
                resetOnSuccess: true
            }),
        }
    },
    methods: {
        submit: function () {
            this.$inertia.on('progress', (event) => {
                this.form.progress = event.detail.progress.percentage
            });

            this.form.post(route('resources.store').url()).finally(this.form.progress = 0)
        }
    }
}
</script>

<style scoped>

</style>
