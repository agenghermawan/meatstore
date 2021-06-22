<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;


class CheckoutController extends Controller
{

    public function checkoutdata(Request $request)
    {
        $user = Auth::user();
        $request -> all();
        $name = $request -> name;
        $totalprice = $request -> totalprice;
        $email = $request -> email;
        $address_one = $request -> address_one;
        $address_two = $request -> address_two;
        $province = $request -> province;
        $city = $request -> city;
        $zip_code = $request -> zip_code;
        $phone = $request -> phone;

                 $carts = Cart::with(['product','user'])
                 ->where('users_id', Auth::user()->id)
                 ->get();

        return view('frontend.paymentorder',compact('name','totalprice','email','address_one','address_two','province','city','zip_code','phone','carts'));
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $code = 'STORE-' . mt_rand(0000,9999);

         $carts = Cart::with(['product','user'])
                 ->where('users_id', Auth::user()->id)
                 ->get();

         $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'name' => $request -> name,
            'email' => $request -> email,
            'address_one' =>  $request -> address_one,
            'address_two' =>  $request -> address_two,
            'province' => $request -> province,
            'city' => $request -> city,
            'zip_code' => $request -> zip_code,
            'phone' => $request -> phone,
            'code' => $code
            
        ]);

           foreach ($carts as $cart) {
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->Price,
            ]);
        }

              Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->delete();

                    Config::$serverKey = config('services.midtrans.serverKey');
                    Config::$isProduction = config('services.midtrans.isProduction');
                    Config::$isSanitized = config('services.midtrans.isSanitized');
                    Config::$is3ds = config('services.midtrans.is3ds');

                 // Buat array untuk dikirim ke midtrans

            $midtrans = array(
            'transaction_details' => array(
                'order_id' =>  $code,
                'gross_amount' => (int) $request->total_price,
            ),
            'customer_details' => array(
                'first_name'    =>  $request -> name,
                'email'         =>  $request -> email,
            ),

            'enabled_payments' => array('gopay','bank_transfer','permata_va','bca_va'),
            'vtweb' => array()
        );

        
        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect ke halaman midtrans
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
 
    }

    public function order()
    {
    //    $carts = Cart::with(['product.galleries', 'user'])
    //    ->where('users_id', Auth::user()->id)
    //    ->get();

       $transaction = Transaction::orderBy('id','DESC')
       ->where('users_id',Auth::user()->id)->first();
       
        // $transactiondetail = TransactionDetail::with('product.galleries','transaction')->where('id',$transaction->id)->get();

    //    return view('frontend.paymentorder',compact('carts','transaction','transactiondetail'));
    }

    public function callback()
    {

    }
}
