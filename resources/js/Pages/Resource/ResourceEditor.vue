<template>
    <b-row align-h="center">
        <b-col md="8">
            <b-card header="Добавить ресурс">
                <b-overlay :show="submitting" rounded="lg">
                    <template #overlay class="w-100">
                        <b-progress variant="info"  style="width: 250px" :value="uploadProgress" :max="resource.file.size" animated></b-progress>
                    </template>
                    <b-card-body>
                        <b-form>
                            <b-form-group label="Название" required>
                                <b-form-input v-model="resource.title"></b-form-input>
                            </b-form-group>
                            <b-form-group label="Описание">
                                <b-form-textarea v-model="resource.description">

                                </b-form-textarea>
                            </b-form-group>
                            <file-picker v-model="resource.file">

                            </file-picker>

                            <b-form-checkbox class="my-3" v-model="resource.is_public" name="check-button" switch>
                                Доступно всем
                            </b-form-checkbox>

                            <b-button @click="submit" variant="info">Сохранить</b-button>
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
            resource: {
                title: null,
                description: null,
                file: null,
                is_public: true
            },
            submitting:false,
            uploadProgress:0
        }
    },
    methods: {
        submit: function () {
            this.submitting = true;
            let data = new FormData();

            data.append('title', this.resource.title);
            data.append('description', this.resource.description);
            data.append('file', this.resource.file);
            axios.post(route('resources.store').url(), data, {
                onUploadProgress: progressEvent => {console.log(progressEvent.loaded);
                this.uploadProgress = progressEvent.loaded}
            }).finally(() => this.submitting = false)
        }
    }
}
</script>

<style scoped>

</style>
