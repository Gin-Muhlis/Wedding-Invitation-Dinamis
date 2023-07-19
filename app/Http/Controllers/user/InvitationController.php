<?php

namespace App\Http\Controllers\user;

use App\Models\Gift;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvitationController extends Controller
{
    public function demo(Request $request, $code)
    {

        $order = Order::first();
        $code_theme = $order->theme->theme_code;

        $data['visitorName'] = $request->input('to');
        $data['bridegroom'] = $order->bridegrooms()->first();
        $data['wedding_ceremony'] = $order->weddingCeremonies()->first();
        $data['wedding_data'] = $order->allWeddingData()->first();
        $data['stories'] = $order->stories;
        $data['albums'] = $order->albums;
        $data['wedding_reception'] = $order->weddingReceptions()->first();
        $data['dataForGifts'] = $order->gifts;
        $data['rsvps'] = $order->rsvps;

        return view('invitation.' . $code_theme, compact('data'));
    }
}
