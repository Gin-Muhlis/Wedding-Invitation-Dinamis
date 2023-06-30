<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Fitur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FiturResource;
use App\Http\Resources\FiturCollection;
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
            ->paginate();

        return new FiturCollection($fiturs);
    }

    /**
     * @param \App\Http\Requests\Admin\FiturStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FiturStoreRequest $request)
    {
        $this->authorize('create', Fitur::class);

        $validated = $request->validated();
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('public');
        }

        $fitur = Fitur::create($validated);

        return new FiturResource($fitur);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Fitur $fitur)
    {
        $this->authorize('view', $fitur);

        return new FiturResource($fitur);
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

        if ($request->hasFile('icon')) {
            if ($fitur->icon) {
                Storage::delete($fitur->icon);
            }

            $validated['icon'] = $request->file('icon')->store('public');
        }

        $fitur->update($validated);

        return new FiturResource($fitur);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fitur $fitur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fitur $fitur)
    {
        $this->authorize('delete', $fitur);

        if ($fitur->icon) {
            Storage::delete($fitur->icon);
        }

        $fitur->delete();

        return response()->noContent();
    }
}
