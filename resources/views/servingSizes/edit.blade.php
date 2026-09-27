@section('header', 'Edit food groups on the site.')
<x-master>
  <x-admin-header>Edit Serving size for {{ $servingSize->group->name }}</x-admin-header>

  <div class="mx-auto mt-8 max-w-6xl px-4 sm:px-6 lg:px-8">
    @include('servingSizes.form', ['action' => "/groups/{$servingSize->group->id}/serving-sizes/{$servingSize->id}"])
  </div>
</x-master>
