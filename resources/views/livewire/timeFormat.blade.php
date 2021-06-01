<!-- time picker -->
<div class="responsive flex inline-block">
  <div>
    <label for="about" class="mt-4 block text-md font-medium text-gray-700">
      Jam Masuk
    </label>
    <div class="mt-1">
      <!-- time picker -->
      <div class="mt-2 px-3 w-52 rounded-md shadow-sm border-gray-300 border-2 block">
        <div class="flex">
          <select required wire:model="jam_masuk" class="time self-center bg-transparent text-xl appearance-none border-none outline-none">
            <option hidden>--</option>
          @for($i=7; $i<22; $i++)
          <?php $zeropad = sprintf("%02d", $i) ?> 
            <option value="{{$zeropad}}">{{$zeropad}}</option>
          @endfor
          </select>
          <span class="text-xl mr-3 self-center"> :</span>
          <select required wire:model="menit_masuk" class="self-center bg-transparent text-xl appearance-none border-none outline-none mr-4">
            <option hidden>--</option>
            @for($i=0; $i<60; $i+=5)
            <?php $zeropad = sprintf("%02d", $i) ?> 
              <option value="{{$zeropad}}">{{$zeropad}}</option>
            @endfor
          </select>
        </div>
      </div>
      @error('masuk') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="ml-7">
    <label for="about" class="mt-4 block text-md font-medium text-gray-700">
      Jam Keluar
    </label>
    <div class="mt-1">
      <!-- time picker -->
      <div class="mt-2 px-3 w-52 rounded-md shadow-sm border-gray-300 border-2 block">
        <div class="flex">
          <select required wire:model="jam_keluar" class="self-center bg-transparent text-xl appearance-none border-none outline-none">
            <option hidden>--</option>
          @for($i=7; $i<24; $i++)
          <?php $zeropad = sprintf("%02d", $i) ?> 
            <option value="{{$zeropad}}">{{$zeropad}}</option>
          @endfor
          </select>
          <span class="text-xl mr-3 self-center"> :</span>
          <select required wire:model="menit_keluar" class="self-center bg-transparent text-xl appearance-none border-none outline-none mr-4">
            <option hidden>--</option>
            @for($i=0; $i<60; $i+=5)
            <?php $zeropad = sprintf("%02d", $i) ?> 
              <option value="{{$zeropad}}">{{$zeropad}}</option>
            @endfor
          </select>
        </div>
      </div>
      @error('keluar') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>
  </div>
</div>