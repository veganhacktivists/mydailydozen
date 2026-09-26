@props(['email' => null])

@php
    $fields = [
        ['name' => 'first_name', 'label' => 'First name', 'type' => 'text', 'autocomplete' => 'given-name', 'span' => ''],
        ['name' => 'last_name', 'label' => 'Last name', 'type' => 'text', 'autocomplete' => 'family-name', 'span' => ''],
        ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'autocomplete' => 'email', 'span' => 'sm:col-span-2'],
    ];
    $invalid = fn (string $name) => $errors->has($name) ? 'border-red-400' : '';
@endphp

<div class="overflow-hidden px-4 pb-16 pt-6 sm:px-6 lg:px-8">
    {{ $slot }}
    <div class="relative mx-auto max-w-xl">
        @foreach (['left' => 'right-full translate-x-1/2', 'right' => 'left-full -translate-x-1/2'] as $side => $position)
            <svg class="absolute top-1/2 hidden -translate-y-1/2 md:block {{ $position }}" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="contact-dots-{{ $side }}" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#contact-dots-{{ $side }})" />
            </svg>
        @endforeach

        <div class="relative rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-10">
            @if (session('success'))
                <div x-data="{ open: true }" x-show="open" x-transition.opacity.duration.300ms role="status"
                    class="mb-8 flex items-center gap-3 rounded-xl bg-pine-50 p-3 text-pine-800 ring-1 ring-pine-200">
                    <span class="rounded-full bg-pine-600 px-2 py-1 text-xs font-bold uppercase leading-none text-white">Sent</span>
                    <span class="flex-auto font-semibold">Thank you for contacting us! We'll respond as soon as we can.</span>
                    <button type="button" @click="open = false" aria-label="Dismiss"
                        class="rounded-md px-2 text-xl leading-none text-pine-700 hover:bg-pine-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500">×</button>
                </div>
            @endif

            <form action="/contact/send" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6"
                x-data="{ sending: false }" @submit="sending = true" @pageshow.window="sending = false">
                @csrf

                @foreach ($fields as $field)
                    <div @class($field['span'])>
                        <x-label for="{{ $field['name'] }}" :value="$field['label']" />
                        <x-input id="{{ $field['name'] }}" name="{{ $field['name'] }}" type="{{ $field['type'] }}"
                            autocomplete="{{ $field['autocomplete'] }}"
                            value="{{ old($field['name'], $field['name'] === 'email' ? $email : null) }}"
                            :aria-invalid="$errors->has($field['name']) ? 'true' : null"
                            :aria-describedby="$errors->has($field['name']) ? $field['name'].'-error' : null"
                            class="mt-1 block w-full px-4 py-3 {{ $invalid($field['name']) }}" />
                        <x-input-error :for="$field['name']" id="{{ $field['name'] }}-error" class="mt-2" />
                    </div>
                @endforeach

                {{-- honeypot to detect bots filling out the form --}}
                <div aria-hidden="true" class="totally-visible" tabindex="-1">
                    <label for="a_password">Confirm password</label>
                    <x-input id="a_password" type="password" name="a_password" autocomplete="off" />
                </div>

                <div class="sm:col-span-2">
                    <x-label for="message" value="Message" />
                    <x-textarea id="message" name="message" rows="5"
                        :aria-invalid="$errors->has('message') ? 'true' : null"
                        :aria-describedby="$errors->has('message') ? 'message-error' : null"
                        class="mt-1 block w-full px-4 py-3 {{ $invalid('message') }}">{{ old('message') }}</x-textarea>
                    <x-input-error for="message" id="message-error" class="mt-2" />
                </div>

                <div class="sm:col-span-2">
                    <button type="submit" x-bind:disabled="sending"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-pine-600 px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-pine-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-pine-500 focus-visible:ring-offset-2 active:bg-pine-800 disabled:cursor-wait disabled:opacity-70">
                        Send email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
