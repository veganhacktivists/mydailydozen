@if ($errors->any())
    <div {{ $attributes->class('rounded-lg bg-red-50 p-4 ring-1 ring-red-200') }} role="alert">
        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
