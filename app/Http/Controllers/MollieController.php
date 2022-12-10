<?php

namespace App\Http\Controllers;

use App\Http\Requests\MolliePaymentRequest;
use App\Models\Payment;
use Mollie\Api\Resources\Payment as MolliePayment;


class MollieController extends Controller
{
    public function update(MolliePaymentRequest $request)
    {
        $paymentId = $request->input('id');

        $payment = mollie()->payments->get($paymentId);

        Payment::where('payment_id', $paymentId)->update([
            'payment_id' => $paymentId,
            'payment_method' => $payment->method,
            'payment_state' => $payment->status,
        ]);
    }
}
