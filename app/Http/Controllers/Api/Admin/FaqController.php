<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Resources\FaqResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqCollection;
use App\Http\Requests\Admin\FaqStoreRequest;
use App\Http\Requests\Admin\FaqUpdateRequest;

class FaqController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Faq::class);

        $search = $request->get('search', '');

        $faqs = Faq::search($search)
            ->latest()
            ->paginate();

        return new FaqCollection($faqs);
    }

    /**
     * @param \App\Http\Requests\Admin\FaqStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        $this->authorize('create', Faq::class);

        $validated = $request->validated();

        $faq = Faq::create($validated);

        return new FaqResource($faq);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Faq $faq)
    {
        $this->authorize('view', $faq);

        return new FaqResource($faq);
    }

    /**
     * @param \App\Http\Requests\Admin\FaqUpdateRequest $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $this->authorize('update', $faq);

        $validated = $request->validated();

        $faq->update($validated);

        return new FaqResource($faq);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $this->authorize('delete', $faq);

        $faq->delete();

        return response()->noContent();
    }
}
