@section('header', 'Edit food groups on the site.')
<x-master>
  <x-admin-header>Create a new serving size for {{ $group->name }}</x-admin-header>

  <div class="mx-auto mt-8 max-w-6xl px-4 sm:px-6 lg:px-8">
    @include('servingSizes.form', ['action' => "/groups/{$group->id}/serving-sizes"])
  </div>
</x-master>
