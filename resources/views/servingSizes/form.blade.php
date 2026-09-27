<form action="{{ $action }}" method="POST" class="max-w-xl space-y-5">
  @csrf
  @isset($servingSize)
    @method('PUT')
  @endisset
  @foreach (['size_metric' => 'Metric', 'size_imperial' => 'Imperial'] as $field => $label)
    <div>
      <x-label for="{{ $field }}" :value="$label" />
      <x-input id="{{ $field }}" name="{{ $field }}" class="mt-1 block w-full" value="{{ old($field, isset($servingSize) ? $servingSize->$field : '') }}" />
      <x-input-error :for="$field" class="mt-2" />
    </div>
  @endforeach
  <x-button>Submit</x-button>
</form>
