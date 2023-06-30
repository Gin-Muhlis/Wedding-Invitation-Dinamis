<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThemeResource;
use App\Http\Resources\ThemeCollection;
use App\Http\Requests\Admin\ThemeStoreRequest;
use App\Http\Requests\Admin\ThemeUpdateRequest;

class ThemeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Theme::class);

        $search = $request->get('search', '');

        $themes = Theme::search($search)
            ->latest()
            ->paginate();

        return new ThemeCollection($themes);
    }

    /**
     * @param \App\Http\Requests\Admin\ThemeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemeStoreRequest $request)
    {
        $this->authorize('create', Theme::class);

        $validated = $request->validated();

        $theme = Theme::create($validated);

        return new ThemeResource($theme);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Theme $theme)
    {
        $this->authorize('view', $theme);

        return new ThemeResource($theme);
    }

    /**
     * @param \App\Http\Requests\Admin\ThemeUpdateRequest $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function update(ThemeUpdateRequest $request, Theme $theme)
    {
        $this->authorize('update', $theme);

        $validated = $request->validated();

        $theme->update($validated);

        return new ThemeResource($theme);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Theme $theme)
    {
        $this->authorize('delete', $theme);

        $theme->delete();

        return response()->noContent();
    }
}
