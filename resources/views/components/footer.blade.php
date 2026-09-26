<footer>
    <div class="py-4 flex flex-col md:flex-row w-fit mx-auto text-gray-500 text-center md:divide-x first:[&>*]:pl-0 last:[&>*]:pr-0 [&>*]:px-2">
        <div>
            Get the <x-link href="https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802">iOS</x-link>
            or
            <x-link href="https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen">Android app</x-link>
        </div>
        <div>
            Visit <x-link href="https://nutritionfacts.org/">NutritionFacts.org</x-link>
        </div>
        @if(config('mail.recipient'))
        <div>
            <x-link href="mailto:{{ config('mail.recipient') }}">Get in touch!</x-link>
        </div>
        @endif
    </div>
</footer>