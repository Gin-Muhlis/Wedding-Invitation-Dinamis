<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\GiftPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\GiftPaymentResource;
use App\Http\Resources\GiftPaymentCollection;
use App\Http\Requests\Admin\GiftPaymentStoreRequest;
use App\Http\Requests\Admin\GiftPaymentUpdateRequest;

class GiftPaymentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', GiftPayment::class);

        $search = $request->get('search', '');

        $giftPayments = GiftPayment::search($search)
            ->latest()
            ->paginate();

        return new GiftPaymentCollection($giftPayments);
    }

    /**
     * @param \App\Http\Requests\Admin\GiftPaymentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftPaymentStoreRequest $request)
    {
        $this->authorize('create', GiftPayment::class);

        $validated = $request->validated();
        if ($request->hasFile('id')) {
            $validated['id'] = $request->file('id')->store('public');
        }

        $giftPayment = GiftPayment::create($validated);

        return new GiftPaymentResource($giftPayment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('view', $giftPayment);

        return new GiftPaymentResource($giftPayment);
    }

    /**
     * @param \App\Http\Requests\Admin\GiftPaymentUpdateRequest $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function update(
        GiftPaymentUpdateRequest $request,
        GiftPayment $giftPayment
    ) {
        $this->authorize('update', $giftPayment);

        $validated = $request->validated();

        if ($request->hasFile('id')) {
            if ($giftPayment->id) {
                Storage::delete($giftPayment->id);
            }

            $validated['id'] = $request->file('id')->store('public');
        }

        $giftPayment->update($validated);

        return new GiftPaymentResource($giftPayment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('delete', $giftPayment);

        if ($giftPayment->id) {
            Storage::delete($giftPayment->id);
        }

        $giftPayment->delete();

        return response()->noContent();
    }
}
