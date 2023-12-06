<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/style.css" />
  <script src="{{asset('backend')}}/js/angular.min.js"></script>
  <script src="{{asset('backend')}}/js/app.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    @include('admin.layout.admin_nvabar')
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('admin.layout.admin_menu')
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title_pages')
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <div class="container-fuild">
      @yield('admin_content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">TTPM_BKAP</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{asset('backend')}}/js/jquery.min.js"></script>
<script src="{{asset('backend')}}/js/jquery-ui.js"></script>
<script src="{{asset('backend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('backend')}}/js/adminlte.min.js"></script>
<script src="{{asset('backend')}}/js/dashboard.js"></script>
<script src="{{asset('backend')}}/js/function.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}

{{--update năm phim --}}
<script type="text/javascript">
  $('.select-year').change(function(){
    var year = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    // alert(year);
    // alert(id_phim);
    $.ajax({
      url:"{{url('/update-year')}}",
      method:"GET",
      data:{year:year, id_phim:id_phim},
      success:function(){
        alert('thay đổi năm phim theo năm ' +year+ ' thành công');
      }
    })
  })
</script>
{{--update năm phim ---end--}}

{{--update topview --}}
<script type="text/javascript">
  $('.select-topviews').change(function(){
    var top_views = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    // alert(year);
    // alert(id_phim);
    if(top_views==1){
      var text = 'Ngày';
    }else if(top_views == 2){
      var text = 'Tuần';
    }else if(top_views ==3){
      var text = 'Tháng';
    }else{
      var text = 'Không';
    }
    $.ajax({
      url:"{{url('/update-topviews')}}",
      method:"GET",
      data:{top_views:top_views, id_phim:id_phim},
      success:function(){
        alert('thay đổi top_views theo ' +text+ ' thành công');
      }
    })
  })
</script>
{{--update topview ---end--}}

{{--slug--}}
<script type="text/javascript">
  function ChangeToSlug()
  {
    var slug;
    //Lấy text từ thẻ input title 
    slug = document.getElementById("slug").value;
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
    document.getElementById('convert_slug').value = slug;
  }
</script>
{{--slug ---end--}}

<script type="text/javascript">
  $('.order_position').sortable({
      placeholder: 'ui-state-highlight',
      update: function(event, ui) {
          var array_id = [];
          $('.order_position tr').each(function() {
              array_id.push($(this).attr('id'));
          });

          $.ajax({
              url: "{{ route('resorting') }}",
              method: "POST",
              data: {
                  array_id: array_id,
                  _token: '{{ csrf_token() }}'
              },
              success: function(data) {
                  // Xử lý thành công
                  alert('sắp xếp thành công');
              },
              error: function(xhr, status, error) {
                  // Xử lý lỗi
                  alert('Lỗi: ' + error);
              }
          });
      }
  });
</script>

<script type="text/javascript">
  $('.chon-phim').change(function(){
    var id = $(this).val();
    $.ajax({
      url:"{{route('chontap')}}",
      method:"GET",
      data:{id:id},
      success:function(data){
        $('#select_phim').html(data);
      }
    })
  })
</script>
</body>
</html>
