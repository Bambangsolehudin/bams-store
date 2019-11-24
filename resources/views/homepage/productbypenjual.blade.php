@extends('homepage.index')
@section('header')
    <title>Tumbas.id - Jual Gedget dan Komputer</title>

@endsection
@section('slide')
 
@endsection
@section('contents')
 <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">All Product</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{ $user->username }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  <div id="content">
  	<br>
  	<div class="container">
          <div class="row">
            <div class="col-md-12">
            	<table class="table table-bordered">
            		<tr><th width="200px">Username</th><td>{{ $user->username }}</td></tr>
            		<tr><th>Name</th><td>{{ $user->name }}</td></tr>
            		<tr><th>Email</th><td>{{ $user->email }}</td></tr>
            		<tr><th>Address</th><td>{{ $user->address }}</td></tr>
            		<tr><th>Photo</th><td><img src="{{ url($user->photo) }}" width="70px"/></td></tr>
            		<tr><th>Tanggal Bergabung</th><td>{{ date('d/m/y',strftime($user->create_at)) }}</td></tr>
            	</table>
            </div>
        </div>
    </div>
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
              <p class="text-muted lead text-center">Jual Komputer dan Gedget terlengkap.</p>
              <div class="products-big">
                <div class="row products">
                  @foreach($products as $product)
                  <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="image">
                        <a href="{{ url('product/detail/'.$product->slug) }}"><img src="{{ url($product->photo) }}" alt="" class="img-fluid image1"></a></div>
                      <div class="text">
                        <h3 class="h5"><a href="{{ url('product/detail/'.$product->slug) }}">
                          {{ $product->name }}
                        </a></h3>
                        <p class="price">Rp. {{ number_format($product->price) }}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>

@endsection

@section('footer')

@endsection
@show