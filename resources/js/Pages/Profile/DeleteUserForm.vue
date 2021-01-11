<template>
    <b-card title="Удаление аккаунта" sub-title="Удалить аккаунт навсегда">
        <b-card-body>
            <div class="max-w-xl text-sm text-gray-600">
                Удаление аккаунта необратимая функция
            </div>

            <div class="mt-5">
                <b-button variant="danger" @click="confirmUserDeletion">
                    Удалить аккаунт
                </b-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <b-modal id="deleteAccountModal" title="Удаление аккаунта" cancel-title="Отмена"
                     ok-variant="danger" ok-title="Удалить" @ok.prevent="deleteUser">

                <div>
                    Введите пароль для подтверждения удаления аккаунта.

                    <div class="mt-4">
                        <b-form-group class="mt-4" :state="!form.error('password')"
                                      :invalid-feedback="form.error('password')">
                            <b-input type="password" placeholder="Пароль"
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
