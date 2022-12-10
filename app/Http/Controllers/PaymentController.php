<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\URL;
use Mollie\Api\Types\PaymentStatus;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(PaymentRequest $paymentRequest)
    {
        $amount = number_format($paymentRequest->input('amount'), 2, '.', '');

        $payment = Payment::create([
            'amount' => $amount,
            'payment_state' => PaymentStatus::STATUS_PENDING,
        ]);

        $molliePayment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $amount,
            ],
            "description" => "Payment",
            "redirectUrl" => URL::signedRoute('payment.success', ['payment' => $payment->id]),
            "webhookUrl" => route('webhook.mollie.update'),
        ]);

        $payment->payment_id = $molliePayment->id;
        $payment->save();

        return redirect($molliePayment->getCheckoutUrl(), 303);
    }

    public function success(Payment $payment)
    {
        return view('payment.success', compact('payment'));
    }
}
