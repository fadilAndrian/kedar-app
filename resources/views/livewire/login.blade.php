
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-8 w-auto" src="img/kedarlogo.png" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Yuk, masuk!
      </h2>
    </div>
    <form class="mt-8 space-y-6" wire:submit.prevent="login()" method="POST">
      <input type="hidden" name="remember" value="true">
      @if(session()->has('error'))
        <div class="bg-blue-100 border border-blue-500 text-blue-700 -mb-2 py-2 px-4" role="alert">
          <p class="font-bold">Login gagal!</p>
          <p class="text-sm">{{ session('error') }}</p>
        </div>
      @endif
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Email</label>
          <input id="email-address" wire:model="email" type="email" autocomplete="email" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
          @error('email')
            <span class="error text-red-500">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" wire:model="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
        </div>
        @error('password')
          <span class="error text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember_me" class="ml-2 block text-sm text-gray-900">
            Ingat saya
          </label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Lupa password?
          </a>
        </div>
      </div>

      <div>
        <button wire:click.prevent="login()" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Masuk
        </button>
      </div>
    </form>
    <div class="text-sm">
      <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
        Belum mendaftar?
      </a>
    </div>
  </div>
</div>
