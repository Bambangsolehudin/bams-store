<!DOCTYPE html>
<html>
<head>
  <title>Cetak PDF</title>


 




</head>
<body>
<div class="row">
     <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Detail Transaksi
            <small class="pull-right">code:  {{ $transaction->code }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-md-6">
           <div class="col-sm-2 invoice-col">
          <b>Penerima</b>
        </div>
          <div class="col-sm-9 invoice-col">
            {{ $transaction->name }}(<strong>{{ $transaction->user->name}})</strong><br>
            {{ $transaction->address }}
        </div>
         <div class="col-sm-2 invoice-col">
          <b>Pengirim</b>
        </div>
          <div class="col-sm-9 invoice-col">
            {{ $transaction->product->user->name }}<br>
            {{ $transaction->product->user->address }}<br>

        </div>
        </div>
         <div class="col-md-6">
        <div class="col-sm-2 invoice-col">
          <b>Ekspedisi</b>
        </div>
        <div class="col-sm-9 invoice-col">
            Code - {{ $transaction->ekspedisi['code'] }} <br>
            Name - {{ $transaction->ekspedisi['name'] }} <br>
            Time - {{ $transaction->ekspedisi['etd'] }} day <br>
        </div>
        <div class="col-sm-2 invoice-col">
          <b>Status </b>
        </div>
        <div class="col-sm-9 invoice-col">
            @if($transaction->status == 0)
              Belum
            @else 
              Lunas
            @endif
        </div>
        </div>
       
        
      </div>
      <br>
      <!-- /.row -->
      <hr>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Price</th>
              <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
              @php
                $gt = 1;
              @endphp
              @foreach($transactiondetail as $td)
                <tr>
                  <td>{{ $td->qty }}</td>
                  <td> {{ $td->product->name }}</td>
                  <td> {{ number_format($td->product->price,2,",",".") }}</td>
                  <td>{{ number_format($td->subtotal,2,",",".") }}</td>
                </tr>
                <?php $gt = $gt + $td->subtotal; ?>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Rekening Bank</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Halaman ini merupakan halaman transaksi, pengiriman pembayaran di lakukan melalui rekening bank.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td> {{ number_format($gt,2,",",".") }}</td>
              </tr>
              <tr>
                <th>Ongkir:</th>
                <td>{{ number_format($transaction->ekspedisi['value'],2,",",".") }}</td>
              </tr>
              <tr>
                <th>Grand Total:</th>
                <td><?php echo number_format($gt + $transaction->ekspedisi['value'],2,",",".") ;?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </section>
    </div>
   
</body>
</html>

