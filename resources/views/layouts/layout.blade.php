<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <link rel="stylesheet" href="js/jquery.timepicker.min.cs">

    <!-- Scripts -->
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
    	[data-placeholder]::after {
	        content: " ";
	        box-shadow: 0 0 50px 9px rgba(254,254,254);
	        position: absolute;
	        top: 0;
	        left: -100%;
	        height: 100%; 
	        animation: load 2s infinite;
	    }
	    @keyframes load {
	        0%{ left: -100%}
	        100%{ left: 150%}
	    }
    </style>
    <script>
		$(document).ready(function(){
		    $('#time').timepicker();
		});
	</script>
</head>
<body>
	<div>
	  <nav class="bg-gray-800">
	    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
	      <div class="md:flex items-center justify-between h-16">
	        <div class="md:flex items-center">
	          <div class="flex-shrink-0">
	            <img class="h-8 w-auto" src="img/kedarlogo1.png" alt="Workflow">
	          </div>
	          <div class="hidden md:block">
	            <div class="ml-10 md:flex items-baseline space-x-4">
	              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
	              <a href="/dashboard" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} active text-gray-300 hover:bg-gray-700 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'dashboard' == Request()->path() ? 'bg-gray-900 text-white' : ''}}" >Dashboard</a>

					<!-- GURU -->
					<a href="/ruang-guru" class="{{2 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-6 py-4 rounded-md text-sm font-medium {{'ruang-guru' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Ruang Guru</a>
					<!-- END GURU -->

					<!-- MURID -->
					<a href="/ruang-kelas" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} text-gray-300 hover:bg-gray-700 hover:text-white block px-6 py-4 rounded-md text-sm font-medium {{'ruang-kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Ruang Kelas</a>
					<!-- END MURID -->

	              <a href="/roles" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'roles' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Role</a>

	              <a href="/guru" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'guru' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Guru</a>

	              <a href="/siswa" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'siswa' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Siswa</a>

	              <a href="/kelas" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Kelas</a>

	              <a href="/kelas" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} font-extrabold text-blue-500 hover:bg-blue-800 hover:text-white px-6 py-4 rounded-md text-sm font-medium {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Daring!</a>
	              <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Reports</a> -->
	            </div>
	          </div>
	        </div>
	        
	        <!-- NOTIF & USER BUTTON -->
	        <div class="hidden md:block">
	          <div class="ml-4 flex items-center md:ml-6">

	            <!-- Profile dropdown -->
	            <div class="ml-3 relative" x-data="{ isOpen: false }">
	              <div>
	                <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
	                type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
	                  <span class="sr-only">Open user menu</span>
						@if(!empty(auth()->user()->profile_photo_path))
							<img class="h-11 w-11 rounded-full" src="{{url('storage/profile_photos/'.auth()->user()->profile_photo_path)}}" alt="">
						@else
							<svg class="h-11 w-11 text-gray-300 rounded-full border-2 border-white" fill="currentColor" viewBox="0 0 24 24">
								<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
							</svg>
						@endif
	                </button>
	              </div>

	              <!--
	                Dropdown menu, show/hide based on menu state.

	                Entering: "transition ease-out duration-100"
	                  From: "transform opacity-0 scale-95"
	                  To: "transform opacity-100 scale-100"
	                Leaving: "transition ease-in duration-75"
	                  From: "transform opacity-100 scale-100"
	                  To: "transform opacity-0 scale-95"
	              -->
	              <div 
	              	x-show="isOpen"
	                @click.away="isOpen = false"
	                @keydown.escape="isOpen = false"
	                x-ref="userMenu"
	                tabindex="-1"
	                class="
	                	origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none
	                	transition-transform"
	                role="menu"
	                aria-orientation="vertical"
	                aria-label="user menu">
	                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ auth()->user()->name}}</a>
	                <livewire:logout/>
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- END NOTIIF & USER BUTTON -->

	        <div class="-mr-2 flex md:hidden">
	          <!-- Mobile menu button -->
	          <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
	            <span class="sr-only">Open main menu</span>
	            <!--
	              Heroicon name: outline/menu

	              Menu open: "hidden", Menu closed: "block"
	            -->
	            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
	            </svg>
	            <!--
	              Heroicon name: outline/x

	              Menu open: "block", Menu closed: "hidden"
	            -->
	            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
	            </svg>
	          </button>
	        </div>
	      </div>
	    </div>

	    <!-- Mobile menu, show/hide based on menu state. -->
	    <div class="md:hidden" id="mobile-menu">
	      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
	        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
			<a href="/dashboard" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} active text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 block rounded-md text-sm font-medium {{'dashboard' == Request()->path() ? 'bg-gray-900 text-white' : ''}}" >Dashboard</a>

			<!-- GURU -->
			<a href="/ruang-guru" class="{{2 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'ruang-guru' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Ruang Guru</a>
			<!-- END GURU -->

			<!-- MURID -->
			<a href="/ruang-kelas" class="{{3 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'ruang-kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Kelas</a>
			<!-- END MURID -->

			<a href="/roles" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'roles' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Role</a>

			<a href="/guru" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'guru' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Guru</a>

			<a href="/siswa" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'siswa' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Siswa</a>

			<a href="/kelas" class="{{1 == auth()->user()->role_id ? '' : 'hidden'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-sm font-medium {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Kelas</a>

			<a href="/kelas" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} font-extrabold text-blue-500 hover:bg-blue-800 hover:text-white px-3 py-2 block rounded-md text-sm font-medium {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Daring!</a>
	      </div>
	      <livewire:logout/>
	  </nav>

	  <main>
	  	@livewireScripts
	  	<!-- CONTENT HERE -->
		<div class="mb-4">
			@yield('content')
		</div>

		<!-- END CONTENT HERE -->
	  </main>
	</div>

	<!-- SCRIPT -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
	<!-- END SCRIPT -->
</body>
</html>