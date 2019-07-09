<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders=Order::orderBy('id','DESC')->paginate();
        return view('orders.index',compact('orders'))->with('i',($request->input('page',1)-1));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'fruit' => 'required',
        'quantity' => 'required',
    ]);

        $input = $request->all();
        $order = Order::create($input);
        return redirect()->route('home.index')
        ->with('success','Order successfully added');
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index')
        ->with('success','Order successfully deleted');
    }
}
