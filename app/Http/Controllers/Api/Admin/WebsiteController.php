<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WebsiteResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\WebsiteCollection;
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
            ->paginate();

        return new WebsiteCollection($websites);
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

        return new WebsiteResource($website);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Website $website
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Website $website)
    {
        $this->authorize('view', $website);

        return new WebsiteResource($website);
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

        return new WebsiteResource($website);
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

        return response()->noContent();
    }
}
