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
                    @lang('crud.all_wedding_data.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_wedding_data.inputs.male_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_wedding_data.inputs.female_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_wedding_data.inputs.wedding_coordinate')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_wedding_data.inputs.greeting')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_wedding_data.inputs.order_id')
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
                                {{ $weddingData->wedding_coordinate ?? '-' }}
                            </td>
                            <td>{{ $weddingData->greeting ?? '-' }}</td>
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
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
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
