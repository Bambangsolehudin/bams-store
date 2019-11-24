<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Mail;
use Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Alert;

class AuthController extends Controller
{
	protected $category ;
	public function __construct(){
		$this->category = Category::where('parent_id',null)->get();
	}
    public function register(){
    	$category = $this->category;
    	return view('homepage.register',compact('category'));
    }

     protected function store(Request $data)
    {
        $remember_token = base64_encode($data['email']);
        $mydata =  [
            'name' => $data['name'],
            'email' => $data['email'],
            'username'  => $data['username'],
            'address'   => $data['address'],
            'phone'     => $data['phone'],
            'gender'    => $data['gender'],
            'birthday'  => $data['birthday'],
            'role'      => $data['role'],
            'status'    => "0",
            'password' => bcrypt($data['password']),
            'remember_token' => $remember_token,
        ];
        User::create($mydata);
        Mail::send('home', array('firstname' => $data['name'],'remember_token' => $remember_token) , function($pesan) use($data){
            $pesan->to($data['email'],'Verifikasi')->subject('Verifikasi Email');
            $pesan->from('didikprab@gmail.com','Verifikasi Akun email anda');
        });
        Alert::success('', 'Pendaftaran selesai');
        return redirect('/');
    }
    public function verif($token){
        $user = User::where('remember_token',$token)->first();
        if($user->status=="0"){
            $user->status = "1";
        }
        $user->save();
        Alert::success('', 'Verifikasi Sukses,silahkan login');
        return redirect('auth/register');
    }
    public function login(Request $request){
        $email =  $request->email;
        $pwd   =  $request->password;

        if(Auth::attempt(['email' => $email,'password' => $pwd])){
            $cek = User::where('id',Auth::user()->id)->first();
            if($cek->status == 0){
                Auth::logout();
                Alert::error('', 'Maaf akun belum terverifikasi');
                return redirect('/');
            }else{
                return redirect()->back();
            }
        }else{
            Alert::error('', 'Maaf Email atau password tidak sesuai');
                return redirect('/');
        }
       
    }
}
