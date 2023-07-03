<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rsvp;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RsvpStoreRequest;
use App\Http\Requests\Admin\RsvpUpdateRequest;

class RsvpController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Rsvp::class);

        $search = $request->get('search', '');

        $rsvps = Rsvp::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.rsvps.index', compact('rsvps', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Rsvp::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.rsvps.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\RsvpStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RsvpStoreRequest $request)
    {
        $this->authorize('create', Rsvp::class);

        $validated = $request->validated();

        $rsvp = Rsvp::create($validated);

        return redirect()
            ->route('rsvps.edit', $rsvp)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rsvp $rsvp)
    {
        $this->authorize('view', $rsvp);

        return view('Admin.app.rsvps.show', compact('rsvp'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Rsvp $rsvp)
    {
        $this->authorize('update', $rsvp);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.rsvps.edit', compact('rsvp', 'orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\RsvpUpdateRequest $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function update(RsvpUpdateRequest $request, Rsvp $rsvp)
    {
        $this->authorize('update', $rsvp);

        $validated = $request->validated();

        $rsvp->update($validated);

        return redirect()
            ->route('rsvps.edit', $rsvp)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rsvp $rsvp)
    {
        $this->authorize('delete', $rsvp);

        $rsvp->delete();

        return redirect()
            ->route('rsvps.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
