<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\InvitedGuest;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\InvitedGuestStoreRequest;
use App\Http\Requests\Admin\InvitedGuestUpdateRequest;

class InvitedGuestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InvitedGuest::class);

        $search = $request->get('search', '');

        $invitedGuests = InvitedGuest::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.invited_guests.index',
            compact('invitedGuests', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', InvitedGuest::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.invited_guests.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\InvitedGuestStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitedGuestStoreRequest $request)
    {
        $this->authorize('create', InvitedGuest::class);

        $validated = $request->validated();

        $invitedGuest = InvitedGuest::create($validated);

        return redirect()
            ->route('invited-guests.edit', $invitedGuest)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InvitedGuest $invitedGuest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InvitedGuest $invitedGuest)
    {
        $this->authorize('view', $invitedGuest);

        return view('Admin.app.invited_guests.show', compact('invitedGuest'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InvitedGuest $invitedGuest
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InvitedGuest $invitedGuest)
    {
        $this->authorize('update', $invitedGuest);

        $orders = Order::pluck('no_order', 'id');

        return view(
            'Admin.app.invited_guests.edit',
            compact('invitedGuest', 'orders')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\InvitedGuestUpdateRequest $request
     * @param \App\Models\InvitedGuest $invitedGuest
     * @return \Illuminate\Http\Response
     */
    public function update(
        InvitedGuestUpdateRequest $request,
        InvitedGuest $invitedGuest
    ) {
        $this->authorize('update', $invitedGuest);

        $validated = $request->validated();

        $invitedGuest->update($validated);

        return redirect()
            ->route('invited-guests.edit', $invitedGuest)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InvitedGuest $invitedGuest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InvitedGuest $invitedGuest)
    {
        $this->authorize('delete', $invitedGuest);

        $invitedGuest->delete();

        return redirect()
            ->route('invited-guests.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
