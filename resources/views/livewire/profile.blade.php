<div>

	<header class="bg-white shadow">
		<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
		  <h1 class="text-3xl font-bold text-gray-900">
		    Profil
		  </h1>
		</div>
	</header>

<div class="md:container md:mx-auto mt-4 mb-5">

	<!-- PERSONAL INFO -->
	<div class="mt-10 sm:mt-0">
	  <div class="md:grid md:grid-cols-3 md:gap-6">
	    <div class="md:col-span-1">
	      <div class="px-4 sm:px-0">
	        <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi</h3>
	        <p class="mt-1 text-sm text-gray-600">
	          Data Diri
	        </p>
	      </div>
	    </div>
	    <div class="mb-5 md:mt-0 md:col-span-2">
	      <form wire:submit.prevent="store()" method="POST">
	        <div class="shadow overflow-hidden sm:rounded-md">
	          <div class="px-4 py-5 bg-white sm:p-6">
	            <div class="grid grid-cols-6 gap-6">
	              
	              <input hidden type="text" wire:model="user_id">

	              <div class="col-span-6 sm:col-span-3 mb-2">
	                <label for="first_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
	                <h3 class="{{$isOpen == true ? 'hidden' : ''}} text-2xl font-medium text-gray-900">{{ $data->name}}</h3>
	                <input type="text" wire:model="name" id="first_name" autocomplete="given-name" class="{{$isOpen == false ? 'hidden' : ''}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
	              </div>

	              <div class="col-span-3">
	                <label for="street_address" class="block text-sm font-medium text-gray-700">Nama Institusi</label>
	                <h3 class="{{$isOpen == true ? 'hidden' : ''}} text-2xl font-medium text-gray-900">{{ $data->sekolah}}</h3>
	                <input type="text" wire:model="sekolah" id="first_name" autocomplete="given-name" class="{{$isOpen == false ? 'hidden' : ''}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
	              </div>

	              <div class="col-span-6 sm:col-span-3 mb-2">
	                <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
	                <h3 class="{{$isOpen == true ? 'hidden' : ''}} text-2xl font-medium text-gray-900">{{ $data->no_tlp}}</h3>
	                <input type="text" wire:model="no_tlp" id="first_name" autocomplete="given-name" class="{{$isOpen == false ? 'hidden' : ''}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
	              </div>

	              <div class="col-span-6 sm:col-span-3">
	                <label class="block text-sm font-medium text-gray-700">Nomor Identitas</label>
	                <h3 class="{{$isOpen == true ? 'hidden' : ''}} text-2xl font-medium text-gray-900">{{ $data->nomor_identitas}}</h3>
	                <input type="text" wire:model="nik" id="first_name" autocomplete="given-name" class="{{$isOpen == false ? 'hidden' : ''}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
	              </div>

	              <div class="col-span-6 sm:col-span-6">
	                <label for="country" class="block text-sm font-medium text-gray-700">Alamat</label>
	                <h3 class="{{$isOpen == true ? 'hidden' : ''}} text-2xl font-medium text-gray-900">{{ $data->alamat}}</h3>
	                <textarea wire:model="alamat" id="first_name" autocomplete="given-name" class="{{$isOpen == false ? 'hidden' : ''}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
	              </div>
	            </div>
	          </div>
	          <div class="{{$isOpen == true ? 'hidden' : ''}} px-4 py-3 bg-gray-50 text-right sm:px-6">
	            <a wire:click="edit({{auth()->user()->id}})" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
	              Edit
	            </a>
	          </div>

	          <div class="{{$isOpen == false ? 'hidden' : ''}} px-4 py-3 bg-gray-50 text-right sm:px-6">
	            <button wire:click.prevent="isClosed()" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mx-2">
	              Batal
	            </button>

	            <button wire:click.prevent="store()" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
	              Simpan
	            </button>
	          </div>

	        </div>
	      </form>
	    </div>
	  </div>
	</div>


	<div class="mt-10 sm:mt-0">
	  <div class="md:grid md:grid-cols-3 md:gap-6">
	    <div class="md:col-span-1">
	      <div class="px-4 sm:px-0">
	        <h3 class="text-lg font-medium leading-6 text-gray-900">Foto Profil</h3>
	        <p class="mt-1 text-sm text-gray-600">
	          Avatar
	        </p>
	      </div>
	    </div>
	    <div class="mb-5 md:mt-0 md:col-span-2">
	      <form enctype="multipart/form-data" wire:submit.prevent="storeFoto()" method="POST">
	        <div class="shadow overflow-hidden sm:rounded-md">
	          <div class="px-4 py-5 bg-white sm:p-6">
	            <div class="grid grid-cols-6 gap-6">
	              
	              <input hidden type="text" wire:model="user_id">

	            	<div class="col-span-4">
					  <label class="block text-sm font-medium text-gray-700">
					    Foto
					  </label>
					  <div class="mt-1 flex items-center">
					    <span class="inline-block h-40 w-40 rounded-full overflow-hidden bg-gray-100">
					    	@if(!empty($data->profile_photo_path))
					    		<img src="{{url('storage/profile_photos/'.$data->profile_photo_path)}}" class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
					    	@else
					      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
					        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
					      </svg>
					    	@endif
					    </span>
					    <div>
					    	<input value="" wire:model="poto" type="file" required="true" class="{{$isOpenFoto == false ? 'hidden' : ''}} ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						    @error('poto')
						    	<br><span class="error text-red-500 ml-5 pl-3">{{ $message }}</span>
						    @enderror
					    </div>
					  </div>
					</div>

	            </div>
	          </div>
	          <div class="{{$isOpenFoto == true ? 'hidden' : ''}} px-4 py-3 bg-gray-50 text-right sm:px-6">
	          	@if(!empty($data->profile_photo_path))
		            <a wire:click.prevent="deleteFoto({{auth()->user()->id}})" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mx-2">
		              Hapus
		            </a>
		    	@endif
	            <a wire:click="editFoto({{auth()->user()->id}})" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
	              Edit
	            </a>
	          </div>

	          <div class="{{$isOpenFoto == false ? 'hidden' : ''}} px-4 py-3 bg-gray-50 text-right sm:px-6">
	            <button wire:click.prevent="isClosedFoto()" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mx-2">
	              Batal
	            </button>

	            <button wire:click.prevent="storeFoto()" style="cursor: pointer;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
	              Simpan
	            </button>
	          </div>

	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<!-- END PERSONAL INFO -->
</div>

</div>
