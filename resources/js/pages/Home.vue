<template>
<div class="container background-fondo">
    <div class="row px-md-5 py-md-5" style="margin-top:15px;">
        <div class="col-12 mx-md-n5 my-3">
            <div class="px-md-5">
                <div class="p-3 border bg-light">
                    <div class="card-header" style="font-weight:bold;">
                        <p>Gracias...</p>
                    </div>
                    <div class="card-body">
                        <p><b>Hey foddie!!! gracias por la entrevista y dar la oportunidad...</b></p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <span class="badge badge-primary badge-pill mx-4">1</span>
                               No olvides hacer composer install y npm install...debes crear un .env y hacer npm run watch ya que use laravel elixir

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <span class="badge badge-primary badge-pill mx-4">2</span>
                              Luego crear una bases de datos llamada pociones ...correr las migraciones (php artisan migrate) y luego rellenar automaticamente la bases de datos
                              (php artisan db:seed) igual enviare el script de la bases de datos...correr php artisan key:generate para generar el key en el .env... (php artisan optimize:clear), php artisan serve para levantar el proyecto
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge badge-primary badge-pill mx-4">3</span>
                                Por ultimo enviare el proyecto completo mas el script de bases de datos por webtransfer...Gracias
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

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
