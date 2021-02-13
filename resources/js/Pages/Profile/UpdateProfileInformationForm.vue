<template>
    <form @submit.prevent="updateProfileInformation">
        <b-card title="Маълумоти шахсӣ" sub-title="Ном ва суроғаи электрониатонро аз нав намоед.">
            <b-card-body>
                <!-- Profile Photo -->
<!--                <div v-if="$page.jetstream.managesProfilePhotos">-->
<!--                    &lt;!&ndash; Profile Photo File Input &ndash;&gt;-->
<!--                    <input type="file" class="hidden"-->
<!--                           ref="photo"-->
<!--                           @change="updatePhotoPreview">-->

<!--                    <jet-label for="photo" value="Photo"/>-->

<!--                    &lt;!&ndash; Current Profile Photo &ndash;&gt;-->
<!--                    <div class="mt-2" v-show="! photoPreview">-->
<!--                        <img :src="user.profile_photo_url" alt="Current Profile Photo"-->
<!--                             class="rounded-full h-20 w-20 object-cover">-->
<!--                    </div>-->

<!--                    &lt;!&ndash; New Profile Photo Preview &ndash;&gt;-->
<!--                    <div class="mt-2" v-show="photoPreview">-->
<!--                    <span class="block rounded-full w-20 h-20"-->
<!--                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">-->
<!--                    </span>-->
<!--                    </div>-->

<!--                    <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">-->
<!--                        Select A New Photo-->
<!--                    </jet-secondary-button>-->

<!--                    <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto"-->
<!--                                          v-if="user.profile_photo_path">-->
<!--                        Remove Photo-->
<!--                    </jet-secondary-button>-->

<!--                    <jet-input-error :message="form.error('photo')" class="mt-2"/>-->
<!--                </div>-->

                <b-col md="6">
                    <!-- Name -->
                    <b-form-group label="Ном" :state="!form.error('name')" :invalid-feedback="form.error('name')">
                        <b-form-input v-model="form.name"></b-form-input>
                    </b-form-group>

                    <!-- Email -->
                    <b-form-group label="Суроғаи электронӣ" :state="!form.error('email')" :invalid-feedback="form.error('email')">
                        <b-form-input v-model="form.email"></b-form-input>
                    </b-form-group>
                </b-col>
            </b-card-body>

            <template #footer>
                <b-row align-v="baseline">
                    <b-card-text class="ml-4" v-if="form.recentlySuccessful">Тағйиротҳо маҳфуз шуданд.</b-card-text>
                    <b-button type="submit" class="ml-auto mr-4" variant="info" :disabled="form.processing">
                        Маҳфуз
                    </b-button>
                </b-row>
            </template>
        </b-card>
    </form>
</template>

<script>
export default {

    props: ['user'],

    data() {
        return {
            form: this.$inertia.form({
                '_method': 'PUT',
                name: this.user.name,
                email: this.user.email,
                photo: null,
            }, {
                bag: 'updateProfileInformation',
                resetOnSuccess: false,
            }),

            photoPreview: null,
        }
    },

    methods: {
        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0]
            }

            this.form.post(route('user-profile-information.update'), {
                preserveScroll: true
            });
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);
        },

        deletePhoto() {
            this.$inertia.delete(route('current-user-photo.destroy'), {
                preserveScroll: true,
            }).then(() => {
                this.photoPreview = null
            });
        },
    },
}
</script>
