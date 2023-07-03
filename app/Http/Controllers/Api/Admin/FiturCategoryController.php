<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\FiturCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\FiturCategoryResource;
use App\Http\Resources\FiturCategoryCollection;
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
            ->paginate();

        return new FiturCategoryCollection($fiturCategories);
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

        return new FiturCategoryResource($fiturCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FiturCategory $fiturCategory)
    {
        $this->authorize('view', $fiturCategory);

        return new FiturCategoryResource($fiturCategory);
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

        return new FiturCategoryResource($fiturCategory);
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

        return response()->noContent();
    }
}
