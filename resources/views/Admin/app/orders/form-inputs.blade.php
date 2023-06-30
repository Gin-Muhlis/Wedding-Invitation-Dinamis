@php $editing = isset($order) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_order"
            label="No Order"
            :value="old('no_order', ($editing ? $order->no_order : ''))"
            maxlength="255"
            placeholder="No Order"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="order_date"
            label="Tanggal Order"
            value="{{ old('order_date', ($editing ? optional($order->order_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="domain"
            label="Domain"
            :value="old('domain', ($editing ? $order->domain : ''))"
            maxlength="255"
            placeholder="Domain"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="total_order"
            label="Total Order"
            :value="old('total_order', ($editing ? $order->total_order : ''))"
            max="255"
            placeholder="Total Order"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $order->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="theme_id" label="Theme" required>
            @php $selected = old('theme_id', ($editing ? $order->theme_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Theme</option>
            @foreach($themes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $order->status : '')) @endphp
            <option value="aktif" {{ $selected == 'aktif' ? 'selected' : '' }} >Aktif</option>
            <option value="kadaluwarsa" {{ $selected == 'kadaluwarsa' ? 'selected' : '' }} >Kadaluwarsa</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
