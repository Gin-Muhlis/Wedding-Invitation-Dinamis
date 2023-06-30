<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\WebsiteStoreRequest;
use App\Http\Requests\Admin\WebsiteUpdateRequest;

class WebsiteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Website::class);

        $search = $request->get('search', '');

        $websites = Website::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.websites.index', compact('websites', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Website::class);

        return view('Admin.app.websites.create');
    }

    /**
     * @param \App\Http\Requests\Admin\WebsiteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteStoreRequest $request)
    {
        $this->authorize('create', Website::class);

        $validated = $request->validated();
        if ($request->hasFile('website_logo')) {
            $validated['website_logo'] = $request
                ->file('website_logo')
                ->store('public');
        }

        $website = Website::create($validated);

        return redirect()
            ->route('websites.edit', $website)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Website $website)
    {
        $this->authorize('view', $website);

        return view('Admin.app.websites.show', compact('website'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Website $website)
    {
        $this->authorize('update', $website);

        return view('Admin.app.websites.edit', compact('website'));
    }

    /**
     * @param \App\Http\Requests\Admin\WebsiteUpdateRequest $request
     * @param \App\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteUpdateRequest $request, Website $website)
    {
        $this->authorize('update', $website);

        $validated = $request->validated();
        if ($request->hasFile('website_logo')) {
            if ($website->website_logo) {
                Storage::delete($website->website_logo);
            }

            $validated['website_logo'] = $request
                ->file('website_logo')
                ->store('public');
        }

        $website->update($validated);

        return redirect()
            ->route('websites.edit', $website)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Website $website)
    {
        $this->authorize('delete', $website);

        if ($website->website_logo) {
            Storage::delete($website->website_logo);
        }

        $website->delete();

        return redirect()
            ->route('websites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
