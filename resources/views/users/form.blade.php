<div class="card-body">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
               placeholder="Enter email" value="{{$user->email ?? old('email')}}">
        @error('email')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
               placeholder="Enter name" value="{{$user->name ?? old('name')}}">
        @error('name')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
               name="password" placeholder="Enter password">
        @error('password')
        <span class="text-danger small">
                                        {{$message}}
                                    </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Password confirmation</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
               name="password_confirmation" placeholder="Enter password confirmation">

    </div>

    {{--    <div class="form-check">--}}
    {{--        <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin">--}}
    {{--        <label class="form-check-label" for="is_admin">Admin</label>--}}
    {{--    </div>--}}
</div>
