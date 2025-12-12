@extends('layouts.app')

@section('content')
  <div class="max-w-md mx-auto bg-white p-6 rounded border">
    <h1 class="text-xl font-bold mb-4">Login</h1>

    <form action="{{ route('login.perform') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full border px-3 py-2 rounded">
        @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label>Password</label>
        <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        @error('password')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center gap-2"><input type="checkbox" name="remember"> Remember</label>
        <button class="px-3 py-2 bg-blue-600 text-white rounded">Login</button>
      </div>
    </form>
  </div>
@endsection
