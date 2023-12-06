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
                    
                    <form action="{{route('post_register')}}" method="POST">
                        @csrf
                        <h2 style="text-align: center">Đăng Kí </h2>
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                    <strong>{{$message}}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="loginEmail">Tên *</label>
                            <input name="name" type="text" class="form-control" id="loginEmail" placeholder="Nhập tên" required>
                        </div>
                        <div class="form-group">
                            <label for="loginEmail">Email *</label>
                            <input name="email" type="email" class="form-control" id="loginEmail" placeholder="Nhập email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Mật khẩu *</label>
                            <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Nhập lại Mật khẩu *</label>
                            <input name="password" type="password" class="form-control" id="loginPassword" placeholder="..." required>
                        </div>
                        <div style="text-align: center" class="from-group">
                            <button style="margin: 10px; width: 150px;" type="submit" class="btn btn-danger">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection