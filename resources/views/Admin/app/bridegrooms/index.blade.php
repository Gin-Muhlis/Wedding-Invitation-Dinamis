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
                @can('create', App\Models\Bridegroom::class)
                <a
                    href="{{ route('bridegrooms.create') }}"
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
                <h4 class="card-title">@lang('crud.mempelai.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.male_fullname')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.male_nickname')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.male_mother_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.male_father_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.female_fullname')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.female_nickname')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.female_mother_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.female_father_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.mempelai.inputs.order_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bridegrooms as $bridegroom)
                        <tr>
                            <td>{{ $bridegroom->male_fullname ?? '-' }}</td>
                            <td>{{ $bridegroom->male_nickname ?? '-' }}</td>
                            <td>{{ $bridegroom->male_mother_name ?? '-' }}</td>
                            <td>{{ $bridegroom->male_father_name ?? '-' }}</td>
                            <td>{{ $bridegroom->female_fullname ?? '-' }}</td>
                            <td>{{ $bridegroom->female_nickname ?? '-' }}</td>
                            <td>
                                {{ $bridegroom->female_mother_name ?? '-' }}
                            </td>
                            <td>
                                {{ $bridegroom->female_father_name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($bridegroom->order)->no_order ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $bridegroom)
                                    <a
                                        href="{{ route('bridegrooms.edit', $bridegroom) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $bridegroom)
                                    <a
                                        href="{{ route('bridegrooms.show', $bridegroom) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $bridegroom)
                                    <form
                                        action="{{ route('bridegrooms.destroy', $bridegroom) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $bridegrooms->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
