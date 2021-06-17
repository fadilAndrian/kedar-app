<!DOCTYPE html>
<html onclick="removeToast()">
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Scripts -->
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
    	.ribbon {
		    position: absolute;
		    font-size: 8px;
		    top: 0;
		    right: 0;
		    width: 100%;
		    height: 15px;
		    margin-top: -5px;
		  }

      [x-cloak] {
        display: none;
      }

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

		#toast {
			animation: toast .3s forwards;
		}

		@keyframes toast {
			from{
				opacity: 0;
				transform: translate(100px);
			}

			to{
				transform: translateX(0);
				opacity: 1;
			}
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

	              <button href="/daring" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} relative overflow-hidden font-extrabold text-blue-500 hover:bg-blue-800 hover:text-white px-6 py-4 rounded-md text-sm font-medium border border-blue-500 hover:border-blue-800 {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Daring!<div class="ribbon bg-blue-500 text-white whitespace-no-wrap px-2">coming soon</div></button>
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

			<a href="/daring" class="{{1 == auth()->user()->role_id ? 'hidden' : ''}} font-extrabold text-blue-500 hover:bg-blue-800 hover:text-white px-3 py-2 block rounded-md text-sm font-medium {{'kelas' == Request()->path() ? 'bg-gray-900 text-white' : ''}}">Daring!</a>
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
	

	<script>
	function removeToast(){
  		const toast = document.querySelector('#toast');
  		const toast2 = document.querySelector('#toast2');
  		toast.classList.add('hidden');
  		toast2.classList.add('hidden');
  	}

    const MONTH_NAMES = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    const MONTH_SHORT_NAMES = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    function app() {
      return {
        showDatepicker: false,
        datepickerValue: "",
        selectedDate: "2021-06-12",
        dateFormat: "DD-MM-YYYY",
        month: "",
        year: "",
        no_of_days: [],
        blankdays: [],
        initDate() {
          let today;
          if (this.selectedDate) {
            today = new Date(Date.parse(this.selectedDate));
          } else {
            today = new Date();
          }
          this.month = today.getMonth();
          this.year = today.getFullYear();
          this.datepickerValue = this.formatDateForDisplay(
            today
          );
        },
        formatDateForDisplay(date) {
          let formattedDay = DAYS[date.getDay()];
          let formattedDate = ("0" + date.getDate()).slice(
            -2
          ); // appends 0 (zero) in single digit date
          let formattedMonth = MONTH_NAMES[date.getMonth()];
          let formattedMonthShortName =
            MONTH_SHORT_NAMES[date.getMonth()];
          let formattedMonthInNumber = (
            "0" +
            (parseInt(date.getMonth()) + 1)
          ).slice(-2);
          let formattedYear = date.getFullYear();
          if (this.dateFormat === "DD-MM-YYYY") {
            return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
          }
          if (this.dateFormat === "YYYY-MM-DD") {
            return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
          }
          if (this.dateFormat === "D d M, Y") {
            return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
          }
          return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
          const d = new Date(this.year, this.month, date);
          return this.datepickerValue ===
            this.formatDateForDisplay(d) ?
            true :
            false;
        },
        isToday(date) {
          const today = new Date();
          const d = new Date(this.year, this.month, date);
          return today.toDateString() === d.toDateString() ?
            true :
            false;
        },
        getDateValue(date) {
          let selectedDate = new Date(
            this.year,
            this.month,
            date
          );
          this.datepickerValue = this.formatDateForDisplay(
            selectedDate
          );
          // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
          this.isSelectedDate(date);
          this.showDatepicker = false;
        },
        getNoOfDays() {
          let daysInMonth = new Date(
            this.year,
            this.month + 1,
            0
          ).getDate();
          // find where to start calendar day of week
          let dayOfWeek = new Date(
            this.year,
            this.month
          ).getDay();
          let blankdaysArray = [];
          for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
          }
          let daysArray = [];
          for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
          }
          this.blankdays = blankdaysArray;
          this.no_of_days = daysArray;
        },
      };
    }
  </script>
	<!-- END SCRIPT -->
</body>
<footer class="mt-36">
	
</footer>
</html>