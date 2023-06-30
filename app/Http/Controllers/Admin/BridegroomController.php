<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Bridegroom;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BridegroomStoreRequest;
use App\Http\Requests\Admin\BridegroomUpdateRequest;

class BridegroomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Bridegroom::class);

        $search = $request->get('search', '');

        $bridegrooms = Bridegroom::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.bridegrooms.index',
            compact('bridegrooms', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Bridegroom::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.bridegrooms.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\BridegroomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BridegroomStoreRequest $request)
    {
        $this->authorize('create', Bridegroom::class);

        $validated = $request->validated();

        $bridegroom = Bridegroom::create($validated);

        return redirect()
            ->route('bridegrooms.edit', $bridegroom)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bridegroom $bridegroom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bridegroom $bridegroom)
    {
        $this->authorize('view', $bridegroom);

        return view('Admin.app.bridegrooms.show', compact('bridegroom'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bridegroom $bridegroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Bridegroom $bridegroom)
    {
        $this->authorize('update', $bridegroom);

        $orders = Order::pluck('no_order', 'id');

        return view(
            'Admin.app.bridegrooms.edit',
            compact('bridegroom', 'orders')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\BridegroomUpdateRequest $request
     * @param \App\Models\Bridegroom $bridegroom
     * @return \Illuminate\Http\Response
     */
    public function update(
        BridegroomUpdateRequest $request,
        Bridegroom $bridegroom
    ) {
        $this->authorize('update', $bridegroom);

        $validated = $request->validated();

        $bridegroom->update($validated);

        return redirect()
            ->route('bridegrooms.edit', $bridegroom)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bridegroom $bridegroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bridegroom $bridegroom)
    {
        $this->authorize('delete', $bridegroom);

        $bridegroom->delete();

        return redirect()
            ->route('bridegrooms.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
