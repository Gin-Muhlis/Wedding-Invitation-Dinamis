<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VisitorStoreRequest;
use App\Http\Requests\Admin\VisitorUpdateRequest;

class VisitorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Visitor::class);

        $search = $request->get('search', '');

        $visitors = Visitor::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.visitors.index', compact('visitors', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Visitor::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.visitors.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\VisitorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorStoreRequest $request)
    {
        $this->authorize('create', Visitor::class);

        $validated = $request->validated();

        $visitor = Visitor::create($validated);

        return redirect()
            ->route('visitors.edit', $visitor)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visitor $visitor)
    {
        $this->authorize('view', $visitor);

        return view('Admin.app.visitors.show', compact('visitor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Visitor $visitor)
    {
        $this->authorize('update', $visitor);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.visitors.edit', compact('visitor', 'orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\VisitorUpdateRequest $request
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorUpdateRequest $request, Visitor $visitor)
    {
        $this->authorize('update', $visitor);

        $validated = $request->validated();

        $visitor->update($validated);

        return redirect()
            ->route('visitors.edit', $visitor)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Visitor $visitor)
    {
        $this->authorize('delete', $visitor);

        $visitor->delete();

        return redirect()
            ->route('visitors.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
