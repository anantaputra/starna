<nav class="min-w-full bg-rose-600 md:bg-white md:flex md:justify-between md:items-center md:shadow-sm md:border-b p-4 lg:space-x-20 lg:px-16">

    <div class="flex justify-between items-center px-3 md:hidden">
        <div class="text-white text-2xl font-semibold -mt-2">
            Nasywa
        </div>
        <div>
            <button data-collapse-toggle="mobile" type="button" class="" aria-controls="mobile" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    
    <div class="hidden md:flex menu-item mt-4" id="mobile">
        <ul class="flex flex-col md:flex-row md:justify-center md:space-x-16 md:px-2 lg:px-0 lg:space-x-20 font-medium text-lg">
            <li>
                <a href="{{ route('home') }}" class="block py-2 pr-4 pl-3 md:py-0 md:pr-0 md:pl-0 {{ Request::is('/') ? 'text-white md:text-rose-600' : 'text-white md:text-gray-600' }} hover:text-rose-400 duration-300">Beranda</a>
                <div class="hidden {{ Request::is('/') ? 'md:flex' : '' }} justify-center">
                    <div class="w-8 h-1 bg-rose-600 rounded-full"></div>
                </div>
            </li>
            <li>
                <a href="{{ route('produk') }}" class="block py-2 pr-4 pl-3 md:py-0 md:pr-0 md:pl-0 {{ Request::is('produk') ? 'text-white md:text-rose-600' : 'text-white md:text-gray-600' }} hover:text-rose-400 duration-300">Produk</a>
                <div class="hidden {{ Request::is('produk') ? 'md:flex' : '' }} justify-center">
                    <div class="w-8 h-1 bg-rose-600 rounded-full"></div>
                </div>
            </li>
            <li>
                <a href="{{ route('kontak') }}" class="block py-2 pr-4 pl-3 md:py-0 md:pr-0 md:pl-0 {{ Request::is('kontak') ? 'text-white md:text-rose-600' : 'text-white md:text-gray-600' }} hover:text-rose-400 duration-300">Kontak</a>
                <div class="hidden {{ Request::is('kontak') ? 'md:flex' : '' }} justify-center">
                    <div class="w-8 h-1 bg-rose-600 rounded-full"></div>
                </div>
            </li>
            <hr class="mx-3 md:hidden">
            <li>
                <a href="{{ route('login') }}" class="block md:hidden py-2 pr-4 pl-3 text-white md:text-gray-600 hover:text-rose-400 duration-300">Masuk</a>
                
            </li>
            <li>
                <a href="{{ route('register') }}" class="block md:hidden py-2 pr-4 pl-3 text-white md:text-gray-600 hover:text-rose-400 duration-300">Daftar</a>
                
            </li>
        </ul>
    </div>
    
    <div class="hidden md:flex md:space-x-2 md:px-3 lg:px-20">
        @auth
        <div class="flex items-center space-x-4">
            <a href="{{ route('keranjang') }}" class="w-10 border-r cursor-pointer">
                @php
                    $coun = 0;
                    $cart = App\Models\Keranjang::where('id_user', auth()->user()->id_user)->where('checkout', false)->get()->count();
                    $coun += $cart
                @endphp
                @if ($coun > 0)
                <span class="absolute bg-rose-600 rounded-full py-0.5 px-1.5 text-white text-[0.75rem] -mt-3 ml-3">{{ $coun }}</span>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </a>
            <button type="button" class="flex mr-3 text-sm bg-white rounded-full md:mr-0" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ (isset(auth()->user()->foto)) ? asset('upload/profil/'.auth()->user()->foto.'') : asset('img/user.svg') }}" alt="user photo">
            </button>
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow" id="dropdown">
                <div class="py-3 px-4">
                  <span class="block text-sm text-gray-900">{{ auth()->user()->nama_depan }}</span>
                  <span class="block text-sm font-medium text-gray-500 truncate">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                 @if (auth()->user()->hasAnyRole('admin'))   
                  <li>
                    <a href="{{ route('admin') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                  </li>
                 @else 
                  <li>
                    <a href="{{ route('user.profil') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                  </li>
                  <li>
                    <a href="{{ route('user.riwayat') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Pesanan</a>
                  </li>
                 @endif
                  <li>
                    <a onclick="document.querySelector('#logout-form').submit();" class="cursor-pointer block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                        @csrf
                    </form>
                  </li>
                </ul>
            </div>
        </div>
        @else
        <div class="menu-item md:mt-3">
            <a href="{{ route('login') }}">
                <button class="w-24 border p-2 rounded hover:border-rose-600 duration-500">Masuk</button>
            </a>
        </div>
        <div class="menu-item md:mt-3">
            <a href="{{ route('register') }}">
                <button class="w-24 border p-2 bg-rose-600 text-white rounded hover:border-rose-600 hover:bg-rose-500 duration-500">Daftar</button>
            </a>
        </div>
        @endauth
    </div>
</nav>