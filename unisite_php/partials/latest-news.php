<!-- Announcements & News Section -->
<section class="py-16 bg-gray-100" x-data="{
    currentNews: 0,
    news: [
        {
            id: 0,
            title: 'Admissions Open for Academic Year 2024',
            summary: 'Applications are now being accepted for MS, PDTP, PGTP, and CSR programs.',
            date: '2024-01-15',
            type: 'announcement',
            image: 'static/media/kinpoe_building.jpg',
            full: 'Admissions for MS, PDTP, PGTP, and CSR programs are now open for the academic year 2024. Please visit the Programs page for eligibility, deadlines, and application instructions. For queries, contact the Registrar office.'
        },
        {
            id: 1,
            title: 'Research Excellence Award 2023',
            summary: 'KINPOE faculty receives prestigious award for renewable energy research.',
            date: '2024-01-10',
            type: 'news',
            image: 'static/media/research_lab.jpg',
            full: 'Our faculty has been honored with the Research Excellence Award 2023 for outstanding contributions in renewable energy systems. The award recognizes innovation, impact, and leadership in the field.'
        },
        {
            id: 2,
            title: 'New Laboratory Inauguration',
            summary: 'State-of-the-art power systems laboratory officially opened.',
            date: '2024-01-05',
            type: 'news',
            image: 'static/media/engineering_facility.jpg',
            full: 'KINPOE has inaugurated a new power systems laboratory equipped with advanced instruments for research and training. The lab will support hands-on learning and industry collaboration.'
        },
        {
            id: 3,
            title: 'Industry Partnership Announcement',
            summary: 'Strategic collaboration with leading power companies established.',
            date: '2023-12-20',
            type: 'announcement',
            image: 'static/media/paec_logo.png',
            full: 'KINPOE has signed MoUs with top power companies to foster industry-academia partnerships. This will provide students with internships, research opportunities, and career pathways.'
        },
        {
            id: 4,
            title: 'Student Achievement Recognition',
            summary: 'KINPOE students win national engineering competition.',
            date: '2023-12-15',
            type: 'news',
            image: 'static/media/graduation.jpg',
            full: 'Congratulations to our students for winning the National Engineering Competition 2023. Their project on smart grid technology was highly praised by the judges.'
        }
    ],
    showModal: false,
    modalNews: null,
    openModal(newsItem) {
        this.modalNews = newsItem;
        this.showModal = true;
    },
    interval: null,
    startAutoSlide() {
        this.interval = setInterval(() => {
            if (!this.showModal) {
                this.currentNews = (this.currentNews + 1) % this.news.length;
            }
        }, 4000);
    },
    stopAutoSlide() {
        if (this.interval) clearInterval(this.interval);
    }
}"
x-init="startAutoSlide()"
@mouseenter="stopAutoSlide()"
@mouseleave="startAutoSlide()"
@keydown.window.escape="showModal = false"
x-effect="if(showModal){stopAutoSlide()}else{startAutoSlide()}">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Latest News & Announcements</h2>
            <p class="text-xl text-gray-600">Stay updated with the latest happenings at KINPOE</p>
        </div>
        <div class="relative">
            <div class="bg-white rounded-xl shadow-lg p-8 min-h-[200px]">
                <template x-for="(item, index) in news" :key="index">
                    <div x-show="currentNews === index"
                         x-transition:enter="transition ease-in duration-400"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-out duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95">
                        <button @click="openModal(item)" class="w-full text-left focus:outline-none">
                            <div class="flex items-start space-x-4">
                                <div :class="item.type === 'announcement' ? 'bg-kinpoe-gold' : 'bg-kinpoe-blue'"
                                     class="w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i :class="item.type === 'announcement' ? 'fas fa-bullhorn' : 'fas fa-newspaper'"
                                       class="text-white text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 x-text="item.title" class="text-2xl font-bold text-kinpoe-blue mb-2"></h3>
                                    <p x-text="item.summary" class="text-gray-600 text-lg mb-3"></p>
                                    <p x-text="new Date(item.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"
                                       class="text-kinpoe-gray text-sm"></p>
                                </div>
                            </div>
                        </button>
                    </div>
                </template>
            </div>
            <!-- News Navigation Dots -->
            <div class="flex justify-center mt-6 space-x-2">
                <template x-for="(item, index) in news" :key="index">
                    <button @click="currentNews = index"
                            :class="currentNews === index ? 'bg-kinpoe-blue' : 'bg-gray-300'"
                            class="w-3 h-3 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
        <!-- Modal for News -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-kinpoe-blue text-xl" aria-label="Close">&times;</button>
                <template x-if="modalNews">
                    <div>
                        <img :src="modalNews.image" :alt="modalNews.title" class="rounded-lg mb-4 w-full h-48 object-cover">
                        <h3 class="text-2xl font-bold text-kinpoe-blue mb-2" x-text="modalNews.title"></h3>
                        <p class="text-kinpoe-gray text-sm mb-2" x-text="new Date(modalNews.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"></p>
                        <p class="text-gray-700 mb-4" x-text="modalNews.full"></p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>
