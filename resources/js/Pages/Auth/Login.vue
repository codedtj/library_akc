<template>
    <div class="container">
        <div class="row mt-5">
            <div class="container-fluid">
                <div class="row">
                    <a class="mx-auto mb-5 text-info" :href="route('home')"><h4>Баргашт ба саҳифаи асосӣ</h4></a>
                </div>

            </div>

            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Воридшавӣ
                    </div>
                    <div class="card-body">
                        <span class="text-danger">
                            {{form.error('email')}}
                        </span>
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="email">Суроғаи электронӣ</label>
                                <input class="form-control" v-model="form.email" name="email" type="email" required
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Рамз</label>
                                <input class="form-control" type="password" v-model="form.password" name="password"
                                       required
                                       autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="remember_me"></label>
                                <input id="remember_me" type="checkbox" v-model="form.remember" class="form-checkbox"
                                       name="remember">
                                <span class="ml-2">Дар хотира маро нигаҳ дор</span>
                            </div>

                            <div>
                                <a :href="route('register')">Суроға надоред? Худро ба қайд гиред.</a>
                            </div>

                            <div class="flex items-center justify-end mt-4">
<!--                                {{ &#45;&#45;@if (Route::has('password.request'))&#45;&#45; }}-->
<!--                                {{-->
<!--                                    &#45;&#45; <a href="{{ route('password.request') }}">&#45;&#45;}}-->
<!--                                {{ &#45;&#45;Рамзро фаромӯш кардед ? &#45;&#45; }}-->
<!--                                {{ &#45;&#45;                                    </a>&#45;&#45;}}-->
<!--                                {{ &#45;&#45;@endif&#45;&#45; }}-->

                                <button class="ml-4 btn btn-info">
                                    Ворид
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            form: this.$inertia.form({
                email: null,
                password: null,
                remember: false
            })
        }
    },
    methods:{
        submit(){
            this.form.post(this.route('login'))
        }
    }
}
</script>
