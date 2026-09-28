@props(['images'=> []])

<div {{ $attributes }}>
    <!-- Full-width images with rounded edges -->
    @foreach ($images as $img)
        <img
            class="slides"
            src="{{ $img['src'] }}"
            @isset($img['srcset']) srcset="{{ $img['srcset'] }}" sizes="(min-width: 896px) 896px, 100vw" @endisset
            alt="{{ $img['alt'] }}"
            width="1600"
            height="1200"
            @if ($loop->first) fetchpriority="high" style="display: block" @else loading="lazy" style="display: none" @endif
        />
    @endforeach
    <!-- slideshow nav -->
    <div class="text-center mt-3">
        <!-- The dots/circles -->
        @foreach ($images as $img)
            <button type="button" aria-label="Show {{ $img['alt'] }}" class="dot size-5 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition-colors hover:bg-gray-400" onclick="currentSlide({{ $loop->index + 1 }})"></button>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    var slideIndex = 1;
    var timer = null;
    showSlides(slideIndex);

    //Arrow slide controls
    function plusSlides(n) {
        //resets timer
        clearTimeout(timer);
        showSlides(slideIndex += n);
    }

    //Slide controls using dots on bottom of display
    function currentSlide(n) {
        clearTimeout(timer);
        showSlides(slideIndex = n);
    }

    //function to progress image slides
    function showSlides(n) {
        //setup variables
        var i;
        var slides = document.getElementsByClassName("slides");
        var dots = document.getElementsByClassName("dot");

        if (n == undefined) {
            n = ++slideIndex;
        }
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.remove("bg-cool-gray-500!")
        }
        slides[slideIndex-1].style.display = "block";
        slides[slideIndex % slides.length].loading = "eager";

        //highlights dot of current image in slideshow
        dots[slideIndex-1].classList.add("bg-cool-gray-500!");

        //determines length each image is displayed for
        timer = setTimeout(showSlides, 6000);
    }
</script>
@endpush
