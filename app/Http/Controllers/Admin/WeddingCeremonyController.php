<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\WeddingCeremony;
use App\Http\Requests\Admin\WeddingCeremonyStoreRequest;
use App\Http\Requests\Admin\WeddingCeremonyUpdateRequest;

class WeddingCeremonyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', WeddingCeremony::class);

        $search = $request->get('search', '');

        $weddingCeremonies = WeddingCeremony::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.wedding_ceremonies.index',
            compact('weddingCeremonies', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', WeddingCeremony::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.wedding_ceremonies.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingCeremonyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeddingCeremonyStoreRequest $request)
    {
        $this->authorize('create', WeddingCeremony::class);

        $validated = $request->validated();

        $weddingCeremony = WeddingCeremony::create($validated);

        return redirect()
            ->route('wedding-ceremonies.edit', $weddingCeremony)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingCeremony $weddingCeremony
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WeddingCeremony $weddingCeremony)
    {
        $this->authorize('view', $weddingCeremony);

        return view(
            'Admin.app.wedding_ceremonies.show',
            compact('weddingCeremony')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingCeremony $weddingCeremony
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WeddingCeremony $weddingCeremony)
    {
        $this->authorize('update', $weddingCeremony);

        $orders = Order::pluck('no_order', 'id');

        return view(
            'Admin.app.wedding_ceremonies.edit',
            compact('weddingCeremony', 'orders')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingCeremonyUpdateRequest $request
     * @param \App\Models\WeddingCeremony $weddingCeremony
     * @return \Illuminate\Http\Response
     */
    public function update(
        WeddingCeremonyUpdateRequest $request,
        WeddingCeremony $weddingCeremony
    ) {
        $this->authorize('update', $weddingCeremony);

        $validated = $request->validated();

        $weddingCeremony->update($validated);

        return redirect()
            ->route('wedding-ceremonies.edit', $weddingCeremony)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingCeremony $weddingCeremony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WeddingCeremony $weddingCeremony)
    {
        $this->authorize('delete', $weddingCeremony);

        $weddingCeremony->delete();

        return redirect()
            ->route('wedding-ceremonies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
