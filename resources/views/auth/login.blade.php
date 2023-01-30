<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <title>{{ config('app.name') }}</title>
</head>
<body>
    
    <div class="flex">
        <div class="w-2/5 h-screen grid content-center p-16">

            @error('failed')
            <div class="px-8">
                <div id="alert-border-2" class="flex p-4 mb-4 text-red-700 bg-red-100 border-t-4 border-red-500 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ $message }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            @enderror

            <span class="flex px-8 text-3xl text-rose-600 font-bold mt-6 mb-8">Masuk ke akun anda</span>
            
            {{-- google sign in method --}}
            <button class="w-56 h-12 px-4 py-2 ml-8 mb-4 bg-gray-100 border border-gray-100 rounded-md hover:bg-gray-50 hover:border hover:border-gray-200 hover:duration-300" onclick="Google()">
                <div class="flex space-x-4">
                    <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                          <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z"/>
                          <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z"/>
                          <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.724 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z"/>
                          <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z"/>
                        </g>
                    </svg>
                    <span class="font-semibold">Sign in with Google</span>
                </div>
            </button>
            <span class="px-8 text-sm text-gray-500">atau gunakan email anda</span>

            {{-- email sign in method --}}
            <form class="px-8 pt-6 pb-8 mb-4" method="POST" action="">
                @csrf
                <div class="mb-4">
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input class="appearance-none outline-none border-0 bg-gray-200 rounded-md w-full h-12 py-2 px-10 text-gray-700 leading-tight hover:bg-white hover:border-white hover:ring-2 hover:ring-rose-500 hover:duration-500 focus:bg-white focus:ring focus:ring-red-300 focus:border-red-300" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Email">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs italic">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input class="appearance-none outline-none border-0 bg-gray-200 rounded-md w-full h-12 py-2 px-10 text-gray-700 leading-tight hover:bg-white hover:border-white hover:ring-2 hover:ring-rose-500 hover:duration-500 focus:bg-white focus:ring focus:ring-red-300 focus:border-red-300" id="password" type="password" name="password" required autocomplete="off" placeholder="Password">
                    </div>
                    @error('password')
                        <span class="text-red-500 text-xs italic">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                {{-- forgot password --}}
                <div class="flex items-center justify-between mb-4">
                    <span>&nbsp;</span>
                    <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="">
                        Lupa Password?
                    </a>
                </div>
    
                {{-- sign in button --}}
                <div class="flex justify-center">
                    <button class="w-full bg-rose-600 hover:bg-rose-500 hover:duration-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Masuk
                    </button>
                </div>
            </form>
    
            {{-- to sign up page --}}
            <div class="flex justify-center">
                <span class="text-sm text-gray-500">
                    Belum punya akun? <a class="text-blue-500 hover:text-blue-800" href="{{ route('register') }}">Daftar</a>
                </span>
            </div>
        </div>
        {{-- hiasan abstrak --}}
        <div class="w-3/5 h-screen">
            <div class="grid grid-cols-3 grid-rows-3">
                <div class="w-full h-screen row-span-3">
                    <div class="w-full h-1/3 bg-red-200"></div>
                    <div class="w-full h-1/3 rounded-full bg-red-300"></div>
                    <div class="w-full h-1/3 bg-red-100"></div>
                </div>
                <div class="w-full h-screen row-span-3">
                    <div class="w-full h-1/2 rounded-tr-full bg-red-300"></div>
                    <div class="w-full h-1/2 rounded-bl-full bg-red-100"></div>
                </div>
                <div class="w-full h-screen bg-red-200 rounded-br-full rounded-tl-full row-span-3"></div>
            </div>
    
            {{-- welcoming text --}}
            <span class="absolute top-64 right-72 mr-12 font-semibold text-8xl text-white">Selamat</span>
            <span class="absolute top-96 right-36 mr-12 font-semibold text-8xl text-slate-500">Datang</span>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script>
        function Google(){
            window.location.href = "{{ route('google') }}";
        }
        document.getElementById("account").classList.add('hidden')
        function dropdownMenu(){
            document.getElementById("account").classList.toggle('hidden')
        }
    </script>
</body>
</html>