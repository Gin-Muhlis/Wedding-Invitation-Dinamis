<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\AlbumStoreRequest;
use App\Http\Requests\Admin\AlbumUpdateRequest;

class AlbumController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Album::class);

        $search = $request->get('search', '');

        $albums = Album::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.albums.index', compact('albums', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Album::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.albums.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\AlbumStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumStoreRequest $request)
    {
        $this->authorize('create', Album::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $album = Album::create($validated);

        return redirect()
            ->route('albums.edit', $album)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Album $album)
    {
        $this->authorize('view', $album);

        return view('Admin.app.albums.show', compact('album'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Album $album)
    {
        $this->authorize('update', $album);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.albums.edit', compact('album', 'orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\AlbumUpdateRequest $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumUpdateRequest $request, Album $album)
    {
        $this->authorize('update', $album);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($album->image) {
                Storage::delete($album->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $album->update($validated);

        return redirect()
            ->route('albums.edit', $album)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Album $album)
    {
        $this->authorize('delete', $album);

        if ($album->image) {
            Storage::delete($album->image);
        }

        $album->delete();

        return redirect()
            ->route('albums.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
