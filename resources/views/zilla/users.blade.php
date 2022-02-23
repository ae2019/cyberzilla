@extends('zilla.z_layout')

@section('title', 'CyberZilla')
@section('desc', 'CyberZilla')

@section('content')
    <h1>4CyberZilla. Пользователи</h1>

    <div class="container" id="app">
        <div class="col-md-5">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Payments</th>
                    <th scope="col">Delete
                    </td>
                </tr>
                </thead>
                <tbody v-if="users.length!==0">
                <tr v-for="(user,index) in users">
                    <th scope="row">@{{index+1}}</th>
                    <td>@{{user.id}}</td>
                    <td><a v-bind:href="'/zuser_edit/'+user.id">@{{user.name}}</a></td>
                    <td>@{{user.phone}}</td>
                    <td>@{{user.email}}</td>
                    <td><a v-bind:href="'/zuser_payments/'+user.id">Платежи</a></td>
                    <td><a href="javascript:;" v-on:click="deleteUser(user.id, index)">X</a></td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-primary" @click="addUser">Добавить</button>
        </div> <!-- col -->
    </div> <!-- container -->

    <script>
        Vue.createApp({
            data() {
                return {
                    users: [],
                    token: ''
                }
            },
            methods: {
                addUser(id, index) {
                    if (confirm("Добавить нового пользователя?")) {
                        // POST request to add user
                        axios.post('https://softwr.ru/api/users',
                            {
                                name: 'Имя',
                                phone: '+7',
                                email: '@'
                            })
                            .then((resp) => {
                                location.href="/zuser_edit/"+resp.data.id;
                            })
                            .catch(error => {
                                console.log(resp);
                            });
                    } // confirm
                },
                deleteUser(id, index) {
                    if (confirm("Удалить пользователя?")) {
                        axios.delete('/api/users/' + id)
                            .then(resp => {
                                this.users.splice(index, 1);
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                }
            },
            mounted() {
                    this.token = getCookie('token');

                    //console.log(this.token);
                    axios.get('https://softwr.ru/api/users', { headers: { Authorization: `Bearer ${this.token}` } })
                    .then((response) => {
                        this.users = response.data;
                    });
            }

        }).mount('#app')
    </script>

@endsection
