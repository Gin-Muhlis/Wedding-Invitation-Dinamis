@php $editing = isset($role) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $role->name : ''))"
        ></x-inputs.text>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.permissions.name')</h4>

        @foreach ($permissions as $permission)
        <div>
            <x-inputs.checkbox
                id="permission{{ $permission->id }}"
                name="permissions[]"
                label="{{ ucfirst($permission->name) }}"
                value="{{ $permission->id }}"
                :checked="isset($role) ? $role->hasPermissionTo($permission) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
