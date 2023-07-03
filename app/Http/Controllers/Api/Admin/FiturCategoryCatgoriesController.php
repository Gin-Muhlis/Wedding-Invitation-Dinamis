<?php
namespace App\Http\Controllers\Api\Admin;

use App\Models\Catgory;
use Illuminate\Http\Request;
use App\Models\FiturCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatgoryCollection;

class FiturCategoryCatgoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FiturCategory $fiturCategory)
    {
        $this->authorize('view', $fiturCategory);

        $search = $request->get('search', '');

        $catgories = $fiturCategory
            ->catgories()
            ->search($search)
            ->latest()
            ->paginate();

        return new CatgoryCollection($catgories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        FiturCategory $fiturCategory,
        Catgory $catgory
    ) {
        $this->authorize('update', $fiturCategory);

        $fiturCategory->catgories()->syncWithoutDetaching([$catgory->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FiturCategory $fiturCategory
     * @param \App\Models\Catgory $catgory
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        FiturCategory $fiturCategory,
        Catgory $catgory
    ) {
        $this->authorize('update', $fiturCategory);

        $fiturCategory->catgories()->detach($catgory);

        return response()->noContent();
    }
}
