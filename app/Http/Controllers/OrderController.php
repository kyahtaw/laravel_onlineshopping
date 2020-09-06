<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrderController extends Controller
{

    public function __construct($value=''){
        $this->middleware('role:Admin')->only('index','show');
        $this->middleware('role:Customer')->only('store');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('backend.items.orderlistindex',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //db($request->notes)
        $cartArr = json_decode($request->shop_data); //arr
        $total =0;
        // dd($cartArr->product_list);
        foreach ($cartArr->product_list as $row) {
            $total+=($row->price * $row->quantity);
        }

        $order = new Order;
        $order->voucherno = uniqid();
        $order->orderdate = date('Y-m-d');
        $order->user_id=Auth::id();//auth id(1 => users table)
        $order->note=$request->notes;
        $order->total= $total;
        $order->save();//only saved into order table

        //save into order_detail
        foreach ($cartArr->product_list as $row) {

            $order->items()->attach($row->id,['qty'=>$row->quantity]);
        }
        return 'Successful!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderdetail=Order::find($id);
        return view('backend.items.show',compact('orderdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id)->delete();
        return redirect()->route('orders.index');
    }
}
