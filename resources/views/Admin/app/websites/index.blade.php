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
                @can('create', App\Models\Website::class)
                <a
                    href="{{ route('websites.create') }}"
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
                <h4 class="card-title">@lang('crud.websites.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.websites.inputs.website_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.whatsapp_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.link_instagram')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.link_fb')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.websites.inputs.website_logo')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($websites as $website)
                        <tr>
                            <td>{{ $website->website_name ?? '-' }}</td>
                            <td>{{ $website->email ?? '-' }}</td>
                            <td>{{ $website->whatsapp_number ?? '-' }}</td>
                            <td>{{ $website->link_instagram ?? '-' }}</td>
                            <td>{{ $website->link_fb ?? '-' }}</td>
                            <td>{{ $website->description ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $website->website_logo ? \Storage::url($website->website_logo) : '' }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $website)
                                    <a
                                        href="{{ route('websites.edit', $website) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $website)
                                    <a
                                        href="{{ route('websites.show', $website) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $website)
                                    <form
                                        action="{{ route('websites.destroy', $website) }}"
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
                            <td colspan="8">{!! $websites->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
