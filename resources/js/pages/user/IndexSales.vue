<template>
    <div class="container" style="margin-top:50px;">
        <EditReportModal />

        <div class="row">
            <div class="col-md-8">
                <div class="card" style="margin-top:24px;">

                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Poción</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Venta Votal</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(sale,index) in sales">
                                <th class="table-light">{{ sale.potion.name }}</th>
                                <th class="table-light">{{ sale.client.name + ' '+ sale.client.last_name }}</th>
                                <th class="table-light">{{ sale.amount }}</th>
                                <th class="table-light">{{ sale.sale }}</th>
                                <th class="table-light">{{ frontEndDateFormat(sale.sale_date) }}</th>

                                <th class="table-light">
                                    <div class="text-center">
                                        <button @click="deleteSale(sale)" type="button" class="my-1 btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        <button @click="editSale(sale)" type="button" class="my-1 btn btn-success" data-toggle="collapse" :data-target="'#'+sale.id" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-edit"></i></button>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EditReportModal from './EditReportModal';
    import EventBus from '../event-bus';

    export default {
        data() {
            return {
                authUser: this.$store.getters['auth_user_token/credentials'],
                sales: [],
                headers: undefined,
                saleSelected: [],
                modelSearch: {
                    client_id: '',
                    sale_date_start: '',
                    sale_date_end: ''
                }
            }
        },
        components: {
            EditReportModal: EditReportModal
        },
        mounted() {
            this.headers = {
                headers: {
                    Authorization: "Bearer " + this.authUser.accessToken,
                    Accept: 'application/json'
                }
            };
            this.getIndexSales();
            EventBus.$on('sale-modal-update-success', dataArray => {
                this.getIndexSales();
            })
        },
        methods: {
            editSale: function(sale) {
                this.$modal.show('sale-modal-edit', {
                    modelSale: sale
                })
            },
            deleteSale: function(sale) {
                axios.delete(route('sales.delete.api', {
                            sale_id: sale.id
                        }),
                        this.headers,
                    ).then(response => {
                        toastr.success(response.data.message.success, 200);
                        this.getIndexSales();
                    })
                    .catch(error => {
                        this.catchNotification(error);
                    });
            },
            getIndexSales: function() {
                var url = route('sales.details.index.api');
                axios.get(url, this.headers)
                    .then(response => {
                        this.sales = response.data.result.data;
                    })
                    .catch(error => {
                        this.sales = [];
                        this.catchNotification(error);
                    });
            },
            frontEndDateFormat: function(date) {
                return moment(date, 'YYYY-MM-DD').format('DD/MM/YYYY');
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
