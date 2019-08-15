<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Requests\CheckOut;
use Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $data = [];

        if (!session()->has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $user = User::find(auth()->id());
        $data = [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'user' => $user
        ];

        return view('frontend.checkout', $data);
    }

    public function store(Request $request) {

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $data = $request->only([
            'name',
            'email',
            'phone',
            'address',
            'payment',
            'note',
        ]);
        $data['user_id'] = auth()->id();
        $data['total_quantity'] = $cart->totalQuantity;
        $data['total'] = $cart->totalPrice;
        $data['address'] = $request->input('address');
        $data['phone'] = $request->input('phone');

        try {
            $order = Order::create($data);
        } catch (\Exception $e) {
            return back()->with('error', __('checkout.create_fail'));
        }
        Session::forget('cart');

        return redirect()->route('home')->with('success', __('checkout.create_success'));
    }
}
