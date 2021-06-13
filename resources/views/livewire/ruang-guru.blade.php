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
	<div class="{{$switch == 0 ? '' : 'hidden'}} md:container md:mx-auto mt-4 relative"> 
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
	    <div class="overflow-x-auto sm:-mx-6 lg:mx-8">
	      <div class="align-middle inline-block min-w-full sm:px-1 lg:px-1">


	        <!-- <livewire:edit-roles/> -->
	        <div class="md:w-full shadow overflow-y-auto max-h-80 border-b border-gray-200 sm:rounded-lg">
	          <table class="min-w-full divide-y divide-gray-200">
	            <thead class="bg-gray-50 sticky top-0">
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
	                <td class="px-6 py-3.5 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->hari }}</div>
	                </td>
	                <td class="px-6 py-3.5 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ substr($data->jam_mulai,0,5) }}</div>
	                </td>
	                <td class="px-6 py-3.5 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ substr($data->jam_selesai,0,5) }}</div>
	                </td>
	                <td class="px-6 py-3.5 {{ $loop->iteration % 2 == 0 ? 'bg-gray-200' : 'bg-gray-300'}} whitespace-nowrap">
	                  <div class="text-sm font-bold text-gray-700">{{ $data->kelas }}</div>
	                </td>
	                <td class="px-6 py-3.5 {{ $loop->iteration % 2 == 0 ? 'bg-gray-200' : 'bg-gray-300'}} whitespace-nowrap">
	                  <div class="text-sm font-bold text-gray-700">{{ $data->matkul }}</div>
	                </td>
	                <td class="px-6 py-3.5 whitespace-nowrap text-left text-xs font-light">
	                  <button wire:click="editJadwal( {{ $data->id}} )" class="mr-2 text-white py-1 px-2 rounded-xl bg-green-600 hover:bg-green-500">Edit</button>
	                  <button onclick="confirm('Yakin untuk menghapus?') || event.stopImmediatePropagation()" wire:click="deleteJadwal( {{ $data->id}} )" class="text-white py-1 px-2 rounded-xl bg-red-600 hover:bg-red-500">Hapus</button>
	                </td>
	              </tr>
	              @endforeach
	              <!-- More items... -->
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	  </div>
	  @if($isOpenJadwal==1)
	  	@include('livewire.createJadwal')
	  @endif

	  @if(session()->has('succes'))
		<div onclick="removeToast()" id="toast" style="cursor: pointer;" 
		  class="bg-blue-200 border-l-4 border-blue-500 text-blue-700 px-8 py-1 fixed top-20 right-0" role="alert">
		  <p class="font-bold">Hey, Kamu!</p>
		  <p>{{ session('succes') }}</p>
		</div>
	  @endif 
	</div>









	<!-- TUGAS -->
	<div class="{{$switch == 1 ? '' : 'hidden'}} md:container md:mx-auto mt-4 mb-5 relative">  
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
	  		    <select wire:model="searchTugas" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
	  		    	<option value="">Tampilkan semua</option>
	  		    	@foreach($ruang as $kls)
	  		    	<option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
	  		    	@endforeach
	  		    </select>
	  		  </div>
	  		  <!-- END SEARCH BOX --> 

	    </div>
	    <div class="mb-2 overflow-x-auto sm:-mx-6 lg:mx-8">
	      <div class="pb-2 align-middle inline-block min-w-full sm:px-1 lg:px-1">


	        <!-- <livewire:edit-roles/> -->
	        <div class="md:w-full shadow overflow-y-auto max-h-96 border-b border-gray-200 sm:rounded-lg mb-2">
	          <table class="min-w-full divide-y divide-gray-200 relative">
	            <thead class="bg-gray-50 sticky top-0">
	              <tr>
	                <th scope="col" class="left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Kelas
	                </th>
	              	<th scope="col" class="w-1/4 sticky left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Mata Pelajaran/Kuliah
	                </th>
	                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Tugas
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Pengumpulan
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
	              <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : '' }}">
	                <td class="px-6 py-2 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->kelas }}</div>
	                </td>
	                <td class="px-6 py-2 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->matkul }}</div>
	                </td>
	                <td class="px-6 py-2 whitespace-pre-line">
	                  <div class="text-sm text-gray-900">{{ $data->tugas }}</div>
	                </td>
	                <td class="px-6 py-2 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">
	                  	<?php 
	                  		$bln = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

	                  		$x=substr($data->akhir,5,2);
	                  		$y=str_replace('0', '', $x);
							$bulan = $bln[ $y-1 ];
	                  	 ?>
	                  	{{substr($data->akhir,8,2)}} <?php echo $bulan; ?> {{substr($data->akhir,0,4)}}</div>
	                </td>
	                <td class="px-6 py-2 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->profile_photo_path }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap text-left text-xs font-light">
	                  <button wire:click="editTugas( {{ $data->id}} )" class="mr-2 text-white py-1 px-2 rounded-xl bg-green-600 hover:bg-green-500">Edit</button>
	                  <button onclick="confirm('Yakin mau cancel?') || event.stopImmediatePropagation()" wire:click="deleteTugas( {{ $data->id}} )" class="text-white py-1 px-2 rounded-xl bg-red-600 hover:bg-red-500">Cancel</button>
	                </td>
	              </tr>
	              @endforeach
	              <!-- More items... -->
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	  </div>
	  @if($isOpenTugas==1)
	  	@include('livewire.createTugas')
	  @endif

	  @if(session()->has('succes'))
		<div onclick="removeToast()" id="toast2" style="cursor: pointer;"
		  class="bg-blue-200 border-l-4 border-blue-500 text-blue-700 px-8 py-1 fixed top-20 right-0" role="alert">
		  <p class="font-bold">Hey, Kamu!</p>
		  <p>{{ session('succes') }}</p>
		</div>
	  @endif 
	</div>
  <!-- END CONTENT -->

</div>