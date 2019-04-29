<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">

        <title>Aplikasi POS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .tester{
                border-width : 1px;
                border-style : solid;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" id="app">
            <br>
                <b>KODE/ID PRODUK</b> <input type="text" name="id" id="id" v-model="kode_produk"> &nbsp;<input type="button" value="TAMBAH BARANG" v-on:click="tambah"><br><br>
                <table>
                    <tr>
                        <td width="">
                            <b>NAMA PRODUK </b> &nbsp; |
                        </td>
                        <td>
                            <b>KUANTITAS</b> &nbsp; |
                        </td>
                        <td>
                            <b>SUBTOTAL</b> &nbsp;
                        </td>
                    </tr>
                    <tr v-for="tambah in tambahProduk">
                        <td>@{{ tambah.nama_barang }}</td>
                        <td>0</td>
                        <td>@{{ tambah.harga_satuan}}</td>
                    </tr>
                </table>
                <hr>
                <b>Total</b>

                <br><br>

                <input type="button" value="SIMPAN">
                <!-- KUANTITAS <input type="text" name="id" id=""><br>
                SUBTOTAL : <span>[SUBTOTAL]</span><br>
                <hr>
                TOTAL <br>
                <input type="button" value="Simpan"> -->
                <!-- <div class="title m-b-md">
                    Laravel
                </div> -->

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    kode_produk:'',
                    tambahProduk:''
                },
                methods: {
                    tambah() {
                        // `this` inside methods points to the Vue instance
                        // alert(this.kode_produk)
                        // `event` is the native DOM event
                        // if (event) {
                        //     alert(event.target.tagName)
                        // }
                        axios.post('http://localhost:8000/api/tambah-item', {
                            idProduk: '1'
                        })
                        .then((response) => {
                            this.tambahProduk = response.data;
                            console.log(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    }
                },
                mounted() {
                    
                }
            })
        </script>
    </body>
</html>
