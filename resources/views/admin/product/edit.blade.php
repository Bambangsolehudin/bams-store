@extends('admin.layout.master')
  @section('header')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <style type="text/css">
    .table_list {
      list-style: none;
      padding: 4px;
      margin-left: -30px;
    }
  </style>
  <title>Add Product - Tumbas.id</title>
  @endsection
  @section('body')
  <div class="row">
    <div class="col-md-12">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
            </div>
            <form role="form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Product" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" class="form-control"  placeholder="Enter Slug" name="slug" value="{{$product->slug}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                 <textarea   name="description" class="form-control">{{$product->description}}</textarea>
                
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Stock</label>
                  <input type="number" class="form-control"  placeholder="Enter your Stock" name="stock" value="{{$product->stock}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control"  placeholder="Enter your Price" name="price" value="{{$product->price}}">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Weight</label>
                  <input type="number" class="form-control"  
                      placeholder="Enter your Price" 
                      name="weight"
                      value="{{ $product->weight }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Category</label>
                  <select class="form-control" name="category_id">
                     @foreach($categorys as $category)
                        <option 
                        @if($product->category_id ==  $category->id)
                          selected="selected" 
                        @endif
                        value="{{ $category->id }}">{{ $category->name }}</option>
                        @foreach($category ->children as $sub)
                        <option 
                        @if ($product->category_id == $sub->id )
                          selected="selected" 
                        @endif
                        value="{{ $sub->id }}"> - {{ $sub->name }}</option>
                        @endforeach
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <div class="row">
                  <div class="col-md-6">
                      <input type="file" class="form-control" name="file">
                  </div>
                    <di v class="col-md-6">
                     <img src="{{ url($product->photo) }}" width="150px">
                     <input type="hidden" name="tmp_image" value="{{ $product->photo }}">
                  </div>
                </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
  </div>
   
          <!-- /.box -->
  @endsection
  @section('footer')
      <!-- DataTables -->
  <script src="{{ asset('static/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('static/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>

  <!-- CKEditor init -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
    $('textarea[name=description]').ckeditor({
      height: 300,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>

  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
  </script>

  <script>
    $(document).ready(function(){

      // Define function to open filemanager window
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };

    });
  </script>
  @endsection
@show 