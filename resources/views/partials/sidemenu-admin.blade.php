<div class="fixed w-1/6 flex flex-col justify-between h-screen bg-white border-r">
    <div class="px-4 py-6">
  
      <nav class="flex flex-col mt-2 space-y-1">
        <a href="{{ route('admin') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Dashboard </span>
        </a>

        <a href="{{ route('admin.kategori') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/kategori') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Kategori </span>
        </a>
  
        <a href="{{ route('admin.produk') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/produk') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Produk </span>
        </a>
  
        <a href="{{ route('admin.inbox') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/inbox') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Saran dan Kritik </span>

        </a>
  
        <a href="{{ route('admin.pesanan') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/pesanan') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Pesanan </span>
        </a>

        <a href="{{ route('admin.transaksi') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/transaksi') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Pembayaran </span>
        </a>

        <a href="{{ route('admin.retur') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 {{ (Request()->route()->getPrefix() == 'admin/retur') ? 'bg-gray-100 text-gray-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
      
            <span class="ml-3 text-sm font-medium"> Retur </span>
        </a>

        <details class="group">
            <summary class="flex items-center px-4 py-4 text-gray-500 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
    
                <span class="ml-3 text-sm font-medium"> Laporan </span>
        
                <span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </span>
            </summary>
    
            <nav class="mt-1 ml-6 flex flex-col">
              <a href="{{ route('admin.laporan.pesanan') }}" class="flex items-center px-4 py-1 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">    
                <span class="ml-3 text-sm font-medium"> Pesanan </span>
              </a>
              <a href="{{ route('admin.laporan.transaksi') }}" class="flex items-center px-4 py-1 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">    
                <span class="ml-3 text-sm font-medium"> Pembayaran </span>
              </a>
              <a href="{{ route('admin.laporan.retur') }}" class="flex items-center px-4 py-1 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">    
                <span class="ml-3 text-sm font-medium"> Retur </span>
              </a>
            </nav>
        </details>
  
        <a href="{{ route('home') }}" class="flex items-center px-4 py-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="ml-3 text-sm font-medium"> Website </span>
        </a>
      </nav>
    </div>
    <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
      <a onclick="document.querySelector('#form-logout').submit();" class="cursor-pointer flex items-center w-full px-8 py-4 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
  
          <span class="ml-3 text-sm font-medium"> Logout </span>
      </a>
      <form action="{{ route('logout') }}" method="post" id="form-logout">
        @csrf
      </form>
    </div>
  </div>