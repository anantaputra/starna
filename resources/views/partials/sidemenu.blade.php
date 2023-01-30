<div class="fixed w-1/4 flex flex-col justify-between h-screen bg-white border-r">
  <div class="px-4 py-6">
    <a href="{{ route('user.profil') }}" class="flex items-center p-4 bg-white hover:bg-gray-50 shrink-0">
        <img class="object-cover w-10 h-10 rounded-full" src="{{ (isset(auth()->user()->foto)) ? asset('upload/profil/'.auth()->user()->foto.'') : asset('img/user.svg') }}" alt=""/>

        <div class="ml-2.5">
            <p class="text-xs">
                <strong class="block font-medium">{{ auth()->user()->nama_depan }}</strong>
            </p>
        </div>
    </a>

    <nav class="flex flex-col mt-6 space-y-1">
        <div>
            <div class="flex items-center px-4 py-2 text-gray-500 rounded-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
        
                <span class="ml-3 text-sm font-medium"> Akun Saya </span>
            </div>
            <nav class="mt-1.5 ml-8 flex flex-col space-y-2">
                <a href="{{ route('user.profil') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/profil') ? 'bg-gray-100 text-gray-700' : '' }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                  </svg>
      
                  <span class="ml-3 text-sm font-medium"> Detail </span>
                </a>

                <a href="{{ route('user.alamat') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/alamat') ? 'bg-gray-100 text-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
      
                  <span class="ml-3 text-sm font-medium"> Alamat </span>
                </a>
      
                <a href="{{ route('user.password') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/password') ? 'bg-gray-100 text-gray-700' : '' }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                  </svg>
      
                  <span class="ml-3 text-sm font-medium"> Keamanan </span>
                </a>
            </nav>
        </div>

        <div>
            <div class="flex items-center px-4 py-2 text-gray-500 rounded-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
        
                <span class="ml-3 text-sm font-medium"> Pesanan Saya </span>
            </div>
            <nav class="mt-1.5 ml-8 flex flex-col space-y-2">
                <a href="{{ route('user.tagihan') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/tagihan') ? 'bg-gray-100 text-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
      
                  <span class="ml-3 text-sm font-medium"> Tagihan </span>
                  @php
                      $jmlTransaksi = App\Http\Controllers\User\TagihanUserController::jmlTagihan();
                  @endphp
                  @if ($jmlTransaksi > 0)
                  <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full">{{ $jmlTransaksi }}</span>
                  @endif
                </a>
      
                <a href="{{ route('user.riwayat') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/riwayat') ? 'bg-gray-100 text-gray-700' : '' }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                  </svg>
      
                  <span class="ml-3 text-sm font-medium"> Riwayat </span>
                </a>

                <a href="{{ route('user.retur') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('user/retur') ? 'bg-gray-100 text-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
      
                  <span class="ml-3 text-sm font-medium"> Retur </span>
                </a>
      
            </nav>
        </div>

        <div>
          <a href="{{ route('home') }}" class="flex items-center px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-3 text-sm font-medium"> Nasywa </span>
          </a>
        </div>
    </nav>
  </div>
  <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
    <a href="{{ route('logout') }}" class="flex items-center w-full px-8 py-4 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
        </svg>

        <span class="ml-3 text-sm font-medium"> Logout </span>
    </a>
  </div>
</div>