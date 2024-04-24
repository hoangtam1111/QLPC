@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <x-guest-layout>
                <form method="POST" action="{{ route('login-post') }}">
                    <div class="login">
                        <h2>ĐĂNG NHẬP</h2>
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <button type="submit" class="btn action-1">Login</button>

                        </div>
                        <a style="color: #E02207;" href="./forgot_password.php">Quên mật khẩu</a>
                    </div>
                    @csrf



                </form>
            </x-guest-layout>
        </div>
    </div>
@endsection
