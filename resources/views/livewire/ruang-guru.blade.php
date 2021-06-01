<div>
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold">
        <a wire:click.prevent="jadwal()" style="cursor: pointer;" class="text-gray-300 hover:text-gray-700 {{$switch == 1 ? '' : 'text-gray-900'}}">
        Jadwal</a>
        &emsp; | &emsp;
        <a wire:click.prevent="tugas()" style="cursor: pointer;" class="text-gray-300 hover:text-gray-700 {{$switch == 1 ? 'text-gray-900' : ''}}">
        Tugas</a>
      </h1>
    </div>
  </header>

  <!-- CONTENT -->
  	<!-- JADWAL -->
	<div class="{{$switch == 0 ? '' : 'hidden'}} md:container md:mx-auto mt-4 mb-5">  
	  <div class="flex flex-col">
	    <div class="mt-4 overflow-x-auto sm:-mx-6 lg:mx-8">
	      

	  		  <!-- SEARCH BOX -->
	  		  <div class="mt-1 mb-4 relative space-x-2 rounded-md shadow-sm flex left-3/4 w-1/4">
		    	  <!-- TAMBAH BUTTON -->
		    	  <button wire:click="showModalJadwal()"
		          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm text-white font-medium rounded-md bg-blue-500 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
		            Tambah
		          </button>
		    	  <!-- END TAMBAH BUTTON -->
	  		    <select wire:model="searchJadwal" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
	  		    	<option value="">Tampilkan semua</option>
	  		    	<option value="Senin">Senin</option>
	  		    	<option value="Selasa">Selasa</option>
	  		    	<option value="Rabu">Rabu</option>
	  		    	<option value="Kamis">Kamis</option>
	  		    	<option value="jum'at">Jum'at</option>
	  		    	<option value="Sabtu">Sabtu</option>
	  		    </select>
	  		  </div>
	  		  <!-- END SEARCH BOX -->

	    </div>
	    <div class="mb-2 overflow-x-auto sm:-mx-6 lg:mx-8">
	      <div class="pb-2 align-middle inline-block min-w-full sm:px-1 lg:px-1">


	        <!-- <livewire:edit-roles/> -->
	        <div class="md:w-full shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-2">
	          <table class="min-w-full divide-y divide-gray-200 relative">
	            <thead class="bg-gray-50">
	              <tr>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Hari
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Mulai
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Selesai
	                </th>
	                <th scope="col" class="w-1/6 sticky left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Kelas
	                </th>
	                <th scope="col" class="w-1/6 sticky left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Mata Pelajaran/Kuliah
	                </th>
	                <th scope="col" class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Aksi
	                </th>
	              </tr>
	            </thead>
	            <tbody class="bg-white divide-y divide-gray-200">
	              @foreach($jadwal as $data)
	              <tr>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->hari }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ substr($data->jam_mulai,0,5) }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ substr($data->jam_selesai,0,5) }}</div>
	                </td>
	                <td class="px-6 py-4 {{ $loop->iteration % 2 == 0 ? 'bg-gray-200' : 'bg-gray-300'}} whitespace-nowrap">
	                  <div class="text-sm font-bold text-gray-700">{{ $data->kelas }}</div>
	                </td>
	                <td class="px-6 py-4 {{ $loop->iteration % 2 == 0 ? 'bg-gray-200' : 'bg-gray-300'}} whitespace-nowrap">
	                  <div class="text-sm font-bold text-gray-700">{{ $data->matkul }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
	                  <button wire:click="editJadwal( {{ $data->id}} )" class="mr-2 text-green-600 hover:text-green-900">Edit</button>
	                  <button onclick="confirm('Yakin untuk menghapus?') || event.stopImmediatePropagation()" wire:click="deleteJadwal( {{ $data->id}} )" class="mr-2 text-red-600 hover:text-red-900">Hapus</button>
	                </td>
	              </tr>
	              @endforeach
	              <!-- More items... -->
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	    <div class="my-2 overflow-x-auto sm:-mx-8 lg:mx-8">{{ $jadwal->links()}}</div>
	  </div>
	  @if($isOpenJadwal==1)
	  	@include('livewire.createJadwal')
	  @endif
	</div>









	<!-- TUGAS -->
	<div class="{{$switch == 1 ? '' : 'hidden'}} md:container md:mx-auto mt-4 mb-5">  
	  <div class="flex flex-col">
	    <div class="mt-4 overflow-x-auto sm:-mx-6 lg:mx-8">
	      

	  		  <!-- SEARCH BOX -->
	  		  <div class="mt-1 mb-4 relative space-x-2 rounded-md shadow-sm flex left-3/4 w-1/4">
		    	  <!-- TAMBAH BUTTON -->
		    	  <button wire:click="showModalTugas()"
		          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm text-white font-medium rounded-md bg-blue-500 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
		            Tambah
		          </button>
		    	  <!-- END TAMBAH BUTTON -->
	  		    <input type="text" wire:model="searchTugas" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Cari tugas...">
	  		    <div class="absolute inset-y-0 right-3 pl-3 flex items-center pointer-events-none">
	  		      <span class="text-gray-500 sm:text-sm">
	  		        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
	  				</svg>
	  		      </span>
	  		    </div>
	  		  </div>
	  		  <!-- END SEARCH BOX -->

	    </div>
	    <div class="mb-2 overflow-x-auto sm:-mx-6 lg:mx-8">
	      <div class="pb-2 align-middle inline-block min-w-full sm:px-1 lg:px-1">


	        <!-- <livewire:edit-roles/> -->
	        <div class="md:w-full shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-2">
	          <table class="min-w-full divide-y divide-gray-200 relative">
	            <thead class="bg-gray-50">
	              <tr>
	              	<th scope="col" class="w-1/4 sticky left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Mata Pelajaran/Kuliah
	                </th>
	                <th scope="col" class="left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Kelas
	                </th>
	                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Tugas
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Selesai
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  File
	                </th>
	                <th scope="col" class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Aksi
	                </th>
	              </tr>
	            </thead>
	            <tbody class="bg-white divide-y divide-gray-200">
	              @foreach($tugas as $data)
	              <tr>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->matkul }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->kelas }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->tugas }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->akhir }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->akhir }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
	                  <button wire:click="edit( {{ $data->id}} )" class="mr-2 text-green-600 hover:text-green-900">Edit</button>
	                  <button wire:click="delete( {{ $data->id}} )" class="text-red-600 hover:text-red-900">Hapus</button>
	                </td>
	              </tr>
	              @endforeach
	              <!-- More items... -->
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	    <div class="my-2 overflow-x-auto sm:-mx-8 lg:mx-8">{{ $tugas->links()}}</div>
	  </div>
	  @if($isOpenTugas==1)
	  	@include('livewire.createTugas')
	  @endif
	</div>
  <!-- END CONTENT -->

</div>