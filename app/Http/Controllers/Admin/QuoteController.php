<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quote;
use App\Models\WeddingData;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\QuoteStoreRequest;
use App\Http\Requests\Admin\QuoteUpdateRequest;

class QuoteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Quote::class);

        $search = $request->get('search', '');

        $quotes = Quote::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.quotes.index', compact('quotes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Quote::class);

        $allWeddingData = WeddingData::pluck('male_image', 'id');

        return view('Admin.app.quotes.create', compact('allWeddingData'));
    }

    /**
     * @param \App\Http\Requests\Admin\QuoteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuoteStoreRequest $request)
    {
        $this->authorize('create', Quote::class);

        $validated = $request->validated();

        $quote = Quote::create($validated);

        return redirect()
            ->route('quotes.edit', $quote)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Quote $quote)
    {
        $this->authorize('view', $quote);

        return view('Admin.app.quotes.show', compact('quote'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Quote $quote)
    {
        $this->authorize('update', $quote);

        $allWeddingData = WeddingData::pluck('male_image', 'id');

        return view(
            'Admin.app.quotes.edit',
            compact('quote', 'allWeddingData')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\QuoteUpdateRequest $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function update(QuoteUpdateRequest $request, Quote $quote)
    {
        $this->authorize('update', $quote);

        $validated = $request->validated();

        $quote->update($validated);

        return redirect()
            ->route('quotes.edit', $quote)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->delete();

        return redirect()
            ->route('quotes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
