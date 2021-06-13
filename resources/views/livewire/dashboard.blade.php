<div>

	<!-- Murid -->
	<div class="{{auth()->user()->role_id == 3 ? '' : 'hidden'}} md:container md:mx-auto mt-4 mb-5">  
	  <div class="flex flex-col">
	    <!-- content -->
	    <div class="mt-4 overflow-x-auto sm:-mx-6 lg:mx-8">
	    	<!-- SEARCH BOX -->
	  		  <div class="mt-1 mb-4 relative space-x-2 rounded-md shadow-sm flex left-3/4 w-1/4">
	  		    <select wire:model="searchjdwlmrd" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
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
	                  Pelajaran
	                </th>
	                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Waktu
	                </th>
	                <th scope="col" class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                  Pengajar
	                </th>
	              </tr>
	            </thead>
	            <tbody class="bg-white divide-y divide-gray-200">
	            @foreach($kelas as $data)
	              <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : '' }}">
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->hari }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->kelas }} - {{ $data->matkul }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ substr($data->jam_mulai,0,5) }} - {{ substr($data->jam_selesai,0,5) }}</div>
	                </td>
	                <td class="px-6 py-4 whitespace-nowrap">
	                  <div class="text-sm text-gray-900">{{ $data->name }}</div>
	                </td>
	              </tr>
	            @endforeach
	              <!-- More items... -->
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
    	<!-- end content -->
	  </div>
	</div>
	   
</div>