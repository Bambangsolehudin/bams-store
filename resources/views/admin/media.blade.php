@extends('admin.layout.master')
  @section('header')
  <title>Media - Tumbas.id</title>
  @endsection
  @section('body')
  <div class="row">
    <div class="col-md-12">
       <div class="box box-primary">
                <iframe src="/laravel-filemanager" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
          </div>
    </div>
  </div>
  @endsection
  @section('footer')
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>
  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  <script>
    $(document).ready(function(){
      // Define function to open filemanager window
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'image', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };

    });
  </script>
  @endsection
@show
