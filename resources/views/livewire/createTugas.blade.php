<div>

<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <form wire:submit.prevent="storeTugas()" enctype="multipart/form-data">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">
              Input Tugas
            </h3>

            <!-- form -->
              <div class="mt-6 overflow-y-auto">
                  <input wire:model="tugas_id" type="hidden">
                  </input>
                <label for="about" class="block text-md font-medium text-gray-700">
                  Kelas
                </label>
                <div class="mt-1">
                  <select required wire:model="kelas_id" type="text" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option hidden>Pilih kelas</option>
                    @foreach($ruang as $room)
                    <option value="{{ $room->id }}">{{ $room->kelas }}&emsp;-&emsp;{{$room->matkul}}</option>
                    @endforeach
                  </select>
                  @error('kelas_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <label for="about" class="mt-1 block text-md font-medium text-gray-700">
                  Deskripsi
                </label>
                <div class="mt-1">
                  <textarea required wire:model="deskripsi" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                  @error('deskripsi') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- datetime picker -->
                <label for="about" class="mt-3 block text-md font-medium text-gray-700">
                  Waktu pengumpulan
                </label>
                <div class="mt-1 w-1/3">
                  <input type="date" wire:model="deadline" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                <!-- end datetime picker -->

                <label for="about" class="mt-3 block text-md font-medium text-gray-700">
                  Unggah file (Soal, Panduan, dll)
                </label>
                <div class="mt-1">
                  <input type="text" disabled class="bg-white border-none text-sm font-normal text-gray-900 w-full" wire:model="namaFile">
                  <input wire:model="fileTugas" type="file" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" />
                </div>

              </div>
            <!-- END FORM -->

          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button wire:click.prevent="storeTugas()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
          Simpan
        </button>
        <button wire:click.prevent="hideModalTugas()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Batal
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
