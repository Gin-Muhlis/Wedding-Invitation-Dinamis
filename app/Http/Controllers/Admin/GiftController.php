<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gift;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\GiftStoreRequest;
use App\Http\Requests\Admin\GiftUpdateRequest;

class GiftController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Gift::class);

        $search = $request->get('search', '');

        $gifts = Gift::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.gifts.index', compact('gifts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Gift::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.gifts.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\GiftStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftStoreRequest $request)
    {
        $this->authorize('create', Gift::class);

        $validated = $request->validated();

        $gift = Gift::create($validated);

        return redirect()
            ->route('gifts.edit', $gift)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Gift $gift)
    {
        $this->authorize('view', $gift);

        return view('Admin.app.gifts.show', compact('gift'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Gift $gift)
    {
        $this->authorize('update', $gift);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.gifts.edit', compact('gift', 'orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\GiftUpdateRequest $request
     * @param \App\Models\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function update(GiftUpdateRequest $request, Gift $gift)
    {
        $this->authorize('update', $gift);

        $validated = $request->validated();

        $gift->update($validated);

        return redirect()
            ->route('gifts.edit', $gift)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gift $gift)
    {
        $this->authorize('delete', $gift);

        $gift->delete();

        return redirect()
            ->route('gifts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
