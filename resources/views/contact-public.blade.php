<x-guest-layout title="Contact Us" class="bg-white" showNavigation>

<section id="contact">
    @if (session('success'))
    <div x-data="{open: true}" x-show="open" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="p-2 bg-pine-300 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-pine-500 uppercase px-2 py-1 text-xs font-bold mr-3">Sent</span>
        <span class="font-semibold mr-2 text-left flex-auto">Thank you for contacting us! We'll respond as soon as we can.</span>
        <button @click="open = false" class="fill-current opacity-75 h-4 w-4 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
    @endif
	<div class="bg-white pt-5 px-4 overflow-hidden sm:px-6 lg:px-8" style="margin-bottom: 70px;">
	  <div class="relative max-w-xl mx-auto">
	    <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404">
	      <defs>
	        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
	          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
	        </pattern>
	      </defs>
	      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
	    </svg>
	    <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404">
	      <defs>
	        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
	          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
	        </pattern>
	      </defs>
	      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
	    </svg>
	    <div class="text-center">
	      <h2 class="text-3xl leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
	        Get in touch with us!
	      </h2>
	    </div>
	    <div class="mt-12">
	      <form action="/contact/send" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8" x-init="$refs.submit.disabled = false">
	      	@csrf
	        <div>
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                <x-input value="{{ old('first_name') }}" class="mt-1 w-full py-3 px-4 transition ease-in-out duration-150" id="first_name" name="first_name" />
              @error('first_name')
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('first_name') }}
              </div>
              @enderror
            </div>

            {{-- honeypot to detect bots filling out the form --}}
            <div aria-hidden="true" class="totally-visible" tabindex="-1">
                <label for="a_password" class="block text-sm font-medium leading-5 text-gray-700">Confirm password</label>
                <x-input value="{{ old('a_password') }}" type="password" name="a_password" autocomplete="off" />
                @error('a_password')
                <div class="text-red-500 font-weight-bold text-center mt-3">
                    {{ $errors->first('a_password') }}
                </div>
                @enderror
            </div>

	        <div>
	            <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                <x-input value="{{ old('last_name') }}" id="last_name" name="last_name" class="mt-1 w-full py-3 px-4 transition ease-in-out duration-150" />
              @error('last_name')
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('last_name') }}
              </div>
              @enderror
            </div>

	        <div class="sm:col-span-2">
	            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                <x-input value="{{ old('email') }}" id="email" type="email" name="email" class="mt-1 py-3 px-4 w-full transition ease-in-out duration-150" />
              @error('email')
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('email') }}
              </div>
              @enderror
            </div>

	        <div class="sm:col-span-2">
	            <label for="message" class="block text-sm font-medium leading-5 text-gray-700">Message</label>
                <x-textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full transition ease-in-out duration-150">{{ old('message') }}</x-textarea>
              @error('message')
              <div class="text-red-500 font-weight-bold text-center mt-3">
                  {{ $errors->first('message') }}
              </div>
              @enderror
            </div>

	        <div class="sm:col-span-2">
	          <span class="w-full inline-flex rounded-md shadow-sm">
	            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-pine-600 hover:bg-pine-500 focus:outline-none focus:border-pine-700 focus:shadow-outline-pine active:bg-pine-700 transition ease-in-out duration-150" x-ref="submit">
	              Send email
	            </button>
	          </span>
	        </div>
          </form>
	    </div>
	  </div>
	</div>
</section>

</x-guest-layout>
