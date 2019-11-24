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
              <h1 class="h2">Shopping Cart</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-lg-12">
              <p class="text-muted lead">You currently have {{ Cart::count() }} item(s) in your cart.</p>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box mt-0 pb-0 no-horizontal-padding">
                <form action="{{ url('cart/update') }}" method="POST">
                  {{ @csrf_field() }}
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach(Cart::content() as $row) :?>
                        <tr>
                          <td><a href="#"><?php echo $row->name; ?></a></td>
                          <td>
                            <input type="hidden" name="rowid" value="{{ $row->rowId }}">
                            <input type="number" value="<?php echo $row->qty; ?>" class="form-control" name="qty">
                          </td>
                          <td><?php echo $row->price; ?></td>
                          <td><?php echo $row->total; ?></td>
                          <td>
                            <button style="border: none;background: none;" type="submit"><i class="fa fa-refresh"></i></button>
                          </td>
                          <td>
                             <a class="" href="{{ url('cart/delete/'.$row->rowId) }}" ><i class="fa fa-trash-o"></i>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;?>
                         </form>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3">Total</th>
                          <th colspan="2"><?php echo Cart::total(); ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="box-footer d-flex justify-content-between align-items-center">
                    <div class="left-col"><a href="shop-category.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                    <div class="right-col">
                      <a href="{{ url('cart/formulir') }}" class="btn btn-template-outlined">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th><?php echo Cart::total(); ?></th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th><?php echo Cart::total(); ?></th>
                      </tr>
                    </tbody>
                  </table>
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