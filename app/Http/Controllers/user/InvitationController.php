<?php

namespace App\Http\Controllers\user;

require_once app_path() . '/php/helpers.php';

use App\Models\Gift;
use App\Models\Rsvp;
use App\Models\Order;
use App\Models\ReplyRsvp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RsvpStoreRequest;
use App\Http\Requests\Admin\ReplyRsvpStoreRequest;

class InvitationController extends Controller
{
    public function demo(Request $request, $code)
    {

        $order = Order::first();
        $code_theme = $order->theme->theme_code;

        $data['order'] = $order;
        $data['visitorName'] = $request->input('to');
        $data['bridegroom'] = $order->bridegrooms()->first();
        $data['wedding_ceremony'] = $order->weddingCeremonies()->first();
        $data['wedding_data'] = $order->allWeddingData()->first();
        $data['stories'] = $order->stories;
        $data['albums'] = $order->albums;
        $data['wedding_reception'] = $order->weddingReceptions()->first();
        $data['dataForGifts'] = Gift::with('giftPayment')->where('order_id', $order->id)->get();
        $data['rsvps'] = Rsvp::with('replyRsvps')->where('order_id', $order->id)->latest()->get();

        return view('invitation.' . $code_theme, compact('data'));
    }

    public function sendRsvp(RsvpStoreRequest $request)
    {
        $validated = $request->validated();

        Rsvp::create($validated);

        $rsvps = Rsvp::with('replyRsvps')->where('order_id', $validated['order_id'])->latest()->get();
        $results = [];

        foreach ($rsvps as $rsvp) {
            $replies = [];
            foreach ($rsvp->replyRsvps as $reply) {
                $replies[] = [
                    'name' => $reply->name,
                    'kehadiran' => $reply->kehadiran,
                    'time' => getTimeAgo(strtotime($reply->created_at)),
                    'bg' => $reply->bg_profile,
                    'comment' => $reply->reply,
                ];
            }
            $results[] = [
                'id' => $rsvp->id,
                'name' => $rsvp->name,
                'kehadiran' => $rsvp->kehadiran,
                'time' => getTimeAgo(strtotime($rsvp->created_at)),
                'bg' => $rsvp->bg_profile,
                'comment' => $rsvp->comment,
                'dataReplies' => $replies
            ];
        }

        return response()->json($results);
    }

    public function replyRsvp(ReplyRsvpStoreRequest $request)
    {
        $validated = $request->validated();

        ReplyRsvp::create($validated);

        $rsvps = ReplyRsvp::with('rsvp')->where('rsvp_id', $validated['rsvp_id'])->latest()->get();
        $results = [];

        foreach ($rsvps as $rsvp) {
            $results[] = [
                'id' => $rsvp->rsvp->id,
                'name' => $rsvp->name,
                'kehadiran' => $rsvp->kehadiran,
                'time' => getTimeAgo(strtotime($rsvp->created_at)),
                'bg' => $rsvp->bg_profile,
                'reply' => $rsvp->reply
            ];
        }

        return response()->json($results);
    }
}
