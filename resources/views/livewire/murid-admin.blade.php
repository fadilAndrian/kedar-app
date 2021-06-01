<div>
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        Data Siswa
      </h1>
    </div>
  </header>


  <div class="flex flex-col">
    <div class="mt-4 overflow-x-auto sm:-mx-6 lg:mx-8">
      
  		  <!-- SEARCH BOX -->
  		  <div class="mt-1 mb-4 relative rounded-md shadow-sm flex left-3/4 w-1/4">
  		    <input type="text" wire:model="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Cari sesuatu...">
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
                <th scope="col" class="sticky left-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nama
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  NISN / NIM / NPM / NIK
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email
                </th>
                <th scope="col" class="w-12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Alamat
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  No. Tlp
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Institusi
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($murid as $data)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->nomor_identitas }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->alamat }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->no_tlp }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $data->sekolah }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
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
    <div class="my-2 overflow-x-auto sm:-mx-8 lg:mx-8">{{ $murid->links()}}</div>
  </div>
</div>