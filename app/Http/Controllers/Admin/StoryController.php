<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoryStoreRequest;
use App\Http\Requests\Admin\StoryUpdateRequest;

class StoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Story::class);

        $search = $request->get('search', '');

        $stories = Story::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.stories.index', compact('stories', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Story::class);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.stories.create', compact('orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryStoreRequest $request)
    {
        $this->authorize('create', Story::class);

        $validated = $request->validated();
        if ($request->hasFile('story_image')) {
            $validated['story_image'] = $request
                ->file('story_image')
                ->store('public/8dac6342-5021-4f90-880d-348248790a79');
        }

        $story = Story::create($validated);

        return redirect()
            ->route('stories.edit', $story)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Story $story
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Story $story)
    {
        $this->authorize('view', $story);

        return view('Admin.app.stories.show', compact('story'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Story $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Story $story)
    {
        $this->authorize('update', $story);

        $orders = Order::pluck('no_order', 'id');

        return view('Admin.app.stories.edit', compact('story', 'orders'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoryUpdateRequest $request
     * @param \App\Models\Story $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryUpdateRequest $request, Story $story)
    {
        $this->authorize('update', $story);

        $validated = $request->validated();
        if ($request->hasFile('story_image')) {
            if ($story->story_image) {
                Storage::delete($story->story_image);
            }

            $validated['story_image'] = $request
                ->file('story_image')
                ->store('public/8dac6342-5021-4f90-880d-348248790a79');
        }

        $story->update($validated);

        return redirect()
            ->route('stories.edit', $story)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Story $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Story $story)
    {
        $this->authorize('delete', $story);

        if ($story->story_image) {
            Storage::delete($story->story_image);
        }

        $story->delete();

        return redirect()
            ->route('stories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
