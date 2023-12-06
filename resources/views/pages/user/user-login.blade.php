@extends('layout')
@section('main-content')

<style>
    .card{
        background: #ffff;
        border-radius: 2rem;
    }
    .card form{
        color: black;
        margin: 10px;
    }
    #con-log{
        /* background: white; */
        background-image: url("{{asset('backend')}}/images/bg_ad1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    #con-log .row{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
    }
</style>
    <div class="container" id="con-log">
        <div class="row" >
            <div class="col-md-6">
                <div class="card">
                    <h2 style="text-align: center">Đăng nhập </h2>
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                    <strong>{{$message}}</strong>
                            </div>
                        @endif
                    <form action="{{route('post_login')}}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="loginEmail" placeholder="Nhập email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div style="text-align: center" class="from-group">
                            <button style="margin: 10px; width: 150px;" type="submit" class="btn btn-danger">Đăng nhập</button>
                        </div>
                        <div style="text-align: center" class="from-group">
                            <a class="btn btn-success" href="{{route('register')}}" style="width: 150px; margin-bottom: 5px">đăng kí</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            var successMessage = '{{ session('success') }}';
            if (successMessage) {
                alert(successMessage);
            }
        });
    </script>

@endsection