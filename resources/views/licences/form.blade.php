<div class="card-body">

    <div class="form-group">
        <label for="serial_key">Serial key</label>
        <input type="text" class="form-control @error('serial_key') is-invalid @enderror" id="serial_key" name="serial_key"
               placeholder="Enter Serial key" value="{{$serial_key ?? ($licence->serial_key ?? old('serial_key'))}}" {{request()->is('licences/*/edit') ? 'disabled' : ''}}>
        @error('serial_key')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="hard_drive_number">Hard drive</label>
        <input type="text" class="form-control @error('hard_drive_number') is-invalid @enderror" id="hard_drive_number" name="hard_drive_number"
               placeholder="Enter Hard drive" value="{{$licence->hard_drive_number ?? old('hard_drive_number')}}" >
        @error('hard_drive_number')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Days</label>
        <input type="number" class="form-control @error('days') is-invalid @enderror" id="days" name="days"
               placeholder="Enter days" value="{{$licence->days ?? old('days')}}">
        @error('days')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="product">Product</label>
        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror">
            @foreach($products as $product)
                <option value="{{$product->id}}" {{($licence->product_id ?? old('product')) == $product->id ? 'selected' : ''}}>{{$product->name}}</option>
            @endforeach
        </select>
        @error('product')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_demo" name="is_demo">
        <label class="form-check-label" for="is_demo">Demo</label>
        @error('is_demo')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>
</div>
