@section('header', 'Edit food groups on the site.')
<x-master>
  <x-admin-header>Edit Group</x-admin-header>

  <div class="mx-auto mt-8 max-w-6xl space-y-10 px-4 sm:px-6 lg:px-8">
    <form action="/groups/{{ $group->id }}" method="POST" class="max-w-xl space-y-5">
      @method('PUT')
      @csrf
      @foreach (['name' => 'Name', 'subtitle' => 'Subtitle', 'icon_location' => 'Icon Location', 'banner_location' => 'Banner Location', 'per_day' => 'Per Day'] as $field => $label)
        <div>
          <x-label for="{{ $field }}" :value="$label" />
          <x-input id="{{ $field }}" name="{{ $field }}" class="mt-1 block w-full" value="{{ old($field, $group->$field) }}" />
          <x-input-error :for="$field" class="mt-2" />
        </div>
      @endforeach
      <x-button>Submit</x-button>
    </form>

    <div>
      <x-label value="Serving sizes" />
      <table class="mt-2 w-full max-w-xl table-fixed text-left">
        <thead>
          <tr class="border-b-2 border-gray-300 text-pine-700">
            <th class="px-6 py-3">Metric</th>
            <th class="px-6 py-3">Imperial</th>
            <th class="px-6 py-3 text-center">Edit</th>
            <th class="px-6 py-3 text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($group->servingSizes as $servingSize)
            <tr class="border-b border-gray-200">
              <td class="px-6 py-3">{{ $servingSize->size_metric }}</td>
              <td class="px-6 py-3">{{ $servingSize->size_imperial }}</td>
              <td class="text-center">
                <a href="/groups/{{ $group->id }}/serving-sizes/{{ $servingSize->id }}/edit" aria-label="Edit"
                  class="inline-flex rounded-full p-1.5 hover:bg-gray-100 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500">
                  <x-icons.pencil class="size-6" />
                </a>
              </td>
              <td class="text-center text-red-600">
                <form id="delete-form-{{ $servingSize->id }}" action="/groups/{{ $group->id }}/serving-sizes/{{ $servingSize->id }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this? This cannot be undone.')">
                  @method('DELETE')
                  @csrf
                  <button type="submit" aria-label="Delete"
                    class="inline-flex rounded-full p-1.5 hover:bg-red-50 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-red-500">
                    <x-icons.trash />
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/groups/{{ $group->id }}/serving-sizes/create" class="mt-2 inline-block py-2 font-medium">Add a new serving size...</a>
    </div>

    <div>
      <h2 class="text-lg font-semibold text-cool-gray-900">Edit Card More Information</h2>
      <div class="mt-3 flex flex-wrap items-start gap-3">
        @include('components.more-info-dropdown')
        @if ($selectedDetail)
          <a href="/groups/{{ $group['id'] }}/edit/"
            class="inline-flex items-center rounded-lg bg-pine-600 px-5 py-2.5 text-sm font-semibold text-white shadow-xs transition hover:bg-pine-700 focus:outline-hidden focus-visible:ring-2 focus-visible:ring-pine-500 focus-visible:ring-offset-2">
            Add
          </a>
        @endif
        @if ($detailTypes->count() > 1 && $selectedDetail)
          <form method="POST" action="{{ route('detail.destroy', $selectedDetail->id) }}"
            onsubmit="return confirm('Are you sure you want to delete this? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <input type="hidden" name="groupId" value="{{ $group->id }}">
            <x-danger-button type="submit">Delete</x-danger-button>
          </form>
        @endif
      </div>

      <form method="POST" action="{{ $selectedDetail ? route('detail.update', $selectedDetail->id) : route('detail.store') }}" class="mt-4 max-w-xl space-y-5">
        @csrf
        @method($selectedDetail ? 'PUT' : 'POST')
        <div>
          <x-label for="detail_name" value="Name" />
          <x-input id="detail_name" type="text" name="name" class="mt-1 block w-full" value="{{ $selectedDetail?->name ?? old('name') }}" />
          <x-input-error for="name" class="mt-2" />
        </div>
        <div>
          <x-label for="detail_video" value="Video Link" />
          <x-input id="detail_video" name="video" class="mt-1 block w-full" value="{{ $selectedDetail?->video ?? old('video') }}" />
          <x-input-error for="video" class="mt-2" />
        </div>
        <div>
          <x-label for="detail_info" value="Information" />
          <x-textarea id="detail_info" name="info" rows="8" class="mt-1 block w-full">{{ $selectedDetail?->info ?? old('info') }}</x-textarea>
          <x-input-error for="info" class="mt-2" />
        </div>
        <input type="hidden" name="groupId" value="{{ $group->id }}">
        <x-button name="submit">Submit</x-button>
      </form>
    </div>
  </div>
</x-master>
