<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('welcome');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $demo = Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => $request->name 
        ]);

        Session::flash('success', $demo->id);

        return back();
    }

    public function refund(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51IiZqZSGvUeQchq1sZg48YplIGOefELyHZcsjhzsZTktRZQrUGsmplbP4bhv4SwZy7ysbU47QDQGPl8VbezMh7ec00Fk81DnUl'
            );
            $stripe->refunds->create([
            'charge' => $request->payment_id,
            ]);
            echo 'refund successfully';
    }
}