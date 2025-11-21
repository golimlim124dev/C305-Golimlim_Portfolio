@include('components.header')
    @if ($errors->any())
        <div style='color: red'>
            @foreach ($errors->all()as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{route('login')}}"method="POST">
        @
        <p>Email</p>
        <input type="email" name="email">
        <p>Password</p>
        <input type="password" name="password">
        <input type='submit'>
    </form>
@include('components.footer')
