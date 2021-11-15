<template>
    <b-col cols="12 mt-5">
        <b-container fluid class="mb-3">
            <b-row>
                <b-col class="ml-auto mb-2 mb-md-0" cols="md-3">
                    <b-input size="sm" :placeholder="$tc('label.name')" v-model="name"></b-input>
                </b-col>
                <b-col class="mb-2 mb-md-0" cols="md-3">
                    <b-input size="sm" :placeholder="$tc('label.email')" v-model="email"></b-input>
                </b-col>
                <b-button size="sm" class="ml-auto ml-md-0 mr-3 mr-md-0 first-letter-capitalize" variant="info" @click="filter">{{ $t('label.search') }}</b-button>
            </b-row>
        </b-container>
        <b-table primary-key="id" stacked="sm" head-variant="info" responsive
                 bordered striped hover :items="users"
                 :fields="fields">

            <template #head(name)>
                <span class="first-letter-capitalize">{{$tc('label.name')}}</span>
            </template>
            <template #head(email)>
                <span class="first-letter-capitalize">{{$tc('label.email')}}</span>
            </template>
            <template #cell(actions)="row">
                <b-button variant="info" size="sm" @click="row.toggleDetails">
                    <b-icon-people></b-icon-people>
                </b-button>
            </template>

            <template #row-details="row">
                <b-overlay :ref="'ov' +row.item.id" spinner-variant="info">
                    <div>
                        <select :ref="row.item.id" class="form-control" size="7" multiple>
                            <option :selected="userHasRole(role, row.item.roles)"
                                    v-for="role in roles" :key="role.id" :value="role.id">
                                {{ role.local_name }}
                            </option>
                        </select>
                        <div class="d-flex">
                            <b-button size="sm" class="ml-auto mt-3 first-letter-capitalize" variant="info" @click="submit(row.item.id)">
                                {{$t('label.submit')}}
                            </b-button>
                        </div>
                    </div>
                </b-overlay>
            </template>
        </b-table>
        <b-row align-h="center" class="mt-5" v-b-visible.500="fetchUsers">
            <b-spinner v-if="fetching" variant="info"></b-spinner>
        </b-row>
    </b-col>
</template>

<script>
export default {
    name: "Index",
    props: {
        pagination: Object,
        roles: Array
    },
    data() {
        return {
            fetching: false,
            page: 1,
            name: '',
            email: '',
            users: this.pagination.data,
            states: {"92a6f39f-4582-4dd1-8578-dbbfeb57010f": true},
            fields: [
                {
                    key: 'name',
                    label: this.$t('label.name')
                },
                {
                    key: 'email',
                    label: this.$t('label.email')
                },
                {
                    key: 'actions',
                    label: ''
                }
            ],
            fetchUrl: this.route('users.index') + '?page='
        }
    },
    methods: {
        fetchUsers() {
            if (this.fetching || this.stopFetching)
                return;

            this.page++;
            this.fetching = true;

            axios.get(this.fetchUrl + this.page )
                .then(response => {
                    if (response.data.data.length > 0)
                        this.users.push(...response.data.data);
                    else this.stopFetching = true;
                }).finally(() => this.fetching = false)
        },
        submit(userId) {
            let overlay = this.$refs['ov' + userId];
            overlay.show = true;

            let roles = [...this.$refs[userId].options]
                .filter(option => option.selected)
                .map(option => option.value)

            axios.post(this.route('user-roles.update', userId), {
                'roles': roles
            })
                .then(response => this.updateRolesLocally(userId, response.data))
                .finally(() => overlay.show = false);

        },
        filter(){
            this.users = [];
            this.page = 0;
            this.stopFetching = false;
            this.fetchUrl = this.route('users.index') + '?name=' + this.name + '&email=' + this.email + '&page='
            this.fetchUsers();
        },
        updateRolesLocally(userId, roles) {
            let user = this.users.find(u => u.id === userId);
            user.roles = roles;
        },
        userHasRole(role, roles) {
            return roles.find(r => r.id === role.id)
        }
    }
}
</script>
