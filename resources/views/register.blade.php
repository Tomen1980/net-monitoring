@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-lg">
            <div>
                <h2 class="text-2xl font-bold text-center text-gray-900">Create Your Account</h2>
                <p class="text-sm text-center text-gray-600">Please fill in the details to register</p>
            </div>
            <form class="mt-8 space-y-6" action="/register" method="POST">
                @csrf
                @method('POST')
                <div class="rounded-md shadow-sm">
                    <div>
                        @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" required
                            class="relative block w-full px-3 py-2 border border-gray-300 rounded-t-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Name">
                    </div>
                    <div>
                        @error('email')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                    </div>
                    <div>
                        @error('password')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                            class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                    <div>
                        @error('password_confirmation')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <label for="password-confirm" class="sr-only">Confirm Password</label>
                        <input id="password-confirm" name="password_confirmation" type="password" required
                            class="relative block w-full px-3 py-2 border border-gray-300 rounded-b-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirm Password">
                    </div>
                </div>
                <div class="flex items-center justify-center">

                    <label class="flex items-center mr-4">
                        <input type="radio" name="role" value="admin"
                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-900">Admin</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="role" value="operator"
                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-900">Operator</span>
                    </label>

                </div>
                @error('role')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div>
                    <button type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
