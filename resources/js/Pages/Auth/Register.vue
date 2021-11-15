<template>
    <div class="container mt-5">
        <div class="row">
            <!--            <div class="container-fluid">-->
            <!--                <div class="row">-->
            <!--                    <a class="mx-auto mb-5 text-info" :href="route('home')"><h4>Вернуться на главную</h4></a>-->
            <!--                </div>-->
            <!--            </div>-->
            <form method="POST" class="col-md-8 mx-auto" @submit.prevent="submit">
                <div class="card">
                    <div class="card-header first-letter-capitalize">
                        {{ $t('label.sign_up') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="first-letter-capitalize">{{ $tc('label.name') }}</label>
                            <input class="form-control"
                                   :class="{'is-invalid': form.error('name')}" id="name" name="name"
                                   v-model="form.name" required autofocus
                                   autocomplete="name">
                            <div class="invalid-feedback"> {{ form.error('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="first-letter-capitalize">{{ $t('label.email') }}</label>
                            <input class="form-control" id="email" name="email"
                                   :class="{'is-invalid': form.error('email')}"
                                   v-model="form.email" required
                                   autocomplete="email">
                            <div class="invalid-feedback"> {{ form.error('email') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="first-letter-capitalize">{{ $tc('label.password') }}</label>
                            <input class="form-control" id="password"
                                   :class="{'is-invalid': form.error('password')}"
                                   name="password" type="password"
                                   v-model="form.password" required
                                   autocomplete="new-password">
                            <div class="invalid-feedback"> {{ form.error('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation"
                                   class="first-letter-capitalize">{{ $t('label.confirm_password') }}</label>
                            <input class="form-control"
                                   :class="{'is-invalid': form.error('password_confirmation')}"
                                   id="password_confirmation" name="password_confirmation"
                                   type="password"
                                   v-model="form.password_confirmation" required autocomplete="new-password">
                            <div class="invalid-feedback"> {{ form.error('password_confirmation') }}</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <button class="btn btn-info mx-auto first-letter-capitalize" type="submit">
                                {{ $t('label.submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('register'))
        }
    }
}
</script>

<style scoped>

</style>
