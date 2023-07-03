<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FiturCategory;
use App\Http\Requests\Admin\FiturCategoryStoreRequest;
use App\Http\Requests\Admin\FiturCategoryUpdateRequest;

class FiturCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', FiturCategory::class);

        $search = $request->get('search', '');

        $fiturCategories = FiturCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.fitur_categories.index',
            compact('fiturCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', FiturCategory::class);

        return view('Admin.app.fitur_categories.create');
    }

    /**
     * @param \App\Http\Requests\Admin\FiturCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FiturCategoryStoreRequest $request)
    {
        $this->authorize('create', FiturCategory::class);

        $validated = $request->validated();

        $fiturCategory = FiturCategory::create($validated);

        return redirect()
            ->route('fitur-categories.create', $fiturCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FiturCategory $fiturCategory)
    {
        $this->authorize('view', $fiturCategory);

        return view(
            'Admin.app.fitur_categories.show',
            compact('fiturCategory')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FiturCategory $fiturCategory)
    {
        $this->authorize('update', $fiturCategory);

        return view(
            'Admin.app.fitur_categories.edit',
            compact('fiturCategory')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\FiturCategoryUpdateRequest $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        FiturCategoryUpdateRequest $request,
        FiturCategory $fiturCategory
    ) {
        $this->authorize('update', $fiturCategory);

        $validated = $request->validated();

        $fiturCategory->update($validated);

        return redirect()
            ->route('fitur-categories.edit', $fiturCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FiturCategory $fiturCategory)
    {
        $this->authorize('delete', $fiturCategory);

        $fiturCategory->delete();

        return redirect()
            ->route('fitur-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
