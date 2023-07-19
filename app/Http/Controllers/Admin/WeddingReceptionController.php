<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\WeddingReception;
use App\Http\Requests\Admin\WeddingReceptionStoreRequest;
use App\Http\Requests\Admin\WeddingReceptionUpdateRequest;

class WeddingReceptionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', WeddingReception::class);

        $search = $request->get('search', '');

        $weddingReceptions = WeddingReception::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.wedding_receptions.index',
            compact('weddingReceptions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', WeddingReception::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.wedding_receptions.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingReceptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeddingReceptionStoreRequest $request)
    {
        $this->authorize('create', WeddingReception::class);
        $validated = $request->validated();

        $weddingReception = WeddingReception::create($validated);

        return redirect()
            ->route('wedding-receptions.edit', $weddingReception)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingReception $weddingReception
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WeddingReception $weddingReception)
    {
        $this->authorize('view', $weddingReception);

        return view(
            'Admin.app.wedding_receptions.show',
            compact('weddingReception')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingReception $weddingReception
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WeddingReception $weddingReception)
    {
        $this->authorize('update', $weddingReception);

        $orders = Order::pluck('no_order', 'id');

        return view(
            'Admin.app.wedding_receptions.edit',
            compact('weddingReception', 'orders')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingReceptionUpdateRequest $request
     * @param \App\Models\WeddingReception $weddingReception
     * @return \Illuminate\Http\Response
     */
    public function update(
        WeddingReceptionUpdateRequest $request,
        WeddingReception $weddingReception
    ) {
        $this->authorize('update', $weddingReception);

        $validated = $request->validated();

        $weddingReception->update($validated);

        return redirect()
            ->route('wedding-receptions.edit', $weddingReception)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingReception $weddingReception
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        WeddingReception $weddingReception
    ) {
        $this->authorize('delete', $weddingReception);

        $weddingReception->delete();

        return redirect()
            ->route('wedding-receptions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
