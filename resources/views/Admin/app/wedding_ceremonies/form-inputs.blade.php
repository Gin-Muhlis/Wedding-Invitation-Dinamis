@php $editing = isset($weddingCeremony) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date name="ceremony_date" label="Tanggal Akad Nikah"
            value="{{ old('ceremony_date', $editing ? optional($weddingCeremony->ceremony_date)->format('Y-m-d') : '') }}"
            max="255" required></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <label for="jam_akad">Jam Akad Nikah</label>
        <input type="time" step="1" class="form-control" id="jam_akad" name="ceremony_time"
            label="Jam Akad Nikah" value="{{ old('ceremony_time', $editing ? $weddingCeremony->ceremony_time : '') }}"
            maxlength="255" placeholder="Jam Resepsi" required>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="ceremony_address" label="Alamat Akad Nikah" :value="old('ceremony_address', $editing ? $weddingCeremony->ceremony_address : '')" maxlength="255"
            placeholder="Alamat Akad Nikah" required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $weddingCeremony->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach ($orders as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
