<x-guest-layout>
    <div class="flex h-screen">
        <!-- Left Pane -->
        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black">
            <div class="max-w-md text-center">
                <img src="{{asset('imgs/register.jpg')}}" alt="register-img">
            </div>
        </div>
        <!-- Right Pane -->
        <div class="w-full bg-primary/[0.15]  lg:w-1/2 flex items-center justify-center">
            <div class="max-w-md w-full p-6">
                <div class="flex justify-center mb-5">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
                    </a>
                </div>
                <h1 class="text-3xl font-semibold mb-6 text-accent3 text-center">Sign Up</h1>
                <p class="text-sm font-semibold mb-6 text-gray-500 text-center">Join to Our Community with all time
                    access and free and test this app </p>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <input id="name" type="text"
                               class="form-input focus:border-analogous3 border-1  rounded-lg w-full @error('name')  border-red-600 @enderror"
                               placeholder="Name"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="mt-1 text-xs italic text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <input id="email" type="email"
                               class="form-input focus:border-analogous3 border-1  rounded-lg w-full @error('email') border-red-600 @enderror"
                               name="email"
                               placeholder="Email"
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
                               class="form-input focus:border-analogous3 border-1  rounded-lg w-full @error('password') border-red-600 @enderror" name="password"
                               placeholder="Password"
                               required autocomplete="new-password">

                        @error('password')
                        <p class="mt-1 text-xs italic text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <input id="password-confirm" type="password" class="form-input focus:border-analogous3 border-1 rounded-lg w-full"
                               placeholder="Confirm Password"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-primary border border-transparent rounded-md hover:bg-[#A23DD4] active:bg-[#8D34BD] focus:outline-none focus:border-[#8D34BD] focus:ring ring-[#E4B6F5] disabled:opacity-25">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-sm text-gray-600 text-center">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-accent2 underline hover:text-purple-950">Login
                            here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
