<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="Name" value="{{ isset($user) ? $user->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
        placeholder="Email" value="{{ isset($user) ? $user->email : old('email', '') }}">
    @if ($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}
        </p>
    @endif
</div>

<div class="form-group">
    <label for="user_type">User Type</label>
    <select name="user_type" id="user_type" class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}">
        @foreach (App\Models\User::$roles as $key => $role)
            <option value="{{ $key }}"{{ isset($user) ? ($key == $user->user_type ? 'selected' : '') : '' }}>
                {{ $role }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('user_type'))
        <p class="text-danger">{{ $errors->first('user_type') }}
        </p>
    @endif
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
        placeholder="Password">
    @if ($errors->has('password'))
        <p class="text-danger">{{ $errors->first('password') }}</p>
    @endif
</div>
