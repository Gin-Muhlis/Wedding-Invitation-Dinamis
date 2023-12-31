@php $editing = isset($gift) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="owner_name"
            label="Nama Owner"
            :value="old('owner_name', ($editing ? $gift->owner_name : ''))"
            maxlength="255"
            placeholder="Nama Owner"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_data"
            label="No Data"
            :value="old('no_data', ($editing ? $gift->no_data : ''))"
            maxlength="255"
            placeholder="No Data"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="gift_payment_id"
            label="Jenis Pembayaran"
            required
        >
            @php $selected = old('gift_payment_id', ($editing ? $gift->gift_payment_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Silahkan Pilih Jenis Pembayaran</option>
            @foreach($giftPayments as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $gift->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
