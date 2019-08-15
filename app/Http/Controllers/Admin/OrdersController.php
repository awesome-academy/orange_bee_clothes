<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\UpdateOrder;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::paginate(config('order.paginate'));

        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show($id) {
        $order = Order::findOrFail($id);

        if (!$order) {
            return back()->with('status', __('order.not_exist'));
        }

        return view('admin.orders.show', ['order' => $order]);
    }

    public function edit($id) {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('orders.index')->with('status', __('order.not_found'));
        }

        return view('admin.orders.edit',  ['order' => $order]);
    }

    public function update(UpdateOrder $request, $id) {
        $data = $request->only([
            'address',
            'note',
            'status',
            'phone',
        ]);
        $order = Order::find($id);

        try {
            $order->update($data);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        return redirect()->route('orders.show', $order->id);
    }
}
