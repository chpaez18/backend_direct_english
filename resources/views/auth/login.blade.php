<x-guest-layout title="Login">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" style='background-image: url("/img/bg.jpg");'>
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-gray-100 rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{asset('img/login.jpg')}}" alt="Login" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{asset('img/login.jpg')}}" alt="Login" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                    <div class="text-center mb-10">
                        <div class="p-2 rounded flex justify-center items-center flex-col">
                            <img aria-hidden="true" style="width:110px; height:110px" class="text-gray-600 mb-2" src="{{ asset('img/logo-nora.png') }}" alt="Nora" />
                        </div>
                        <h1 class="font-bold text-3xl text-gray-900">N.O.R.A</h1>
                        <h1 class="font-bold text-1xl text-gray-900">Ingresa tus datos para iniciar sesión</h1>
                    </div>
                        @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Algo está mal.</div>

                            <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Correo Eléctronico</span>
                                <div class="flex">
                                    <input class="block w-full mt-1 rounded-lg outline-none focus:border-indigo-200 border-gray-200 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane@Doe.com" name="email" value="{{ old('email') }}" required autofocus />
                                </div>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                <div class="flex">
                                    <input class="block w-full mt-1 rounded-lg outline-none focus:border-indigo-200 border-gray-200 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password" required autocomplete="current-password" />
                                </div>
                            </label>
                            
                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Iniciar Sesión') }}
                            </button>
                        </form>

                        <p class="mt-4 text-center">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu Contraseña?') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>







