<footer>
    <div class="py-4 flex flex-col md:flex-row w-fit mx-auto text-gray-400 text-center md:divide-x first:[&>*]:pl-0 last:[&>*]:pr-0 [&>*]:px-2">
        <div>
            Get the <x-link href="https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802">iOS</x-link>
            or
            <x-link href="https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen">Android app</x-link>
        </div>
        <div>
            Visit <x-link href="https://nutritionfacts.org/">NutritionFacts.org</x-link>
        </div>
        @if(env('MAIL_RECIPIENT'))
        <div>
            <x-link href="mailto:{{ env('MAIL_RECIPIENT') }}">Get in touch!</x-link>
        </div>
        @endif
    </div>
</footer>