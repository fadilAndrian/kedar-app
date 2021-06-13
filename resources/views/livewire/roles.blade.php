<div>
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        Data Role
      </h1>
    </div>
  </header>


  <div class="flex flex-col">
    <div class="my-2 overflow-x-auto sm:-mx-6 lg:mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <!-- <livewire:edit-roles/> -->
        <div class="py-3 text-right">
          <button wire:click="showModal()"
          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm text-white font-medium rounded-md bg-blue-500 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Tambah
          </button>
        </div>
            @if($isOpen )
              @include('livewire.createRole')
            @endif
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  No.
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Keterangan
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($roles as $role)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $role->role }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $role->keterangan }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                  <button 
                      wire:click="editRole( {{ $role->id}} )" 
                      class="mx-2 text-indigo-600 hover:text-indigo-900">
                    Edit
                  </button>
                  <button wire:click="hapusRole( {{ $role->id}} )" onclick="confirm('Yakin untuk menghapus?') || event.stopImmediatePropagation()" class="text-red-600 hover:text-red-900">Hapus</button>
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
</div>