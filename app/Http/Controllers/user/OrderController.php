<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Theme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Core\Number;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function order(Request $request, $code)
    {
        $choicedTheme = Theme::where('theme_code', $code)->first() ?? null;

        if (is_null($choicedTheme)) {
            abort(404);
        }

        return view('order', [
            'theme' => $choicedTheme
        ]);
    }

    public function make(Request $request)
    {
        if (!Auth::check()) {
            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone,
                'key' => Str::uuid(),
                'password' => Hash::make($request->password)
            ];

            $user = User::create($user_data);

            Auth::login($user);

            $theme = Theme::findOrFail($request->theme_id);

            $order_data = [
                'no_order' => Str::uuid(),
                'order_date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
                'domain' => $request->domain,
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'total_order' => $theme->category->price,
                'status' => 'menunggu pembayaran'
            ];

            $order = Order::create($order_data);

            return redirect()->route('order.confirmation', ['id' => $order->id]);
        } else {
            $user = Auth::user();

            $theme = Theme::findOrFail($request->theme_id);

            $order_data = [
                'no_order' => Str::uuid(),
                'order_date' => Carbon::parse(Carbon::now())->format('Y-m-d'),
                'domain' => $request->domain,
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'total_order' => $theme->category->price,
                'status' => 'menunggu pembayaran'
            ];

            $order = Order::create($order_data);

            return redirect()->route('order.confirmation', ['id' => $order->id]);
        }
    }

    public function confirmation($id)
    {
        $order = Order::findOrFail($id);
        $user = $order->user;

        $snapToken = $this->midtransConfigure($order, $user);
        return view('detail_order', compact('order', 'snapToken'));
    }

    private function midtransConfigure($order, $user)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.midtrans_server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_order,
            ),
            'customer_details' => array(
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone_number
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }

    public function callback(Request $request)
    {
        $server_key = config('midtrans.midtrans_server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $server_key);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::findOrFail($request->order_id);
                $order->update(['status' => 'aktif']);
                return redirect()->route('order.success');
            }
        }
    }

    public function success()
    {
        return view('success');
    }
}
