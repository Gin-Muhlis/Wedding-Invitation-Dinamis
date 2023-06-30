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
                @can('create', App\Models\WeddingCeremony::class)
                <a
                    href="{{ route('wedding-ceremonies.create') }}"
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
                    @lang('crud.wedding_ceremonies.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.wedding_ceremonies.inputs.ceremony_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.wedding_ceremonies.inputs.ceremony_time')
                            </th>
                            <th class="text-left">
                                @lang('crud.wedding_ceremonies.inputs.ceremony_place')
                            </th>
                            <th class="text-left">
                                @lang('crud.wedding_ceremonies.inputs.ceremony_address')
                            </th>
                            <th class="text-left">
                                @lang('crud.wedding_ceremonies.inputs.order_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($weddingCeremonies as $weddingCeremony)
                        <tr>
                            <td>
                                {{ $weddingCeremony->ceremony_date ?? '-' }}
                            </td>
                            <td>
                                {{ $weddingCeremony->ceremony_time ?? '-' }}
                            </td>
                            <td>
                                {{ $weddingCeremony->ceremony_place ?? '-' }}
                            </td>
                            <td>
                                {{ $weddingCeremony->ceremony_address ?? '-' }}
                            </td>
                            <td>
                                {{ optional($weddingCeremony->order)->no_order
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $weddingCeremony)
                                    <a
                                        href="{{ route('wedding-ceremonies.edit', $weddingCeremony) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $weddingCeremony)
                                    <a
                                        href="{{ route('wedding-ceremonies.show', $weddingCeremony) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $weddingCeremony)
                                    <form
                                        action="{{ route('wedding-ceremonies.destroy', $weddingCeremony) }}"
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
                                {!! $weddingCeremonies->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
