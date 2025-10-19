@extends('layouts.master')

@section('content')
    <div class="signin">
        <div class="signin__warp">
            <div class="signin__content">
                {{-- <div class="signin__logo">
                    <a href="#"><img src="img/siign-in-logo.png" alt=""></a>
                </div> --}}
                <div class="flex items-center justify-center h-screen">
                    <div class="rounded-2xl w-96 text-white bg-cover bg-center relative overflow-hidden"
                        style="background-image: url('/images/bg2.jpg');" id="tabs-1" role="tabpanel">
                        <div class="signin__form__text bg-black bg-opacity-50 rounded-2xl p-8 w-96 text-white">
                            <h1 class="text-3xl font-bold mb-6 text-center">Sign In</h1>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <input type="text" name="username" placeholder="User Name"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>
                                <input type="password" name="password" placeholder="Password"
                                    class="w-full mb-4 px-4 py-2 rounded-full text-black" required>

                                <div class="flex justify-between items-center mb-4">
                                    <a href="#" class="text-sm">Forgot password?</a>
                                    <button type="submit" class="bg-green-500 px-6 py-2 rounded-full">Sign In →</button>
                                </div>
                            </form>
                            {{-- <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <input type="text" name="username" placeholder="User Name*" required> <!-- Use username for login -->
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" class="site-btn">Sign In</button>
                                </form> --}}
                            <p class="text-center mb-2">or sign up with</p>
                            <div class="flex justify-center space-x-4">
                                <button class="bg-white rounded-full p-2"><img
                                        src="https://www.svgrepo.com/show/355037/google.svg" class="w-6"></button>
                                <button class="bg-white rounded-full p-2"><img
                                        src="https://www.svgrepo.com/show/452196/facebook.svg" class="w-6"></button>
                                <button class="bg-white rounded-full p-2"><img
                                        src="https://www.svgrepo.com/show/354048/vk.svg" class="w-6"></button>
                                <button class="bg-white rounded-full p-2">@</button>
                            </div>
                            {{-- <br>
                            <div class="divide">or</div>
                            <p>with your social network :</p>
                            <div class="signin__form__signup__social">
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <!-- Add more -->
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Sign In Section End -->
@endsection
