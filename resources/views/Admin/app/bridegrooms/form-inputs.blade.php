@php $editing = isset($bridegroom) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="male_fullname"
            label="Nama Lengkap Pria"
            :value="old('male_fullname', ($editing ? $bridegroom->male_fullname : ''))"
            maxlength="255"
            placeholder="Nama Lengkap Pria"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="male_nickname"
            label="Nama Panggilan Pria"
            :value="old('male_nickname', ($editing ? $bridegroom->male_nickname : ''))"
            maxlength="255"
            placeholder="Nama Panggilan Pria"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="male_mother_name"
            label="Nama Ibu pria"
            :value="old('male_mother_name', ($editing ? $bridegroom->male_mother_name : ''))"
            maxlength="255"
            placeholder="Nama Ibu pria"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="male_father_name"
            label="Nama Ayah Pria"
            :value="old('male_father_name', ($editing ? $bridegroom->male_father_name : ''))"
            maxlength="255"
            placeholder="Nama Ayah Pria"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="female_fullname"
            label="Nama Lengkap Wanita"
            :value="old('female_fullname', ($editing ? $bridegroom->female_fullname : ''))"
            maxlength="255"
            placeholder="Nama Lengkap Wanita"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="female_nickname"
            label="Nama Panggilan Wanita"
            :value="old('female_nickname', ($editing ? $bridegroom->female_nickname : ''))"
            maxlength="255"
            placeholder="Nama Panggilan Wanita"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="female_mother_name"
            label="Nama Ibu Wanita"
            :value="old('female_mother_name', ($editing ? $bridegroom->female_mother_name : ''))"
            maxlength="255"
            placeholder="Nama Ibu Wanita"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="female_father_name"
            label="Nama Ayah Wanita"
            :value="old('female_father_name', ($editing ? $bridegroom->female_father_name : ''))"
            maxlength="255"
            placeholder="Nama Ayah Wanita"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $bridegroom->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
