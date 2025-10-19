@extends('layouts.master')

@section('content')
    <div class="signin">
        <div class="signin__warp">
            <div class="signin__content">
                {{-- <div class="signin__logo">
                    <a href="#"><img src="img/siign-in-logo.png" alt=""></a>
                </div> --}}
                <div class="flex items-center justify-center h-screen">
                    <div class="rounded-2xl text-white bg-cover bg-center relative overflow-hidden"
                        style="background-image: url('{{ asset('images/bg2.jpg') }}');">
                        <div class="signin__form__text  bg-black bg-opacity-50 rounded-2xl p-8 w-96 text-white">
                            <h1 class="text-3xl font-bold mb-6 text-center">Sign Up</h1>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <input type="text" name="fullname" placeholder="Full Name"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>
                                <input type="text" name="username" placeholder="User Name"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>
                                <input type="email" name="email" placeholder="Your e-mail"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>
                                <input type="password" name="password" placeholder="Create a password"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>
                                <input type="password" name="password_confirmation" placeholder="Confirm password"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>

                                <label for="sign-agree-check">
                                        I accept the <a href="#" class="underline ml-1">policy and terms</a>
                                        <input type="checkbox" id="sign-agree-check" name="agree" required>
                                        <span class="checkmark"></span>
                                </label>

                                <button type="submit" class="bg-green-500 px-6 py-2 rounded-full w-full">Create Account</button>
                            </form>
                            {{-- <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <input type="text" name="fullname" placeholder="Full Name" required>
                                    <input type="text" name="username" placeholder="User Name*" required>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required> <!-- Use for validation, not storage -->
                                    <label for="sign-agree-check">
                                        I agree to the terms & conditions
                                        <input type="checkbox" id="sign-agree-check" name="agree" required>
                                        <span class="checkmark"></span>
                                    </label>
                                    <button type="submit" class="site-btn">Register Now</button>
                                </form> --}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Sign In Section End -->
@endsection
