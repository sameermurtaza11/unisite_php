<!-- Gallery Preview Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Campus Life</h2>
            <p class="text-xl text-gray-600">Get a glimpse of our vibrant campus and academic environment</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/kinpoe_building.jpg')"></div>
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/research_lab.jpg')"></div>
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/graduation.jpg')"></div>
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/engineering_facility.jpg')"></div>
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/knpgs_aerial.jpg')"></div>
            <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                style="background-image: url('static/media/cnpgs_aerial.jpg')"></div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ url('gallery') }}"
                class="inline-block bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                View Full Gallery
            </a>
        </div>
    </div>
</section>
