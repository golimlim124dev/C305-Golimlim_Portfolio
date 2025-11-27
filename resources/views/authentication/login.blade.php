@include('components.header')
@if ($errors->any())
<div style="color: red">
    @foreach ($errors->all() as $error)
        <p>{{$error }}</p>
    @endforeach
</div>
@endif
<form action="{{route('login')}}" method="POST">
    @csrf
    <p>Email</p>
    <input type="email"name="email" required>
    <p>Password</p>
    <input type="password"name="password" required>
    <input type="submit">
</form>
@include('components.footer')