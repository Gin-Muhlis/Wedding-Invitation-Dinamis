@php $editing = isset($theme) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="theme_name" label="Nama Tema" :value="old('theme_name', $editing ? $theme->theme_name : '')" maxlength="255" placeholder="Nama Tema"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="theme_code" label="Kode Tema" :value="old('theme_code', $editing ? $theme->theme_code : '')" maxlength="255" placeholder="Kode Tema"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="catgory_id" label="Catgory" required>
            @php $selected = old('catgory_id', ($editing ? $theme->catgory_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Catgory</option>
            @foreach ($catgories as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Tipe">
            @php $selected = old('type', ($editing ? $theme->type : '')) @endphp
            <option value="pakai foto" {{ $selected == 'pakai foto' ? 'selected' : '' }}>Pakai foto</option>
            <option value="tanpa foto" {{ $selected == 'tanpa foto' ? 'selected' : '' }}>Tanpa foto</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
