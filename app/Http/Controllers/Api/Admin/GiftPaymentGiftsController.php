<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\GiftPayment;
use Illuminate\Http\Request;
use App\Http\Resources\GiftResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\GiftCollection;

class GiftPaymentGiftsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('view', $giftPayment);

        $search = $request->get('search', '');

        $gifts = $giftPayment
            ->gifts()
            ->search($search)
            ->latest()
            ->paginate();

        return new GiftCollection($gifts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('create', Gift::class);

        $validated = $request->validate([
            'owner_name' => ['required', 'max:255', 'string'],
            'no_data' => ['required'],
            'order_id' => ['required', 'exists:orders,id'],
        ]);

        $gift = $giftPayment->gifts()->create($validated);

        return new GiftResource($gift);
    }
}
