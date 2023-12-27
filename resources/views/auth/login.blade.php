@vite('resources/css/app.css')

<form action="{{ route('authenticate') }}" method="GET">
    @csrf
    <label>
        <p>Login</p>
        <input type="text" name="email">
    </label>
    <label>
        <p>Password</p>
        <input type="password" name="password">
    </label>
    <input type="submit" value="Zaloguj">
</form>
@error('email')
    <p>{{ $errors->first('email') }}</p>
@enderror