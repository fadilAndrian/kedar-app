<div class="mb-10">
  <form action="" method="POST">
	<label for="about" class="block text-md font-bold text-gray-700">
		Role
	</label>
	<div class="mt-1">
		<input wire:model="role"
		id="about" type="text" name="role" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
		</input>
	</div>

	<label for="about" class="mt-4 block text-md font-bold text-gray-700">
		Keterangan
	</label>
	<div class="mt-1">
		<textarea wire:model="keterangan" id="about" name="keterangan" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
		</textarea>
	</div>

	<div class="px-4 py-3 text-right sm:px-6">
		<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
		  Simpan
		</button>
	</div>
  </form>
</div>	