@extends('layouts.guest')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="p-4 sm:p-7">
        <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Don't have an account yet?
                <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="{{ route('candidates.register') }}">
                    Sign up here
                </a>
            </p>
        </div>

        <div class="mt-5">

            <form method="POST" action="{{ route('candidates.loginCheck') }}">
                @csrf
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                        <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                required aria-describedby="email-error">

                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-500" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                            <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="../examples/html/recover-account.html">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                required aria-describedby="password-error">

                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-500" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->
                    <div class="flex items-center">
                        <div class="flex">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                        </div>
                        <div class="ms-3">
                            <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                        </div>
                    </div>
                    <!-- End Checkbox -->

                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
                        in</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Login Form -->
@endsection
