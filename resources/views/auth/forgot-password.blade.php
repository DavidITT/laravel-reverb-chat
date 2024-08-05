<x-guest-layout>
    <div class="flex flex-col justify-center items-center min-h-screen bg-gray-100">
        <div class="flex flex-col items-center justify-center p-4 space-y-4 antialiased text-gray-900">
            <div class="w-full px-8 max-w-lg space-y-6 bg-white rounded-md py-16">
                <h1 class="mb-6 text-3xl font-bold text-center text-accent3">
                    Don't worry
                </h1>
                <p class="text-center mx-12">We are here to help you to recover your password. Enter the email address you used
                    when you joined and we'll send you instructions to reset your password.</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-2 w-ful">
                    @csrf
                    <input class="w-full form-input focus:border-analogous3 border-1  px-4 py-2 border rounded-md"
                           type="email" name="email" placeholder="Email address" required="">
                    <div>
                        <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white bg-primary transition-colors duration-200 rounded-md hover:bg-[#A23DD4] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1">
                            Send reset Link
                        </button>
                    </div>
                </form>
                <div class="text-sm text-gray-600 items-center flex justify-between">
                    <a href="{{ route('welcome') }}">
                        <p class="text-accent2 hover:text-purple-950 cursor-pointer inline-flex items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                            Back</p>
                    </a>
                    <p class="text-accent2 hover:text-purple-950 cursor-pointer">Need help?</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
