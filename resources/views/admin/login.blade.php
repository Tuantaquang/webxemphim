<!DOCTYPE html>
<html>
<head>
    <title>Admin | Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <style type="text/css">
        body{
            background-image: url("{{asset('backend')}}/images/bg_ad1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <div class="container ">
        <div class="row justify-content-center" style="margin-top: 100px">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="container">
                        <h2 style="text-align: center">Đăng nhập </h2>
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                    <strong>{{$message}}</strong>
                            </div>
                        @endif
                        <form action="{{route('admin_postlogin')}}" method="POST">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>