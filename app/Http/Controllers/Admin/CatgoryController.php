<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catgory;
use Illuminate\Http\Request;
use App\Models\FiturCategory;
use App\Http\Requests\Admin\CatgoryStoreRequest;
use App\Http\Requests\Admin\CatgoryUpdateRequest;

class CatgoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Catgory::class);

        $search = $request->get('search', '');

        $catgories = Catgory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.catgories.index',
            compact('catgories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Catgory::class);

        return view('Admin.app.catgories.create');
    }

    /**
     * @param \App\Http\Requests\Admin\CatgoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatgoryStoreRequest $request)
    {
        $this->authorize('create', Catgory::class);

        $validated = $request->validated();

        $catgory = Catgory::create($validated);

        return redirect()
            ->route('catgories.edit', $catgory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Catgory $catgory)
    {
        $this->authorize('view', $catgory);

        return view('Admin.app.catgories.show', compact('catgory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Catgory $catgory)
    {
        $this->authorize('update', $catgory);

        $fiturCategories = FiturCategory::get();

        return view(
            'Admin.app.catgories.edit',
            compact('catgory', 'fiturCategories')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\CatgoryUpdateRequest $request
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function update(CatgoryUpdateRequest $request, Catgory $catgory)
    {
        $this->authorize('update', $catgory);

        $validated = $request->validated();
        $catgory->fiturCategories()->sync($request->fiturCategories);

        $catgory->update($validated);

        return redirect()
            ->route('catgories.edit', $catgory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Catgory $catgory)
    {
        $this->authorize('delete', $catgory);

        $catgory->delete();

        return redirect()
            ->route('catgories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
