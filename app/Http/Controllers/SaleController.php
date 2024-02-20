<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SaleController extends Controller
{
    public function index(){
        $sales = Sale::with('user')->with('product')->get();
        return view('orders', compact('sales'));
    }
    public function OrderProduct(Request $request){
        
        $validatData = $request->validate([
            'product_id' => "required",
            'price' => "required",
            'quantite' => "required",
            'previous_url'=>'required'
        ]);
        $sale = new Sale();
        $sale->user_id = session("user_id");
        $sale->product_id  = $validatData['product_id'];
        $sale->price = $validatData['price'];
        $sale->quantite = $validatData['quantite'];
        $sale->status = "pending";
        $sale->save();
        return redirect($request->previous_url);
    }
    public function orderdsUser($id){
        $sales = Sale::with('user')->with('product')->where('user_id',$id)->get();
        return view('user.myorders',compact('sales'));
    }
    public function Payment(Request $request){
        Stripe::setApiKey('sk_test_51OgSVgE3Uo0XLWPtmjKABCTBt1OLGUKhViAW2WgEIEuYffBIpumE78nGP0kk1wDiDMJUckfL7PMRpTycyl7DYM9f00nhKSBVZE');
        $checkout_session = Session::create([
            'line_items' => [[
                'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Pack_Order',
                ],
                'unit_amount' => 100,
                ],
                'quantity' => $request->totlaPayment,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/',
            'cancel_url' => 'http://127.0.0.1:8000/Error',
        ]);
        foreach($request->sale_id as $sale_id){
            Sale::where('id',$sale_id)->update([
                'status'=>'completed',
            ]);
        }
        return redirect()->away($checkout_session->url);
    }
}
