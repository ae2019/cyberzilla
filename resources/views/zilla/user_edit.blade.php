@extends('zilla.z_layout')

@section('title', 'Edit user')
@section('desc', 'Edit user')

@section('content')
    <h1>Edit user №{{$id}}</h1>

    <div class="container" id="app">
        <div class="col-md-5">
<form action="" method="put">
<input type="hidden" name="id" value="{{$id}}">
 <div class="mb-3">
    <label for="" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="name" v-model="user.name">
  </div>

  <div class="mb-3">
     <label for="" class="form-label">phone</label>
     <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" v-model="user.phone">
   </div>

   <div class="mb-3">
      <label for="" class="form-label">email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="email" v-model="user.email">
    </div>
    <button class="btn btn-primary" @click="greet" :disabled="saved">Сохранить</button> &nbsp;
    <a class="btn btn-primary" href="/zusers/">Пользователи</a>
    <!--onclick="javascript:history.back(); return false;"-->

</form>
         </div> <!-- col -->

    </div> <!-- container -->

<script>
    Vue.createApp({
        data() {
            return {
				user: {},
				saved: false
 			}
        },
        methods: {
            greet: function () {
            // `this` внутри методов указывает на экземпляр Vue

            // PUT request to save data
            axios.put('https://softwr.ru/api/users/'+{{$id}},
            {
                name: this.user.name,
                phone: this.user.phone,
                email: this.user.email
            })
            .then( (response) => {
             });

            this.saved = true;
            }

		},
        mounted() {
            axios.get('https://softwr.ru/api/users/'+{{$id}})
            .then( (response) => {
                //console.log(response);
                this.user = response.data;
                //console.log(this.user);
                });
        }

    }).mount('#app')
</script>
@endsection
