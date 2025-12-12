@extends('layouts.app')

@section('content')
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-100">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl border border-gray-200 transform transition-all duration-500 hover:scale-105 animate-fade-in">
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
        <p class="text-gray-600">Join us today</p>
      </div>

      <form action="{{ route('register.perform') }}" method="POST" class="space-y-6">
        @csrf

        <div class="relative">
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <div class="relative">
            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
          @error('name')
            <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
          @enderror
        </div>

        <div class="relative">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <div class="relative">
            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
            </svg>
          </div>
          @error('email')
            <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
          @enderror
        </div>

        <div class="relative">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="relative">
            <input type="password" id="password" name="password" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
          </div>
          @error('password')
            <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
          @enderror
        </div>

        <div class="relative">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
          <div class="relative">
            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>

        <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
          <span class="flex items-center justify-center gap-2">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Create Account
          </span>
        </button>
      </form>

    
    </div>s
  </div>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fade-in 0.6s ease-out;
    }
    @keyframes slide-in {
      from { opacity: 0; transform: translateX(-10px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-slide-in {
      animation: slide-in 0.3s ease-out;
    }
  </style>
@endsection