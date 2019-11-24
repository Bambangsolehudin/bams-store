<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Auth;
use Alert;
class BerandaController extends Controller
{
	protected $category ;
	public function __construct(){
		$this->category = Category::where('parent_id',null)->get();
	}
   public function index(){
   	$category = $this->category;
   	$products = Product::take(8)->orderBy('id','DESC')->get();
   	return view('homepage.homepage',compact('products','category'));
   }
   public function product(){
   	$category = $this->category;
   	$products = Product::orderBy('id','DESC')->paginate(8);
   	return view('homepage.product',compact('products','category'));
   }
   public function productbycategory($slug){
   		$categorys = Category::where('slug',$slug)->first();
   		$id 	  = $categorys->id;
   		$category = $this->category;
   		$name 	  = $categorys->name;
   		$products = Product::orderBy('id','DESC')->where('category_id',$id)->get();
   		return view('homepage.productbycategory',compact('products','category','name'));
   }
   public function detail($slug){
   		$products = Product::where('slug',$slug)->first();
   		$category = $this->category;
   		return view('homepage.detail',compact('products','category'));
   }
   public function penjual(){
      $category = $this->category;
      $user = User::orderBy('id','DESC')->where('status',"1")->where('role','!=','member')->get();
      return view('homepage.supplier',compact('category','user'));
   }
   public function productbypenjual($id){
      $category = $this->category;
      $user = User::find($id);
      $products = $user->product;
      return view('homepage.productbypenjual',compact('products','category','user'));
   }
   public function myprofil(){
      $category = $this->category;
      $user  = User::where('id',Auth::user()->id)->first();
      return view('homepage.myprofil',compact('category','user'));
   }
   public function updateprofil(Request $data){
    if( $file = $data->file('file'))
        {
            $filename = $file->getClientOriginalName();
            $data->file('file')->move('static/dist/img/',$filename);
            $img = 'static/dist/img/'.$filename;
        }else
        {
            $img = $data->tmp_image ;
        }
    $mydata = ([
        'name' => $data['name'],
        'email' => $data['email'],
        'username'  => $data['username'],
        'address'   => $data['address'],
        'phone'     => $data['phone'],
        'gender'    => $data['gender'],
        'birthday'  => $data['birthday'],
        'role'      => $data['role'],
        'status'    => "0",
        'photo'     => $img,
        'password' => bcrypt($data['password']),
    ]);
    User::where('id',$data->id)->update($mydata);
    Alert::success('', 'Profil  berhasil di perbarui');
    return redirect('myprofil');
    }
public function logout(){
    Auth::logout();
    Alert::success('','Berhasil keluar');
    return redirect('/');
 }
}
