<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Rsvp;
use Illuminate\Http\Request;
use App\Http\Resources\RsvpResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RsvpCollection;
use App\Http\Requests\Admin\RsvpStoreRequest;
use App\Http\Requests\Admin\RsvpUpdateRequest;

class RsvpController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Rsvp::class);

        $search = $request->get('search', '');

        $rsvps = Rsvp::search($search)
            ->latest()
            ->paginate();

        return new RsvpCollection($rsvps);
    }

    /**
     * @param \App\Http\Requests\Admin\RsvpStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RsvpStoreRequest $request)
    {
        $this->authorize('create', Rsvp::class);

        $validated = $request->validated();

        $rsvp = Rsvp::create($validated);

        return new RsvpResource($rsvp);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rsvp $rsvp)
    {
        $this->authorize('view', $rsvp);

        return new RsvpResource($rsvp);
    }

    /**
     * @param \App\Http\Requests\Admin\RsvpUpdateRequest $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function update(RsvpUpdateRequest $request, Rsvp $rsvp)
    {
        $this->authorize('update', $rsvp);

        $validated = $request->validated();

        $rsvp->update($validated);

        return new RsvpResource($rsvp);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rsvp $rsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rsvp $rsvp)
    {
        $this->authorize('delete', $rsvp);

        $rsvp->delete();

        return response()->noContent();
    }
}
