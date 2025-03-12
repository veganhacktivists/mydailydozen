@props(['images'=> []])

<div {{ $attributes }}>
    <!-- Full-width images with rounded edges -->
    @foreach ($images as $img)
        <img class="slides" src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" />
    @endforeach
    <!-- slideshow nav -->
    <div class="text-center">
        <!-- Next button -->
        <a class="left-2 text-4xl text-gray-400 hover:text-gray-500 transition duration-500 ease-in-out cursor-pointer m-0.5" onclick="plusSlides(-1)">&#10094;</a>
        <!-- The dots/circles -->
        @foreach ($images as $img)
            <span class="dot h-4 w-4 m-1 bg-gray-300 rounded-full cursor-pointer inline-block transition duration-500 ease-in-out hover:bg-gray-400" onclick="currentSlide({{ $loop->index + 1 }})"></span>
        @endforeach
        <!-- Previous buttons -->
        <a class="right-2 text-4xl text-gray-400 hover:text-gray-500 transition duration-500 ease-in-out cursor-pointer m-0.5" onclick="plusSlides(1)">&#10095;</a>
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
        dots[i].classList.remove("!bg-[#6b7280]")
        }
        slides[slideIndex-1].style.display = "block";

        //highlights dot of current image in slideshow
        dots[slideIndex-1].classList.add("!bg-[#6b7280]");

        //determines length each image is displayed for
        timer = setTimeout(showSlides, 6000);
    }
</script>
@endpush
