<?php

namespace App\Http\Controllers\Admin;

use App\Models\GiftPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.gift_payments.index',
            compact('giftPayments', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', GiftPayment::class);

        return view('Admin.app.gift_payments.create');
    }

    /**
     * @param \App\Http\Requests\Admin\GiftPaymentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftPaymentStoreRequest $request)
    {
        $this->authorize('create', GiftPayment::class);

        $validated = $request->validated();
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('public');
        }

        $giftPayment = GiftPayment::create($validated);

        return redirect()
            ->route('gift-payments.edit', $giftPayment)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('view', $giftPayment);

        return view('Admin.app.gift_payments.show', compact('giftPayment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GiftPayment $giftPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GiftPayment $giftPayment)
    {
        $this->authorize('update', $giftPayment);

        return view('Admin.app.gift_payments.edit', compact('giftPayment'));
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
        if ($request->hasFile('icon')) {
            if ($giftPayment->id) {
                Storage::delete($giftPayment->id);
            }

            $validated['icon'] = $request->file('icon')->store('public');
        }

        $giftPayment->update($validated);

        return redirect()
            ->route('gift-payments.edit', $giftPayment)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('gift-payments.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
