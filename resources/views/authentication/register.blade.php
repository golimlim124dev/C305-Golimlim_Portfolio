@include('components.header')
    @if ($errors->any())
        <div style='color: red'>
            @foreach ($errors->all()as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{route('register')}}"method="POST">
        <p>Name</p>
        <input type="text" name="name">
        <p>Email</p>
        <input type="email" name="email">
        <p>Password</p>
        <input type="password" name="password">
        <p>Confirm Password</p>
        <input type="password" name="confirm_password">
        <input type='submit'>
    </form>
@include('components.footer')
