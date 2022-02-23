@extends('zilla.z_layout')

@section('title', 'Payments')
@section('desc', 'Payments')

@section('content')
    <h1>Payments of a user №{{$id}}</h1>
    <br>
    <div class="container" id="app">
        <div class="col-md-5">

            <table class="table table-striped table-hover" v-if="pays.length!==0">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дата платежа</th>
                    <th scope="col">Сумма</th>
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pay,index) in pays">
                    <th scope="row">@{{index+1}}</th>
                    <td>@{{pay.pay_date}}</td>
                    <td>@{{pay.summa}}</td>
                </tr>
                </tbody>
            </table>
            <div v-if="pays.length==0 && loaded"><strong>Список платежей пуст</strong></div>
            <br/>
            <a class="btn btn-primary" href="/zusers/">Пользователи</a>
        </div> <!-- col -->
    </div> <!-- container -->

    <script>
        Vue.createApp({
            data() {
                return {
                    pays: [],
                    loaded: false
                }
            },
            methods: {
            },
            mounted() {
                axios.get('https://softwr.ru/api/pays/'+{{$id}})
                    .then((response) => {
                        this.pays = response.data;
                        this.loaded = true;
                    });
            }

        }).mount('#app')
    </script>

@endsection
