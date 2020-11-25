@section('header', 'Edit food groups on the site.')
<x-master>
    <!-- Page header -->
    <div class="bg-white shadow">
        <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center">
                        <div>
                            <div class="flex items-center">
                                <h1
                                    class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                                    Edit Group
                                </h1>
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
            <h2 class="text-lg leading-6 font-medium text-cool-gray-900">Edit Card</h2>
            <form action="/groups/{{$group->id}}" method="POST">
                @method('PUT')
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                    <div class="my-5 relative rounded-md shadow-sm">
                        <input id="name" name="name" class="form-input block w-full sm:text-sm sm:leading-5"
                            value="{{ $group->name }}">
                    </div>
                    <label for="icon_location" class="block text-sm font-medium leading-5 text-gray-700">Icon
                        Location</label>
                    <div class="my-5 relative rounded-md shadow-sm">
                        <input id="icon_location" name="icon_location"
                            class="form-input block w-full sm:text-sm sm:leading-5" value="{{ $group->icon_location }}">
                    </div>
                    <label for="banner_location" class="block text-sm font-medium leading-5 text-gray-700">Banner
                        Location</label>
                    <div class="my-5 relative rounded-md shadow-sm">
                        <input id="banner_location" name="banner_location"
                            class="form-input block w-full sm:text-sm sm:leading-5"
                            value="{{ $group->banner_location }}">
                    </div>
                    <label for="per_day" class="block text-sm font-medium leading-5 text-gray-700">Per Day</label>
                    <div class="my-5 relative rounded-md shadow-sm">
                        <input id="per_day" name="per_day" class="form-input block w-full sm:text-sm sm:leading-5"
                            value="{{ $group->per_day }}">
                    </div>
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
                            Submit
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</x-master>
