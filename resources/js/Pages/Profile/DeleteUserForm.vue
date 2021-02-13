<template>
    <b-card title="Несткунии суроға" sub-title="Тамоман нест кардани суроға">
        <b-card-body>
            <div class="max-w-xl text-sm text-gray-600">
                Несткунии суроға амали бебозгашт аст
            </div>

            <div class="mt-5">
                <b-button variant="danger" @click="confirmUserDeletion">
                    Несткунии суроға
                </b-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <b-modal id="deleteAccountModal" title="Несткунии суроға" cancel-title="Бекор кардан"
                     ok-variant="danger" ok-title="Нест кардан" @ok.prevent="deleteUser">

                <div>
                    Рамзро барои несткунии суроға ворид созед.

                    <div class="mt-4">
                        <b-form-group class="mt-4" :state="!form.error('password')"
                                      :invalid-feedback="form.error('password')">
                            <b-input type="password" placeholder="Рамз"
                                     ref="password"
                                     v-model="form.password"
                                     @keyup.enter.native="deleteUser"/>
                        </b-form-group>
                    </div>
                </div>
            </b-modal>
        </b-card-body>
    </b-card>
</template>

<script>
import JetActionSection from '@/Jetstream/ActionSection'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetDangerButton from '@/Jetstream/DangerButton'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        JetActionSection,
        JetDangerButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    data() {
        return {
            confirmingUserDeletion: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
                password: '',
            }, {
                bag: 'deleteUser'
            })
        }
    },

    methods: {
        confirmUserDeletion() {
            this.form.password = '';

            this.confirmingUserDeletion = true;

            this.$bvModal.show('deleteAccountModal');
        },

        deleteUser() {
            this.form.post(route('current-user.destroy'), {
                preserveScroll: true
            }).then(response => {
                if (!this.form.hasErrors()) {
                    this.$bvModal.hide('deleteAccountModal');
                }
            })
        },
    },
}
</script>
