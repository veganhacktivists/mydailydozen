<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <div class="flex items-center">
            <div>
              <div class="flex items-center">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  Edit Group
                </h1>
                <form action="/groups/{{$group->id}}" method="POST">
                  @method('PUT')
                  @csrf
                  <div>
                      <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                          <input id="email" class="form-input block w-full sm:text-sm sm:leading-5" placeholder="you@example.com">
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
          <span class="shadow-sm rounded-md">
          </span>
          <span class="shadow-sm rounded-md">
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-lg leading-6 font-medium text-cool-gray-900">Daily Dozen</h2>

    </div>
  </div>
</x-master>
