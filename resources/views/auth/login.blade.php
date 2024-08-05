<x-guest-layout>
    <div class="flex h-screen">
        <!-- Left Pane -->

        <div class="w-full bg-primary/[0.15] lg:w-1/2 flex items-center justify-center">
            <div class="max-w-md w-full p-6">
                <div class="flex justify-center mb-5">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
                    </a>
                </div>
                <h1 class="text-3xl font-semibold mb-6 text-accent3 text-center">Sign In</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mt-4">
                        <input id="email" type="email"
                               placeholder="Email"
                               class="form-input focus:border-analogous3 border-1 rounded-lg w-full @error('email') border-red-600 @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="mt-1 text-xs italic text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <input id="password" type="password"
                               placeholder="Password"
                               class="form-input focus:border-analogous3 border-1 rounded-lg w-full @error('password') border-red-600 @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <p class="mt-1 text-xs italic text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mt-4 flex justify-between flex-wrap space-y-2 md:space-y-0 items-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        <span class="text-sm text-gray-600">
                            You don´t have any account? <a class="text-accent2 underline hover:text-purple-950"
                                                           href="{{ route('register') }}">
                            Clic here
                        </a>
                        </span>


                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-accent2 underline hover:text-purple-950"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-primary border border-transparent rounded-md hover:bg-[#A23DD4] active:bg-[#A23DD4] focus:outline-none focus:border-[#8D34BD] focus:ring ring-[#E4B6F5] disabled:opacity-25">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Pane -->

        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black">
            <div class="max-w-md text-center">
                <img src="{{asset('imgs/register.jpg')}}" alt="register-img">
            </div>
        </div>
    </div>
</x-guest-layout>
