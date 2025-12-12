@extends('layouts.app')

@section('content')
  <div class="max-w-md mx-auto bg-white p-6 rounded border">
    <h1 class="text-xl font-bold mb-4">Register</h1>

    <form action="{{ route('register.perform') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label>Name</label>
        <input name="name" value="{{ old('name') }}" required class="w-full border px-3 py-2 rounded">
        @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label>Email</label>
        <input name="email" value="{{ old('email') }}" required class="w-full border px-3 py-2 rounded">
        @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label>Password</label>
        <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        @error('password')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <button class="px-3 py-2 bg-green-600 text-white rounded">Register</button>
      </div>
    </form>
  </div>
@endsection
