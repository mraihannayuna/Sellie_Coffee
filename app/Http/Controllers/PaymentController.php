<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        // Validate the request data
        $request->validate([
            'total_amount' => 'required|numeric',
        ]);

        // Get the total amount from the request
        $totalAmount = $request->input('total_amount');

        // Create an order record in the database
        $order = Order::create([
            'order_id' => uniqid(), // Generate a unique order ID
            'user_id' => Auth::id(), // Assuming you have user authentication
            'status' => 'pending',
            'total_amount' => $totalAmount,
        ]);

        // Set up Midtrans configuration
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$clientKey = config('midtrans.client_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');

        // Prepare transaction details
        $transactionDetails = [
            'order_id' => $order->order_id,
            'gross_amount' => $totalAmount,
        ];

        // Generate Snap token for payment
        $snapToken = Snap::getSnapToken($transactionDetails);

        // Redirect user to Midtrans payment page
        return redirect()->away('https://app.midtrans.com/snap/v1/transactions/' . $snapToken);
    }
}
