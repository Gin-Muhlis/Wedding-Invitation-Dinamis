<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\TestimonyStoreRequest;
use App\Http\Requests\Admin\TestimonyUpdateRequest;

class TestimonyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Testimony::class);

        $search = $request->get('search', '');

        $testimonies = Testimony::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.testimonies.index',
            compact('testimonies', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Testimony::class);

        return view('Admin.app.testimonies.create');
    }

    /**
     * @param \App\Http\Requests\Admin\TestimonyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonyStoreRequest $request)
    {
        $this->authorize('create', Testimony::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $testimony = Testimony::create($validated);

        return redirect()
            ->route('testimonies.edit', $testimony)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Testimony $testimony)
    {
        $this->authorize('view', $testimony);

        return view('Admin.app.testimonies.show', compact('testimony'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Testimony $testimony)
    {
        $this->authorize('update', $testimony);

        return view('Admin.app.testimonies.edit', compact('testimony'));
    }

    /**
     * @param \App\Http\Requests\Admin\TestimonyUpdateRequest $request
     * @param \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(
        TestimonyUpdateRequest $request,
        Testimony $testimony
    ) {
        $this->authorize('update', $testimony);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($testimony->image) {
                Storage::delete($testimony->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $testimony->update($validated);

        return redirect()
            ->route('testimonies.edit', $testimony)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Testimony $testimony)
    {
        $this->authorize('delete', $testimony);

        if ($testimony->image) {
            Storage::delete($testimony->image);
        }

        $testimony->delete();

        return redirect()
            ->route('testimonies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
