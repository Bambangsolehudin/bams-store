<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Auth;
use App\Category;
use App\User;
use App\Transaction;
use Alert;
class CartController extends Controller
{
    protected $category ;
    public function __construct(){
        $this->category = Category::where('parent_id',null)->get();
    }
    public function index(Request $req){
        // Cart::destroy();
        $product = Product::find($req->id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $req->qty, 'price' => $product->price]);
        return redirect('keranjang');
    }
    public function keranjang(){
        $category = $this->category;
        return view('homepage.keranjang',compact('category'));
    }
    public function update(Request $req){
        Cart::update($req->rowid, $req->qty);
        $category = $this->category;
        return redirect('keranjang');
    }
    public function delete($rowid){
        Cart::remove($rowid);
        $category = $this->category;
        return redirect('keranjang');
    }
    public function formulir(){
        $category = $this->category;
        return view('homepage.formulir',compact('category'));

    }
    public function transaction(Request $req){
       foreach(Cart::content() as $row){
            $product = Product::find($row->id);
          
            $city = json_decode(City(),true);
            $weight = $product->weight * $row->qty;
            foreach ($city['rajaongkir']['results'] as $key ) {
                $product->stock = $product->stok - $row->qty;
                $product->save();
                if($product->user->address==$key['city_name']){
                     $cost = Cost($key['city_id'],$req->city,$weight,$req->eks);
                     $data = json_decode($cost,true);
                     Cart::update($row->rowId,['options' => [
                        'code'  => $data['rajaongkir']['results'][0]['code'],
                        'name'  => $data['rajaongkir']['results'][0]['name'],
                        'value' => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],
                        'etd'   => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd']
                        ]]);
                    $eks = [
                       'code' =>  $row->options->code, 
                        'name' =>$row->options->name,
                        'value' => $row->options->value,
                        'etd' =>$row->options->etd
                    ];
                    $transaction = new Transaction;
                    $transaction->code = date('ymdhi').Auth::user()->id;
                    $transaction->user_id = Auth::user()->id;
                    $transaction->qty = $row->qty;
                    $transaction->subtotal = $row->subtotal;
                    $transaction->name = $req->name;
                    $transaction->address = $req->city;
                    $transaction->portal_code = $req->portal_code;
                    $transaction->ekspedisi = $eks;
                    $transaction->product_id = $product->id;
                    $transaction->save();
                    
                    Cart::remove($row->rowId);
                }   
            }
            if(Cart::count() == 0)
            {
               return redirect('cart/myorder');
            }
        }
    }
}

