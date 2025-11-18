@include('components.Header')
{!! Form::text('name') !!}
<p>Email</p>
{!! Form::text('email') !!}
<p>Password</p>
{!! Form::Password('password') !!}
<p>Confirm Password</p>
@include('components.Footer')