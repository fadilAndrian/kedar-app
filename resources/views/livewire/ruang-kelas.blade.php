<div>

	<div class="{{$isMasuk==1 ? 'hidden' : ''}}">
		<header class="bg-white shadow">
		    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
		      <h1 class="text-3xl font-bold text-gray-900">
		        Ruang Kelas
		      </h1>
		    </div>
		  </header>

		  <!-- CONTAINER -->
		  <div class="md:container md:mx-auto mt-4 mb-5">
		  	<div class="mt-4 overflow-x-auto">
		  		<!-- CONTENT -->


		  		<!-- jadwal murid -->
		  		<div class="{{auth()->user()->role_id == 3 ? '' : 'hidden'}} md:container md:mx-auto mt-4 mb-10">  
				  <div class="flex flex-col">
				    <!-- content -->
				    <!-- Notif box -->
				    <div class="rounded-sm">
					  <div class="bg-gray-500 text-white font-bold rounded-t px-4 py-2 mx-8"> 
					    Papan Informasi
					  </div>
					  <div class="border border-t-0 border-gray-400 rounded-b bg-gray-100 px-4 py-3 mx-8 text-gray-700 max-h-44 overflow-y-auto">
					    <p>- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
					  </div>
					</div>
				    <!-- end Notif box -->

				    <div class="mt-4 overflow-x-auto sm:-mx-6 lg:mx-8">
				    	<!-- SEARCH BOX -->
				  		  <div class="mt-1 mb-4 relative space-x-2 rounded-md shadow-sm flex left-3/4 w-1/4">
				  		    <select wire:model="searchjdwlmrd" class="focus:ring-indigo-500 focus:border-indigo-500 h-10 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
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
				        <div class="md:w-full shadow overflow-y-auto max-h-72 border-b border-gray-200 sm:rounded-lg mb-2">
				          <table class="min-w-full divide-y divide-gray-200">
				            <thead class="bg-gray-50 sticky top-0">
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
				            @foreach($jdwlmrd as $data)
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
				<!-- end jadwal murid -->


				<!-- ruang-kelas guru -->
		  		<div class="grid grid-cols-3 {{ auth()->user()->role_id == 2 ? '' : 'hidden' }}">
			  		@if($jml!=0)
			  		@foreach($kls as $data)
					  <div class="card border w-96 relative flex-col mx-auto shadow-lg m-5">

					  	<!-- delete button -->
					  	<button onclick="confirm('Yakin untuk menghapus?') || event.stopImmediatePropagation()" wire:click="deleteKelas({{ $data->id }})" class="absolute -right-3 -top-3 inline-flex h-8 w-8 rounded-full bg-white border-1 border-white transition duration-150 ease-in-out">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-auto text-gray-400 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
					  	</button>
					  	<!-- end delete button -->

					    <img class="max-h-24 pb-1 w-full opacity-90 absolute top-0" style="z-index:-1" src="img/bgkelas.PNG" alt="" />
					    <div class="profile w-full flex m-3 ml-4 text-white">

					      @if(!empty($data->guru->profile_photo_path))
							<img class="h-28 w-28 p-1 bg-white rounded-full" src="{{url('storage/profile_photos/'.$data->guru->profile_photo_path)}}" alt="">
						  @else
					      <svg class="h-28 w-28 p-1 bg-white text-gray-300 rounded-full" fill="currentColor" viewBox="0 0 24 24">
							<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
						  </svg>
						  @endif

					      <div class="title mt-6 ml-3 font-bold flex flex-col {{ auth()->user()->role_id == 2 ? 'mt-11' : '' }}">
					      	
					      	<div class="name break-words {{ auth()->user()->role_id == 2 ? 'hidden' : '' }}">{{$data->guru->name}}</div>
					        <div class="name break-words">{{$data->matkul}}</div>
					        <!--  add [dark] class for bright background -->
					        <div class="add mt-4 font-semibold text-sm italic text-gray-800">{{$data->kelas}}</div>
					      </div>
					    </div>
					    <div class="buttons flex absolute bottom-0 font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">

					      <!-- editKelas -->
					      <div wire:click="editKelas({{ $data->id }})" class="add border rounded-l-2xl border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">
					      	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
							  <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
							  <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
							</svg>
					      </div>
					      <!-- end editKelas -->

					      <!-- masukKelas -->
					      <div wire:click="masukKelas({{ $data->id }})" class="add border rounded-r-2xl border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">
					      	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
							</svg>
					      </div>
					      <!-- end masukKelas -->

					    </div>
					  </div>

					@endforeach
					  <!-- TOMBOL TAMBAH KELAS -->
					  <button wire:click.prevent="showModal()" class="card border w-28 h-28 self-center hover:shadow-lg focus:shadow-sm relative flex-col mx-5 shadow-sm m-5 rounded-full">
						<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-auto w-auto text-gray-400 hover:text-gray-800 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					  </button>
					  @if($isOpen==1)
					  	@include('livewire.create-kelas')
					  @endif
					  	@if($isDelete==1)
					  		@include('livewire.deleteKelas')
					  	@endif
					  <!-- END TOMBOL TAMBAH KELAS -->
					@else
					  <div class="border border-none w-96 relative flex-col mx-auto shadow-md m-5">
					  	<div class="animate-pulse">
					  		
						    <div data-placeholder class="mb-2 h-20 w-full  overflow-hidden absolute top-0 bg-gray-400" style="z-index:-1">
						    	
						    </div>
						    <div class="profile w-full flex m-3 ml-4 text-white">
						    	<!-- <div data-placeholder class="mr-2 h-20 w-20 rounded-full overflow-hidden relative bg-gray-200">
				        
						        </div>
						        <div class="flex flex-col justify-between">
						            <div data-placeholder class="mb-2 h-5 w-40 overflow-hidden relative bg-gray-200">
						            
						            </div>
						            <div data-placeholder class="h-10 w-40 overflow-hidden relative bg-gray-200">
						            
						            </div>
						        </div> -->

							  <div class="rounded-full bg-gray-200 w-28 h-28 p-1"></div>
						      <div class="title mt-11 ml-3 font-bold flex flex-col">
						        <div data-placeholder class="mb-2 h-5 w-40 overflow-hidden relative bg-gray-200 rounded">
						        	
						        </div>
						        <!--  add [dark] class for bright background -->
						        <div class="h-4 bg-gray-400 rounded w-3/4">
						        	
						        </div>
						      </div>
						    </div>

					  	</div>
					  </div>

					  <!-- TOMBOL TAMBAH KELAS -->
					  <button wire:click.prevent="showModal()" class="card border w-28 h-28 self-center hover:shadow-lg relative flex-col mx-5 shadow-sm m-5 rounded-full">
					  	<span class="animate-ping absolute right-0 inline-flex h-3 w-3 rounded-full bg-yellow-500 opacity-85"></span>
						<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-auto w-auto text-gray-400 hover:text-gray-800 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					  </button>
					  @if($isOpen==1)
					  	@include('livewire.create-kelas')
					  @endif
					  <!-- END TOMBOL TAMBAH KELAS -->
					@endif		
				</div>
				<!-- end ruang-kelas guru -->



				<!-- ruang-kelas murid -->
				<div class="grid grid-cols-3 {{ auth()->user()->role_id == 2 ? 'hidden' : '' }}">
			  		@if($jmlmrd!=0)
				  		@foreach($klsmrd as $data)
						  <div class="card border w-96 relative flex-col mx-auto shadow-lg m-5">

						    <img class="max-h-24 pb-1 w-full opacity-90 absolute top-0" style="z-index:-1" src="img/bgkelas.png" alt="" />
						    <div class="profile w-full flex m-3 ml-4 text-white">

						      @if(!empty($data->kelas->guru->profile_photo_path))
								<img class="h-28 w-28 p-1 bg-white rounded-full" src="{{url('storage/profile_photos/'.$data->kelas->guru->profile_photo_path)}}" alt="">
							  @else
						      <svg class="h-28 w-28 p-1 bg-white text-gray-300 rounded-full" fill="currentColor" viewBox="0 0 24 24">
								<path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
							  </svg>
							  @endif

						      <div class="title mt-6 ml-3 font-bold flex flex-col">
						      	
						      	<div class="name break-words {{ auth()->user()->role_id == 2 ? 'hidden' : '' }}">{{$data->kelas->guru->name}}</div>
						        <div class="name break-words">{{$data->kelas->matkul}}</div>
						        <!--  add [dark] class for bright background -->
						        <div class="add mt-4 font-semibold text-sm italic text-gray-800">{{$data->kelas->kelas}}</div>
						      </div>
						    </div>
						    <div class="buttons flex absolute bottom-0 font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">

						      <!-- masukKelas -->
						      <div wire:click="masukKelasMurid({{ $data->id }})" class="add border rounded-lg border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">
						      	<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
								</svg>
						      </div>
						      <!-- end masukKelas -->

						    </div>
						  </div>
						@endforeach

					  <!-- TOMBOL TAMBAH KELAS -->
					  <button wire:click.prevent="showModalMasuk()" class="card border w-28 h-28 self-center hover:shadow-lg focus:shadow-sm relative flex-col mx-5 shadow-sm m-5 rounded-full">
						<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-auto w-auto text-gray-400 hover:text-gray-800 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					  </button>
					  @if($isOpenMasuk==1)
					  	@include('livewire.modalMasukKelas')
					  @endif
					  	@if($isDelete==1)
					  		@include('livewire.deleteKelas')
					  	@endif
					  <!-- END TOMBOL TAMBAH KELAS -->
					@else
					  <div class="border border-none w-96 relative flex-col mx-auto shadow-md m-5">
					  	<div class="animate-pulse">
					  		
						    <div data-placeholder class="mb-2 h-20 w-full  overflow-hidden absolute top-0 bg-gray-400" style="z-index:-1">
						    	
						    </div>
						    <div class="profile w-full flex m-3 ml-4 text-white">
						    	<!-- <div data-placeholder class="mr-2 h-20 w-20 rounded-full overflow-hidden relative bg-gray-200">
				        
						        </div>
						        <div class="flex flex-col justify-between">
						            <div data-placeholder class="mb-2 h-5 w-40 overflow-hidden relative bg-gray-200">
						            
						            </div>
						            <div data-placeholder class="h-10 w-40 overflow-hidden relative bg-gray-200">
						            
						            </div>
						        </div> -->

							  <div class="rounded-full bg-gray-200 w-28 h-28 p-1"></div>
						      <div class="title mt-11 ml-3 font-bold flex flex-col">
						        <div data-placeholder class="mb-2 h-5 w-40 overflow-hidden relative bg-gray-200 rounded">
						        	
						        </div>
						        <!--  add [dark] class for bright background -->
						        <div class="h-4 bg-gray-400 rounded w-3/4">
						        	
						        </div>
						      </div>
						    </div>

					  	</div>
					  </div>

					  <!-- TOMBOL TAMBAH KELAS -->
					  <button wire:click.prevent="showModalMasuk()" class="card border w-28 h-28 self-center hover:shadow-lg relative flex-col mx-5 shadow-sm m-5 rounded-full">
					  	<span class="animate-ping absolute right-0 inline-flex h-3 w-3 rounded-full bg-yellow-500 opacity-85"></span>
						<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-auto w-auto text-gray-400 hover:text-gray-800 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					  </button>
					  @if($isOpenMasuk==1)
					  	@include('livewire.modalMasukKelas')
					  @endif
					  <!-- END TOMBOL TAMBAH KELAS -->
					@endif		
				</div>
				<!-- end ruang-kelas murid -->



		  		<!-- END CONTENT -->
		  	</div>
		  </div>

	</div>
		@if($isMasuk==1)
			@include('livewire.masuk-kelas')
		@endif

	<!-- ALERT -->
	  @if(session()->has('succes'))
		<div onclick="removeToast()" id="toast" style="cursor: pointer;"
		  class="bg-blue-200 border-l-4 border-blue-500 text-blue-700 px-8 py-1 fixed top-20 right-0" role="alert">
		  <p class="font-bold">Hey, Kamu!</p>
		  <p>{{ session('succes') }}</p>
		</div>
	  @endif 
	<!-- END ALERT -->


</div>
