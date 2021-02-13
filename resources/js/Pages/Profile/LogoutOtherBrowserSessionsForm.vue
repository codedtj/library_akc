<template>
    <b-card title="Машғулиятҳои фаъол" sub-title="Дар дастгоҳҳои дигар аз система бароед">

        <b-card-body>
            <b-card-text>
                Шумо метавонед дар ҳамаи дастгоҳҳои дигар аз система бароед, агар  фикр намоед , ки саҳифаи Шумо  аз тарафи ягон кас ҳак шудааст ва метавонед рамзи худро иваз намоед
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

                                <span class="" v-if="session.is_current_device">Дастгоҳи ҷорӣ</span>
                                <span v-else>Амали охирон {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </b-row>
            </div>

            <div>
                <b-button @click="confirmLogout">
                    Дар дигар  браузерҳо аз система бароед
                </b-button>

                <b-alert :on="form.recentlySuccessful" class="ml-3">
                    Тайер
                </b-alert>
            </div>

            <!-- Logout Other Devices Confirmation Modal -->
            <b-modal title="Дар дастгоҳҳои дигар аз система бароед" id="logoutConfirmationModal" cancel-title="Бекор кардан"
                     ok-variant="info" ok-title="Баромадан" @ok.prevent="logoutOtherBrowserSessions">

                <div>
                    Рамзро барои тасдиқи баромадан аз система дар ҳамаи дастгоҳҳо ворид намоед.

                    <b-form-group class="mt-4" :state="!form.error('password')"
                                  :invalid-feedback="form.error('password')">
                        <b-input type="password" placeholder="Рамз"
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
