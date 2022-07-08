<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="font-weight:bold;">Market Pociones</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li v-if="checkUserAuth == false" class="ml-4" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link style="text-decoration:none;color:black;" :to="{ name : route.path }" :key="key">
                        <button class="btn" style="margin-top:14px;">{{route.name}}</button>
                    </router-link>
                </li>
                <li v-if="checkUserAuth == true" class="ml-4" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link style="text-decoration:none;color:black;" :to="{ name : route.path }" :key="key">
                        <button class="btn" style="margin-top:14px;">{{route.name}}</button>
                    </router-link>
                </li>
                <li v-if="checkUserAuth == true" class="ml-4">
                    <button class="btn btn-danger" @click="logoutApp()" style="margin-top:14px;">Salir</button>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                authUser: this.$store.getters['auth_user_token/credentials'],
                routes: {
                    // UNLOGGED
                    unlogged: [{
                            name: 'Registrarse',
                            path: 'register',
                            class: 'glyphicon glyphicon-user'
                        },
                        {
                            name: 'Iniciar Sesión',
                            path: 'login',
                            class: 'glyphicon glyphicon-log-in'
                        }
                    ],
                    // LOGGED USER
                    user: [{
                            name: 'Dashboard',
                            path: 'dashboard',
                            class: 'glyphicon glyphicon-home'
                        },
                        {
                            name: 'Reporte Ventas',
                            path: 'report',
                            class: 'glyphicon glyphicon-shopping-cart'
                        },
                        {
                            name: 'Ventas',
                            path: 'sales',
                            class: 'glyphicon glyphicon-shopping-cart'
                        }
                    ],
                    // LOGGED ADMIN
                }
            }
        },
        computed: {
            checkUserAuth() {
                return this.authUser.auth;
            }
        },
        watch: {
            checkUserAuth(newAuth, oldAuth) {
                console.log(newAuth);
                console.log(oldAuth);
            }
        },
        mounted() {
            var resultado_one = undefined;
            var resultado_two = undefined;
            if (this.checkUserAuth == true) {
                resultado_one = this.routes.unlogged.find(route => route.path === this.$route.name);
                if (resultado_one != undefined) {
                    console.log(1);
                    this.$router.push({
                        name: 'dashboard',
                    });
                    return;
                }
                return;
            } else {
                resultado_two = this.routes.user.find(route => route.path === this.$route.name);
                if (resultado_two != undefined) {
                    this.$router.push({
                        name: 'login',
                    });
                    return;
                }
                return;
            }
            if (resultado_one == undefined && resultado_two == undefined)
                if (this.checkUserAuth == true) {
                    console.log(2);
                    this.$router.push({
                        name: 'dashboard',
                    });
                    return;
                }
            else {
                this.$router.push({
                    name: 'login',
                });
                return;
            }
        },
        methods: {
            logoutApp: function() {
                axios.defaults.headers.common["Authorization"] = 'Bearer ' + this.authUser.accessToken;
                axios.post(route('logout.api'))
                    .then(response => {
                        toastr.success(response.data.message.success, 200);
                        this.$store.commit('auth_user_token/addAccessToken', {
                            accessToken: '',
                            timeExpirationToken: '',
                            auth: false,
                            user_id: '',
                            full_name: '',
                        });
                        let urlChange = this.$router.resolve({
                            name: 'login',
                        });
                        window.location.href = urlChange.href;
                    })
                    .catch(error => {
                        if (error.response) {
                            if (error.response.status == 400) {
                                for (var field in error.response.data.message) {
                                    toastr.warning(error.response.data.message[field], 400);
                                }
                            } else if (error.response.status == 500) {
                                if (error.response.data.message.danger != null) {
                                    toastr.error(error.response.data.message.danger, 500);
                                } else {
                                    toastr.error(error.response.data.message, 500);
                                }
                            } else {
                                toastr.error(error.response.data.message, 500);
                            }
                        } else {
                            toastr.error(error.message, 500);
                        }
                        this.$store.commit('auth_user_token/addAccessToken', {
                            accessToken: '',
                            timeExpirationToken: '',
                            auth: false,
                            user_id: '',
                            full_name: '',
                        });
                        let urlChange = this.$router.resolve({
                            name: 'login',
                        });
                        window.location.href = urlChange.href;
                    });
            }
        }
    }
</script>
