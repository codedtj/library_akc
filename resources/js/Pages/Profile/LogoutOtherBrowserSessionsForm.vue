<template>
    <b-card title="Активные сессии" sub-title="Выйти из системы на других устройствах">

        <b-card-body>
            <b-card-text>
                Вы можете выйти из системы на всех других устройствах. Если вы считаете, что ваш аккаунт был взломан,
                измените пароль.
            </b-card-text>

            <!-- Other Browser Sessions -->
            <div class="my-5" v-if="sessions.length > 0">
                <b-row align-v="baseline" v-for="(session, i) in sessions" :key="i">
                    <b-icon-display scale="1.2"></b-icon-display>

                    <div class="ml-3">
                        <div>
                            {{ session.agent.platform }} - {{ session.agent.browser }}
                        </div>

                        <div>
                            <div>
                                {{ session.ip_address }},

                                <span class="" v-if="session.is_current_device">Текущее устройство</span>
                                <span v-else>Last active {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </b-row>
            </div>

            <div>
                <b-button @click="confirmLogout">
                    Выйти из системы в других браузерах
                </b-button>

                <b-alert :on="form.recentlySuccessful" class="ml-3">
                    Готово.
                </b-alert>
            </div>

            <!-- Logout Other Devices Confirmation Modal -->
            <b-modal title="Выйти на других устройствах" id="logoutConfirmationModal" cancel-title="Отмены"
                     ok-variant="info" ok-title="Выйти" @ok.prevent="logoutOtherBrowserSessions">

                <div>
                    Введите пароль для подтверждения выхода из системы на всех остальных устройствах

                    <b-form-group class="mt-4" :state="!form.error('password')"
                                  :invalid-feedback="form.error('password')">
                        <b-input type="password" placeholder="Пароль"
                                 ref="password"
                                 v-model="form.password"
                                 @keyup.enter.native="logoutOtherBrowserSessions"/>
                    </b-form-group>
                </div>
            </b-modal>
        </b-card-body>
    </b-card>
</template>

<script>

export default {
    props: ['sessions'],
    data() {
        return {
            confirmingLogout: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
                password: '',
            }, {
                bag: 'logoutOtherBrowserSessions'
            })
        }
    },

    methods: {
        confirmLogout() {
            this.form.password = ''

            this.confirmingLogout = true

            this.$bvModal.show('logoutConfirmationModal');

            // setTimeout(() => {
            // this.$refs.password.focus()
            // }, 250)
        },

        logoutOtherBrowserSessions() {
            this.form.post(route('other-browser-sessions.destroy'), {
                preserveScroll: true
            }).then(_ => {
                if (!this.form.hasErrors()) {
                    this.$bvModal.hide('logoutConfirmationModal');
                }
            })
        },
    },
}
</script>
