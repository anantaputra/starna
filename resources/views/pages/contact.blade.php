@extends('layouts.app')

@section('content')
<div class="w-full py-8">
    <div class="grid grid-cols-2 space-x-16">
        <div>
            <p class="text-5xl font-bold text-rose-600 mb-4" style="font-family: 'Nunito', sans-serif;">Hubungi kami</p>
            <p class="text-gray-500 mb-8">Kirimkan kami saran mengenai produk maupun pelayanan kami untuk dapat memuaskan pelanggan.</p>
            <form action="{{ route('pesan.kirim') }}" method="post" class="space-y-8">
                @csrf
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-lg font-semibold text-gray-600">Nama Anda</label>
                    <input type="text" name="name" id="name" class="w-full bg-gray-200 px-4 py-4 text-sm border border-gray-200 rounded" placeholder="Nama Anda" required>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="email" class="text-lg font-semibold text-gray-600">Email Anda</label>
                    <input type="text" name="email" id="email" class="w-full bg-gray-200 px-4 py-4 text-sm border border-gray-200 rounded" placeholder="Email Anda" required>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="message" class="text-lg font-semibold text-gray-600">Pesan Anda</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="w-full px-4 py-4 text-sm bg-gray-200 border border-gray-200 rounded" required></textarea>
                </div>
                <button class="bg-rose-600 text-xl shadow-lg text-white font-medium rounded py-4 px-16 hover:bg-red-400">Kirim Pesan</button>
            </form>
        </div>
        <div>
            <div class="py-16">                
                <svg class="w-full h-96" width="1219" height="877" viewBox="0 0 1219 877" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="687.5" cy="453.5" rx="356.5" ry="350.5" fill="#D9D9D9"/>
                    <rect x="425.764" y="364.707" width="522.679" height="297.536" rx="30" fill="#0D96E2"/>
                    <path d="M681.102 450.259C684.809 447.173 690.191 447.173 693.898 450.259L927.272 644.557C934.462 650.543 930.229 662.242 920.874 662.242H454.126C444.771 662.242 440.538 650.543 447.728 644.557L681.102 450.259Z" fill="#38B8D3"/>
                    <path d="M700.414 527.791C692.319 531.999 682.681 531.999 674.586 527.791L458.768 415.603C432.763 402.085 442.374 362.759 471.682 362.759L903.318 362.759C932.626 362.759 942.237 402.085 916.232 415.603L700.414 527.791Z" fill="#0682C8"/>
                    <path d="M630.226 539.13L485.249 429.354H889.751C855.744 452.979 777.23 508.009 735.229 539.13C693.227 570.251 647.726 552.097 630.226 539.13Z" fill="white"/>
                    <path d="M674.603 237.472C682.828 233.094 692.691 233.094 700.916 237.472L911.379 349.498C937.121 363.2 927.384 402.214 898.223 402.214H477.296C448.134 402.214 438.398 363.2 464.139 349.498L674.603 237.472Z" fill="#0682C8"/>
                    <path d="M745.764 228.899L889.509 340.225L485.032 335.88C519.3 312.622 598.422 258.439 640.767 227.771C683.112 197.103 728.409 215.745 745.764 228.899Z" fill="white"/>
                    <path d="M485.249 429.354H889.751V249.821L811.23 172.321H485.249V429.354Z" fill="white"/>
                    <path d="M812.023 172.321C801.712 206.722 802.981 270.539 890.544 250.599L812.023 172.321Z" fill="#C4C4C4"/>
                    <rect x="529.665" y="235.411" width="239.528" height="14.02" fill="#C4C4C4"/>
                    <rect x="559.011" y="339.782" width="239.528" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="374.832" width="155.455" height="14.02" fill="#C4C4C4"/>
                    <rect x="703.363" y="374.832" width="95.1767" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="270.461" width="239.528" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="305.511" width="239.528" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="405.209" width="268.874" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="440.259" width="268.874" height="14.02" fill="#C4C4C4"/>
                    <rect x="529.665" y="339.782" width="19.0353" height="14.02" fill="#C4C4C4"/>
                    <circle cx="256" cy="163" r="50" fill="#FFA4A4"/>
                    <circle cx="256" cy="163" r="30" fill="white"/>
                    <circle cx="254" cy="481" r="32" fill="#2E9ECE"/>
                    <circle cx="254" cy="481" r="19" fill="white"/>
                    <circle cx="859" cy="101" r="32" fill="#2E9ECE"/>
                    <circle cx="859" cy="101" r="19" fill="white"/>
                    <ellipse cx="738" cy="20" rx="19" ry="20" fill="#2E9ECE"/>
                    <ellipse cx="738" cy="20" rx="11.2812" ry="11.875" fill="white"/>
                    <ellipse cx="420" cy="804" rx="19" ry="20" fill="#39C4FF"/>
                    <ellipse cx="203" cy="682" rx="19" ry="20" fill="#2E9ECE"/>
                    <ellipse cx="203" cy="682" rx="19" ry="20" fill="#2E9ECE"/>
                    <path d="M809.5 844C809.5 855.046 800.993 864 790.5 864C780.007 864 771.5 855.046 771.5 844C771.5 832.954 780.007 824 790.5 824C800.993 824 809.5 832.954 809.5 844Z" fill="#2E9ECE"/>
                    <ellipse cx="1079" cy="589" rx="19" ry="20" fill="#2E9ECE"/>
                    <ellipse cx="1200" cy="403" rx="19" ry="20" fill="#26B06E"/>
                    <ellipse cx="1079" cy="309" rx="19" ry="20" fill="#26B06E"/>
                    <rect x="138" y="278.646" width="16.4693" height="113.638" rx="8.23466" transform="rotate(-45 138 278.646)" fill="#FD8C8C"/>
                    <rect x="149.646" y="359" width="16.4693" height="113.638" rx="8.23466" transform="rotate(-135 149.646 359)" fill="#FD8C8C"/>
                    <rect width="7.88476" height="54.4049" rx="3.94238" transform="matrix(0.738486 -0.674269 0.738486 0.674269 439 16.3164)" fill="#5CE646"/>
                    <rect width="7.88476" height="54.4049" rx="3.94238" transform="matrix(-0.738486 -0.674269 0.738486 -0.674269 444.823 53)" fill="#5CE646"/>
                    <rect width="7.88476" height="54.4049" rx="3.94238" transform="matrix(0.738486 -0.674269 0.738486 0.674269 1042 106.316)" fill="#CF46E6"/>
                    <rect width="7.88476" height="54.4049" rx="3.94238" transform="matrix(-0.738486 -0.674269 0.738486 -0.674269 1047.82 143)" fill="#CF46E6"/>
                    <path d="M573.547 833.411C402.834 808.026 323.247 662.371 302.589 585.81C301.466 581.646 302.64 577.242 305.551 574.06C312.589 566.366 325.482 569.701 328.538 579.671C376.125 734.943 500.019 793.904 576.132 807.948C586.075 809.782 590.86 822.198 584.036 829.659C581.385 832.557 577.432 833.988 573.547 833.411Z" fill="#6070FF"/>
                    <rect x="788.987" y="347.061" width="144.092" height="84" transform="rotate(-32.8024 788.987 347.061)" fill="white"/>
                    <path d="M1011.7 260.875C1013.15 258.66 1013.99 256.297 1014.13 254.049C1014.27 251.802 1013.71 249.758 1012.5 248.148C1011.29 246.537 1009.49 245.423 1007.29 244.93C1005.09 244.437 1002.59 244.585 1000.06 245.357L786.493 310.62C783.844 311.428 781.279 312.886 779.109 314.814C776.939 316.742 775.259 319.057 774.274 321.477C773.288 323.898 773.04 326.318 773.559 328.444C774.078 330.57 775.342 332.309 777.197 333.449L826.898 363.982C828.976 365.258 831.688 365.717 834.622 365.29C837.557 364.863 840.555 363.573 843.162 361.616L898.01 320.471C901.192 318.083 904.93 316.708 908.401 316.648C911.872 316.587 914.793 317.847 916.519 320.149C918.246 322.45 918.638 325.606 917.609 328.922C916.58 332.238 914.214 335.442 911.031 337.829L856.184 378.974C853.575 380.93 851.498 383.447 850.267 386.145C849.036 388.842 848.718 391.574 849.361 393.926L864.781 450.176C865.355 452.276 866.669 453.978 868.563 455.072C870.457 456.167 872.849 456.607 875.448 456.34C878.047 456.073 880.74 455.11 883.198 453.568C885.657 452.026 887.775 449.972 889.294 447.657L1011.7 260.884L1011.7 260.875Z" fill="#D6FAFF"/>
                    <path d="M992.261 256.159C993.71 253.944 994.552 251.581 994.694 249.333C994.836 247.086 994.271 245.042 993.063 243.432C991.855 241.821 990.051 240.707 987.853 240.214C985.656 239.721 983.151 239.869 980.619 240.641L767.056 305.904C764.408 306.712 761.843 308.17 759.673 310.098C757.503 312.026 755.823 314.341 754.838 316.761C753.852 319.182 753.604 321.602 754.123 323.728C754.642 325.854 755.906 327.593 757.761 328.733L807.462 359.266C809.54 360.542 812.252 361.001 815.186 360.574C818.121 360.147 821.119 358.857 823.726 356.9L878.573 315.755C881.756 313.367 885.494 311.992 888.965 311.932C892.436 311.871 895.357 313.131 897.083 315.433C898.81 317.734 899.202 320.89 898.173 324.206C897.144 327.522 894.778 330.726 891.595 333.113L836.748 374.258C834.139 376.214 832.062 378.731 830.831 381.429C829.6 384.126 829.282 386.858 829.925 389.21L845.345 445.46C845.919 447.56 847.233 449.262 849.127 450.356C851.021 451.451 853.413 451.891 856.012 451.624C858.611 451.357 861.304 450.394 863.762 448.852C866.221 447.31 868.339 445.256 869.858 442.941L992.267 256.168L992.261 256.159Z" fill="#81E3F0"/>
                    <rect x="262" y="249" width="248" height="84" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M527 246.25V335.25C527 341.151 523.286 346.81 516.676 350.983C510.065 355.156 501.099 357.5 491.75 357.5H403.625L315.5 402V357.5H280.25C270.901 357.5 261.935 355.156 255.324 350.983C248.714 346.81 245 341.151 245 335.25V246.25C245 240.349 248.714 234.69 255.324 230.517C261.935 226.344 270.901 224 280.25 224H491.75C501.099 224 510.065 226.344 516.676 230.517C523.286 234.69 527 240.349 527 246.25ZM333.125 279.625H297.875V301.875H333.125V279.625ZM368.375 279.625H403.625V301.875H368.375V279.625ZM474.125 279.625H438.875V301.875H474.125V279.625Z" fill="#44F9E3"/>
                </svg>    
            </div>
            <div class="mb-8 space-y-2">
                <div class="flex space-x-4 items-center text-slate-400 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <span>Klaten, Jawa Tengah, Indonesia</span>
                </div>
                <div class="flex space-x-4 items-center text-slate-400 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                    <span>+62 876 1123 4567</span>
                </div>
                <div class="flex space-x-4 items-center text-slate-400 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    <span>nasywasnack@gmail.com</span>
                </div>
            </div>
            <div class="flex justify-center space-x-8">
                <a href="#" class="w-24 h-24 text-gray-500 hover:text-gray-900">
                    <svg class="w-full h-full text-blue-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="w-20 h-20 mt-2 rounded-full flex justify-center items-center bg-purple-400 text-gray-500 hover:text-gray-900">
                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="w-20 h-20 mt-2 rounded-full flex justify-center items-center bg-cyan-500 text-gray-500 hover:text-gray-900">
                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                </a>
            </div>
        </div>
    </div>
</div>

@if (session('status') == 'berhasil')
<div id="popup-modal" tabindex="-1" data-modal-show="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-6 text-center">
                <h3 class="mb-5 text-lg font-normal text-gray-500">Pesan anda berhasil dikirim</h3>
                <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
@endif
@endsection