@php $editing = isset($weddingReception) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date name="reception_date" label="Tanggal Resepsi"
            value="{{ old('reception_date', $editing ? optional($weddingReception->reception_date)->format('Y-m-d') : '') }}"
            max="255" required></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <label for="jam_resepsi">Jam Resepsi</label>
        <input type="time" step="1" name="reception_time" label="Jam Resepsi" id="jam_resepsi"
            value="{{ old('reception_time', $editing ? $weddingReception->reception_time : '') }}"
            placeholder="Jam Resepsi" class="form-control" required>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="reception_address" label="Alamat Resepsi" :value="old('reception_address', $editing ? $weddingReception->reception_address : '')" maxlength="255"
            placeholder="Alamat Resepsi" required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $weddingReception->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach ($orders as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
