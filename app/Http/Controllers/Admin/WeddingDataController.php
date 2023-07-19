<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\WeddingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\WeddingDataStoreRequest;
use App\Http\Requests\Admin\WeddingDataUpdateRequest;

class WeddingDataController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', WeddingData::class);

        $search = $request->get('search', '');

        $allWeddingData = WeddingData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.all_wedding_data.index',
            compact('allWeddingData', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', WeddingData::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.all_wedding_data.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingDataStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeddingDataStoreRequest $request)
    {
        $this->authorize('create', WeddingData::class);

        $validated = $request->validated();
        if ($request->hasFile('male_image')) {
            $validated['male_image'] = $request
                ->file('male_image')
                ->store('public');
        }

        if ($request->hasFile('female_image')) {
            $validated['female_image'] = $request
                ->file('female_image')
                ->store('public');
        }

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request
                ->file('cover_image')
                ->store('public');
        }

        if ($request->hasFile('music')) {
            $validated['music'] = $request->file('music')->store('public');
        }

        $weddingData = WeddingData::create($validated);

        return redirect()
            ->route('all-wedding-data.edit', $weddingData)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingData $weddingData
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WeddingData $weddingData)
    {
        $this->authorize('view', $weddingData);

        return view('Admin.app.all_wedding_data.show', compact('weddingData'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingData $weddingData
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WeddingData $weddingData)
    {
        $this->authorize('update', $weddingData);

        $orders = Order::pluck('no_order', 'id');

        return view(
            'Admin.app.all_wedding_data.edit',
            compact('weddingData', 'orders')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\WeddingDataUpdateRequest $request
     * @param \App\Models\WeddingData $weddingData
     * @return \Illuminate\Http\Response
     */
    public function update(
        WeddingDataUpdateRequest $request,
        WeddingData $weddingData
    ) {
        $this->authorize('update', $weddingData);

        $validated = $request->validated();
        if ($request->hasFile('male_image')) {
            if ($weddingData->male_image) {
                Storage::delete($weddingData->male_image);
            }

            $validated['male_image'] = $request
                ->file('male_image')
                ->store('public');
        }

        if ($request->hasFile('female_image')) {
            if ($weddingData->female_image) {
                Storage::delete($weddingData->female_image);
            }

            $validated['female_image'] = $request
                ->file('female_image')
                ->store('public');
        }

        if ($request->hasFile('cover_image')) {
            if ($weddingData->cover_image) {
                Storage::delete($weddingData->cover_image);
            }

            $validated['cover_image'] = $request
                ->file('cover_image')
                ->store('public');
        }

        if ($request->hasFile('music')) {
            if ($weddingData->music) {
                Storage::delete($weddingData->music);
            }

            $validated['music'] = $request->file('music')->store('public');
        }

        $weddingData->update($validated);

        return redirect()
            ->route('all-wedding-data.edit', $weddingData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeddingData $weddingData
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WeddingData $weddingData)
    {
        $this->authorize('delete', $weddingData);

        if ($weddingData->male_image) {
            Storage::delete($weddingData->male_image);
        }

        if ($weddingData->female_image) {
            Storage::delete($weddingData->female_image);
        }

        if ($weddingData->cover_image) {
            Storage::delete($weddingData->cover_image);
        }

        if ($weddingData->music) {
            Storage::delete($weddingData->music);
        }

        $weddingData->delete();

        return redirect()
            ->route('all-wedding-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
