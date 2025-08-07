<!-- Hero Section with Carousel -->
<section class="relative h-[50vh] md:h-[60vh] lg:h-[70vh] xl:h-[80vh] overflow-hidden" x-data="{
    currentSlide: 0,
    slides: [
        {
            image: 'static/media/Photos/hero_1.jpg',
            title: '50 years in Pursuit of Excellence in Nuclear Education, Research & Training',
            subtitle: 'Affiliated with Pakistan Institute of Engineering and Applied Sciences (PIEAS)',
            cta: 'Explore Programs'
        },
        {
            image: 'static/media/Photos/hero_2.jpg',
            title: 'State-of-the-Art Research Facilities',
            subtitle: 'Leading innovation in power and energy systems',
            cta: 'View Research'
        },
        {
            image: 'static/media/Photos/hero_3.jpg',
            title: 'Advanced Engineering Programs',
            subtitle: 'MS, PDTP, PGTP, and CSR programs available',
            cta: 'Apply Now'
        },
        {
            image: 'static/media/Photos/hero_4.jpg',
            title: 'Shaping Future Engineers',
            subtitle: 'Join our community of successful graduates',
            cta: 'Learn More'
        }
    ]
}" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 5000)">

    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index" x-transition:enter="transition ease-in-out duration-1000"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in-out duration-1000"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0 bg-cover bg-center"
            :style="`background-image: url(${slide.image})`">

            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative z-10 h-full flex items-center justify-center text-center text-white">
                <div class="max-w-4xl mx-auto px-2 md:px-4 lg:px-8">
                    <h1 x-text="slide.title"
                        class="font-bold mb-6 leading-tight
                        text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl"></h1>
                    <p x-text="slide.subtitle"
                        class="mb-8 text-sm sm:text-base md:text-lg lg:text-xl xl:text-xl text-gray-200"></p>
                    <a :href="index === 0 ? 'index.php?content_file=pages/programs.php' : index === 1 ? 'index.php?content_file=pages/research.php' : index === 2 ? 'index.php?content_file=partials/login.php' : 'index.php?content_file=pages/contact.php'"
                        class="inline-block bg-kinpoe-gold hover:bg-yellow-600 text-white font-bold
                        py-2 px-5 sm:py-2.5 sm:px-6 md:py-3 md:px-7 lg:py-3 lg:px-8 xl:py-3 xl:px-10
                        rounded-lg text-sm sm:text-base md:text-lg lg:text-lg transition-all duration-300 transform hover:scale-105">
                        <span x-text="slide.cta"></span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </template>

    <!-- Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index"
                :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"
                class="w-3 h-3 rounded-full transition-all duration-300"></button>
        </template>
    </div>

    <!-- Navigation Arrows -->
    <button @click="currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1"
        class="absolute left-8 top-1/2 transform -translate-y-1/2 text-white hover:text-kinpoe-gold transition-colors duration-300 z-20">
        <i class="fas fa-chevron-left text-3xl"></i>
    </button>
    <button @click="currentSlide = (currentSlide + 1) % slides.length"
        class="absolute right-8 top-1/2 transform -translate-y-1/2 text-white hover:text-kinpoe-gold transition-colors duration-300 z-20">
        <i class="fas fa-chevron-right text-3xl"></i>
    </button>
</section>