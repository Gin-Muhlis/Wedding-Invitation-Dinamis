@php $editing = isset($fitur) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nama Fitur"
            :value="old('name', ($editing ? $fitur->name : ''))"
            maxlength="255"
            placeholder="Nama Fitur"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="icon"
            label="Icon"
            :value="old('icon', ($editing ? $fitur->icon : ''))"
            maxlength="255"
            placeholder="Icon"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
