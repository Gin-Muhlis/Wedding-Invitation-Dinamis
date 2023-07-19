<?php

namespace App\Http\Controllers\Admin;

use App\Models\Theme;
use App\Models\Category;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.themes.index', compact('themes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Theme::class);

        $categories = Category::pluck('category', 'id');

        return view('Admin.app.themes.create', compact('categories'));
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

        return redirect()
            ->route('themes.edit', $theme)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Theme $theme)
    {
        $this->authorize('view', $theme);

        return view('Admin.app.themes.show', compact('theme'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Theme $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Theme $theme)
    {
        $this->authorize('update', $theme);

        $categories = Category::pluck('category', 'id');

        return view('Admin.app.themes.edit', compact('theme', 'categories'));
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

        return redirect()
            ->route('themes.edit', $theme)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('themes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
