<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Cart;
use App\Models\EBook;
use App\Models\Order;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }

    public function index()
    {
        $books = EBook::all();
        return view('home.index',compact('books'));
    }

    public function ebbokDetail($id)
    {
        $book = EBook::find($id);
        return view('home.ebbok-detail',compact('book'));
    }

    public function cartView()
    {
        $cart = Cart::where('account_id',Auth::guard('account')->user()->account_id)->get();
        return view('home.cart',compact('cart'));
    }

    public function profile()
    {
        $gender = Gender::all();
        $roles = Role::all();
        $account = Auth::guard('account')->user();
        return view('home.profile',compact('account','gender','roles'));
    }

    public function maintaince()
    {
        $accounts  = Account::latest()->get();
        return view('home.maintaince',compact('accounts'));
    }

    public function roleEdit($id)
    {
        $account = Account::find($id);
        $roles = Role::all();
        return view('home.role-edit',compact('account','roles'));
    }

    public function roleUpdate()
    {
        $account = Account::find(request('account_id'));
        $account->role_id = request('roles_id');
        $account->modified_by = Auth::guard('account')->user()->account_id;
        $account->save();
        return redirect()->route('maintaince')->with('success','Role updated successfully');
    }

    public function profileUpdate()
    {
        
        $request = request();
        $account = Account::findOrFail( Auth::guard('account')->user()->account_id);
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;
        $account->gender_id = $request->gender_id;

        $account->email = $request->email;
        if($request->password){
            $account->password = bcrypt($request->password);
        }
        if($request->display_picture){
            $account->display_picture = $request->file('display_picture')->store(
                'assets/display_picture', 'public'
            );
        }
        $account->save();

        return view('home.profile-success');
    }

    public function cart()
    {
        $request = request();
        $cart = new Cart();
        $cart->account_id = $request->account_id;
        $cart->ebook_id = $request->ebook_id;
        $cart->save();
       return redirect()->route('cart.index')->with('success','Item added to cart');
    }

    public function cartDestroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart.index')->with('success','Item removed from cart');
    }

    public function userDestroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->route('maintaince')->with('success','User deleted successfully');
    }

    public function order()
    {
        $request = request();
        $cart = Cart::where('account_id',$request->account_id)->get();
        foreach($cart as $c){
            $data["ebook_id"] =  $c->ebook_id;
            $data["account_id"] = $c->account_id;
            $data["order_date"] = date('Y-m-d');
          Order::create($data);
          $c->delete();
        }
       
        return view('home.order-success');
    }
}
