<template>
    <div class="container background-fondo">
        <div class="row px-md-5 py-md-5">
            <div class="row mx-md-n5">
                <div class="col-md-12 col-xs-12 col-sm-12 px-md-5" v-for="(potion,index) in potions" :key="potion.id">
                    <div class="p-3 border bg-light">
                        <div class="card-header" style="font-weight:bold;">
                            <p class="text-center">{{ potion.name }}</p>

                            <div class="form-group">
                                <label for="fecha" class="control-label">Cantidad a comprar</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                    <input v-model="potion.amount" class="form-control" type="number" min="1" name="cantidad" placeholder="Cantidad Pociones">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fecha" class="control-label">Fecha de compra</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                    <input v-model="potion.sale_date" type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control" name="fecha" required>
                                </div>
                            </div>

                            <button @click="storePotion(potion, index)" class="btn btn-primary">Comprar</button>
                            <button class="btn btn-info" data-toggle="collapse" :data-target="'#'+potion.id" aria-expanded="true" aria-controls="collapseOne">
                                Ingredientes
                            </button>

                        </div>

                        <div class="card-body">
                            <div :id="potion.id" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <ul class="list-group">
                                    <li v-for="ingredient in potion.potion_ingredients" :key="ingredient.id" style="color:black;" class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="">
                                            {{ ingredient.name }}
                                            <span class="badge badge-primary badge-pill">$ {{ formatNumber(ingredient.price) }}</span>
                                        </div>
                                        <div class="">
                                            <span class="badge badge-secondary badge-pill">{{ ingredient.amount }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../event-bus';

    export default {
        data() {
            return {
                authUser: this.$store.getters['auth_user_token/credentials'],
                potions: [],
                headers: undefined
            }
        },
        mounted() {
            this.headers = {
                headers: {
                    Authorization: "Bearer " + this.authUser.accessToken,
                    Accept: 'application/json'
                }
            };
            this.getPotionsIndex();
        },
        methods: {
            formatNumber: function(number) {
                if (number != undefined) {
                    return new Intl.NumberFormat("es-CL", {
                        currency: "CLP"
                    }).format(number);
                }
                return '';
            },
            getPotionsIndex: function() {
                var url = route('potions.index.api');
                axios.get(url, this.headers)
                    .then(response => {
                        this.potions = response.data.result.data;
                    })
                    .catch(error => {
                        this.catchNotification(error);
                    });
            },
            storePotion: function(potion, index) {
                axios.post(route('sales.store.api'), {
                        potion_id: potion.id,
                        amount: potion.amount,
                        sale_date: potion.sale_date
                    }, this.headers).then(response => {
                        toastr.success(response.data.message.success, 200);
                        this.potions[index].amount = '';
                        this.potions[index].sale_date = '';
                    })
                    .catch(error => {
                        this.potions[index].amount = '';
                        this.potions[index].sale_date = '';
                        this.catchNotification(error);
                    });
            },
            catchNotification: function(error) {
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
                    }
                } else {
                    toastr.error(error.message, 500);
                }
            }
        }
    }
</script>

<style media="screen">
    /* Made with love by Mutiullah Samim*/

    @import url('https://fonts.googleapis.com/css?family=Numans');

    .background-fondo {
        background-image: url('https://cdn.create.vista.com/api/media/small/511693350/stock-vector-magical-potions-illustration');
        background-size: cover;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container {
        height: 100%;
        align-content: center;
    }

    .card {
        margin-top: auto;
        margin-bottom: auto;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .social_icon span {
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover {
        color: white;
        cursor: pointer;
    }

    .card-header h3 {
        color: white;
    }

    .social_icon {
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
    }

    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember {
        color: white;
    }

    .remember input {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn {
        color: black;
        background-color: #FFC312;
        width: 100px;
    }

    .login_btn:hover {
        color: black;
        background-color: white;
    }

    .links {
        color: white;
    }

    .links a {
        margin-left: 4px;
    }

    .card {
        margin: 0 auto;
        float: none;
        margin-bottom: 10px;
    }
</style>
