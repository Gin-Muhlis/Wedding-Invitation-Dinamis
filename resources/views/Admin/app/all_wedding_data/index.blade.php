@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\WeddingData::class)
                <a
                    href="{{ route('all-wedding-data.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.data_pernikahan.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.wedding_coordinate')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.giff_address')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.male_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.female_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.cover_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.music')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_pernikahan.inputs.order_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allWeddingData as $weddingData)
                        <tr>
                            <td>
                                {{ $weddingData->wedding_coordinate ?? '-' }}
                            </td>
                            <td>{{ $weddingData->giff_address ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $weddingData->male_image ? \Storage::url($weddingData->male_image) : '' }}"
                                />
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $weddingData->female_image ? \Storage::url($weddingData->female_image) : '' }}"
                                />
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $weddingData->cover_image ? \Storage::url($weddingData->cover_image) : '' }}"
                                />
                            </td>
                            <td>
                                @if($weddingData->music)
                                <a
                                    href="{{ \Storage::url($weddingData->music) }}"
                                    target="blank"
                                    ><i class="icon ion-md-download"></i
                                    >&nbsp;Download</a
                                >
                                @else - @endif
                            </td>
                            <td>
                                {{ optional($weddingData->order)->no_order ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $weddingData)
                                    <a
                                        href="{{ route('all-wedding-data.edit', $weddingData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $weddingData)
                                    <a
                                        href="{{ route('all-wedding-data.show', $weddingData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $weddingData)
                                    <form
                                        action="{{ route('all-wedding-data.destroy', $weddingData) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {!! $allWeddingData->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
