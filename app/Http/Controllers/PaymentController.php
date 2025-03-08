<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function showCheckout()
    {
        return view('checkout');  
    }

    public function processPayment(Request $request)
    {
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100, 
                'currency' => 'usd',
                'source' => $request->stripeToken, 
                'description' => 'Payment for Order #' . $request->order_id,
            ]);
            
            $transaction = new Transaction([
                'order_id' => $request->order_id,
                'amount' => $request->amount,
                'status' => 'success',
                'stripe_charge_id' => $charge->id
            ]);
            $transaction->save();
    
            return redirect()->route('payment.success');
        } catch (\Stripe\Exception\CardException $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }
    
    

    public function showSuccessPage()
    {
        return view('payment.success');
    }

    public function showFailedPage()
    {
        return view('payment.failed');
    }
}