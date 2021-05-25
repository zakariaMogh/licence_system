<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
               placeholder="Enter name" value="{{$product->name ?? old('name')}}">
        @error('name')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
               placeholder="Enter code" value="{{$code ?? ($product->code ?? old('code'))}}" {{request()->is('products/*/edit') ? 'disabled' : ''}}>
        @error('code')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="version">Version</label>
        <input type="number" class="form-control @error('version') is-invalid @enderror" id="version" name="version"
               placeholder="Enter version" value="{{$product->version ?? old('version')}}">
        @error('version')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>
</div>
