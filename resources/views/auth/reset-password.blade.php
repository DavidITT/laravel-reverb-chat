<x-guest-layout>
    <section>
        <main id="content" role="main" class="w-1/2 h-screen mx-auto max-w-md flex items-center justify-center">
            <div class="bg-white border shadow-lg rounded-xl w-full">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <div class="flex items-end justify-center mb-8 text-2xl font-bold">
                            <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
                        </div>
                        <h1 class="text-3xl font-semibold mb-6 text-accent3 text-center">Reset Password</h1>
                        <p class="text-center mx-12">We are here to help you to recover your password. Enter the email address you used
                            when you joined and we'll send you instructions to reset your password.</p>
                    </div>

                    <div class="mt-5">

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="grid gap-y-4">
                                <div>
                                    <input id="email"
                                           class="hidden w-full px-4 py-3 text-sm border-2 border-gray-200 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                           type="email" name="email"
                                           value="{{old('email', $request->email)}}" required autofocus
                                           autocomplete="username"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                                <div>
                                    <label for="new_password" class="block mb-2 ml-1 text-xs font-semibold ">New
                                        password</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password"
                                               class="form-input focus:border-analogous3 border-1 rounded-lg w-full @error('password') border-red-600 @enderror"
                                               required aria-describedby="new-password-error"
                                               placeholder="Enter a new password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                </div>
                                <div>
                                    <label for="confirmn_new_password"
                                           class="block mb-2 ml-1 text-xs font-semibold ">Confirm new password</label>
                                    <div class="relative">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                               class="form-input focus:border-analogous3 border-1 rounded-lg w-full @error('password') border-red-600 @enderror"
                                               required aria-describedby="confirmn_new-password-error"
                                               placeholder="Enter a new password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                                </div>
                                <button type="submit"
                                        class="w-full px-4 py-2 font-medium text-center text-white bg-primary transition-colors duration-200 rounded-md hover:bg-[#A23DD4] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1">
                                    Reset
                                    my password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>
</x-guest-layout>


