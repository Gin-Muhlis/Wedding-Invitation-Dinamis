<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;

class ThemeOrdersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Theme $theme)
    {
        $this->authorize('view', $theme);

        $search = $request->get('search', '');

        $orders = $theme
            ->orders()
            ->search($search)
            ->latest()
            ->paginate();

        return new OrderCollection($orders);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Theme $theme)
    {
        $this->authorize('create', Order::class);

        $validated = $request->validate([
            'no_order' => ['required', 'max:255', 'string'],
            'order_date' => ['required', 'date'],
            'domain' => ['required', 'max:255', 'string'],
            'total_order' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'status' => ['required', 'in:aktif,kadaluwarsa'],
        ]);

        $order = $theme->orders()->create($validated);

        return new OrderResource($order);
    }
}
