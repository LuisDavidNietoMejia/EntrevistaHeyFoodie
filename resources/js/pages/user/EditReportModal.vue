<template>
    <modal name="sale-modal-edit" @before-open="beforeOpen" :adaptive="true" width="80%" height="80%">

        <!-- <pre>
        {{ $data }}
        </pre> -->

        <div class="panel-body col-md-12 col-sm-12 col-xs-12 p-4">

            <h5 class="card-title">Editar Venta</h5>

            <div class="form-group">
                <label for="nombre" class="control-label">Venta</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-usd"></i>
                    </span>
                    <input v-model="modelSale.sale" type="number" readonly class="form-control" name="saldo" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nombre" class="control-label">Cantidad</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-usd"></i>
                    </span>
                    <input v-model="modelSale.amount" type="number" step="0.01" class="form-control" name="saldo" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nombre" class="control-label">Pociones</label>
                <div class="input-group">
                    <select class="form-control" v-model="modelSale.potion_id">
                        <option>Seleccionar Poción</option>
                        <option v-for="(potion, index) in potions" v-bind:value="potion.id">{{ potion.name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nombre" class="control-label">Cliente</label>
                <div class="input-group">
                    <select class="form-control" v-model="modelSale.client_id">
                        <option>Seleccionar Cliente</option>
                        <option v-for="(client, index) in clients" v-bind:value="client.id">{{ client.name +' '+ client.last_name }}</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="panel-footer">
            <div class="text-center">
                <input class="btn btn-primary" type="button" v-on:click="saleUpdate(modelSale)" value="Actualizar Venta" />
                <input type="button" class="btn btn-danger" @click="$modal.hide('sale-modal-edit')" value="Cerrar" />
            </div>
        </div>
        <!-- </form> -->

    </modal>

</template>

<script>
    import EventBus from '../event-bus';
    var moment = require('moment');

    export default {
        data: function() {
            return {
                authUser: this.$store.getters['auth_user_token/credentials'],
                potions: [],
                clients: [],
                modelSale: {
                    id: '',
                    amount: '',
                    sale: '',
                    potion_id: '',
                    client_id: ''
                },
                moment: moment,
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
            this.getClientsIndex();
        },
        methods: {
            defineSelected: function(potion) {
                if (potion.id == this.modelSale.potion_id) {
                    return true;
                }
                return false;
            },
            getClientsIndex: function() {
                var url = route('clients.index.api');
                axios.get(url, this.headers)
                    .then(response => {
                        this.clients = response.data.result.data;
                    })
                    .catch(error => {
                        this.catchNotification(error);
                    });
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
            beforeOpen: function(event) {
                this.modelSale.id = event.params.modelSale.id;
                this.modelSale.amount = event.params.modelSale.amount;
                this.modelSale.sale = event.params.modelSale.sale;
                this.modelSale.client_id = event.params.modelSale.client_id;
                this.modelSale.potion_id = event.params.modelSale.potion_id;
                // var dateToFormat = this.backEndDateFormat(event.params.modelSale.fecha);
                // this.modelSale.fecha = this.dateToFormat;
            },
            frontEndDateFormat: function(date) {
                return moment(date, 'YYYY-MM-DD').format('DD/MM/YYYY');
            },
            backEndDateFormat: function(date) {
                return moment(date, 'DD/MM/YYYY').format('YYYY-MM-DD');
            },
            saleUpdate: function() {
                    var url = route('sales.update.api', {sale_id: this.modelSale.id});
                    axios.put(url, {
                        amount: this.modelSale.amount,
                        sale: this.modelSale.tipo,
                        client_id: this.modelSale.client_id,
                        potion_id: this.modelSale.potion_id
                    },this.headers).then(response => {
                    toastr.success(response.data.message.success, 200);
                    this.$modal.hide('sale-modal-edit');
                    EventBus.$emit('sale-modal-update-success');
                })
                .catch(error => {
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

<style>


</style>
