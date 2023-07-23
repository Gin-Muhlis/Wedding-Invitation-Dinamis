<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rsvp;
use App\Models\ReplyRsvp;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ReplyRsvpStoreRequest;
use App\Http\Requests\Admin\ReplyRsvpUpdateRequest;

class ReplyRsvpController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ReplyRsvp::class);

        $search = $request->get('search', '');

        $replyRsvps = ReplyRsvp::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'Admin.app.reply_rsvps.index',
            compact('replyRsvps', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ReplyRsvp::class);

        $rsvps = Rsvp::pluck('name', 'id');

        return view('Admin.app.reply_rsvps.create', compact('rsvps'));
    }

    /**
     * @param \App\Http\Requests\Admin\ReplyRsvpStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRsvpStoreRequest $request)
    {
        $this->authorize('create', ReplyRsvp::class);

        $validated = $request->validated();

        $replyRsvp = ReplyRsvp::create($validated);

        return redirect()
            ->route('reply-rsvps.edit', $replyRsvp)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReplyRsvp $replyRsvp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ReplyRsvp $replyRsvp)
    {
        $this->authorize('view', $replyRsvp);

        return view('Admin.app.reply_rsvps.show', compact('replyRsvp'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReplyRsvp $replyRsvp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ReplyRsvp $replyRsvp)
    {
        $this->authorize('update', $replyRsvp);

        $rsvps = Rsvp::pluck('name', 'id');

        return view(
            'Admin.app.reply_rsvps.edit',
            compact('replyRsvp', 'rsvps')
        );
    }

    /**
     * @param \App\Http\Requests\Admin\ReplyRsvpUpdateRequest $request
     * @param \App\Models\ReplyRsvp $replyRsvp
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReplyRsvpUpdateRequest $request,
        ReplyRsvp $replyRsvp
    ) {
        $this->authorize('update', $replyRsvp);

        $validated = $request->validated();

        $replyRsvp->update($validated);

        return redirect()
            ->route('reply-rsvps.edit', $replyRsvp)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReplyRsvp $replyRsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ReplyRsvp $replyRsvp)
    {
        $this->authorize('delete', $replyRsvp);

        $replyRsvp->delete();

        return redirect()
            ->route('reply-rsvps.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
