<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\FiturStoreRequest;
use App\Http\Requests\Admin\FiturUpdateRequest;

class FiturController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Fitur::class);

        $search = $request->get('search', '');

        $fiturs = Fitur::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('Admin.app.fiturs.index', compact('fiturs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Fitur::class);

        return view('Admin.app.fiturs.create');
    }

    /**
     * @param \App\Http\Requests\Admin\FiturStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FiturStoreRequest $request)
    {
        $this->authorize('create', Fitur::class);

        $validated = $request->validated();
        $fitur = Fitur::create($validated);

        return redirect()
            ->route('fiturs.edit', $fitur)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Fitur $fitur)
    {
        $this->authorize('view', $fitur);

        return view('Admin.app.fiturs.show', compact('fitur'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Fitur $fitur)
    {
        $this->authorize('update', $fitur);

        return view('Admin.app.fiturs.edit', compact('fitur'));
    }

    /**
     * @param \App\Http\Requests\Admin\FiturUpdateRequest $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function update(FiturUpdateRequest $request, Fitur $fitur)
    {
        $this->authorize('update', $fitur);

        $validated = $request->validated();
        $fitur->update($validated);

        return redirect()
            ->route('fiturs.edit', $fitur)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fitur $fitur)
    {
        $this->authorize('delete', $fitur);

        $fitur->delete();

        return redirect()
            ->route('fiturs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
