<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Gift;
use Illuminate\Http\Request;
use App\Http\Resources\GiftResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\GiftCollection;
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
            ->paginate();

        return new GiftCollection($gifts);
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

        return new GiftResource($gift);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Gift $gift)
    {
        $this->authorize('view', $gift);

        return new GiftResource($gift);
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

        return new GiftResource($gift);
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

        return response()->noContent();
    }
}
