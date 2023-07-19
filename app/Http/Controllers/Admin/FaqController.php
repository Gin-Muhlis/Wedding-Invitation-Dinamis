<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.faqs.index', compact('faqs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Faq::class);

        return view('Admin.app.faqs.create');
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

        return redirect()
            ->route('faqs.create', $faq)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Faq $faq)
    {
        $this->authorize('view', $faq);

        return view('Admin.app.faqs.show', compact('faq'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Faq $faq)
    {
        $this->authorize('update', $faq);

        return view('Admin.app.faqs.edit', compact('faq'));
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

        return redirect()
            ->route('faqs.edit', $faq)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('faqs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
