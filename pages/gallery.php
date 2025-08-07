<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Gallery</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Karachi Institute of Power Engineering - Excellence in Engineering Education and Research
            </p>
        </div>
    </div>
</section>

<section class="relative py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            // Dynamically load all images from Gallery folder
            $galleryDir = __DIR__ . '/../static/media/Photos/Gallery/';
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $gallery_images = [];
            // User-defined captions for images (key: filename, value: caption)
            $custom_captions = [
                '0001.JPG' => 'Chairman PAEC Giving Speech at MS Convocation',
                '0008.JPG' => 'Group Photo of Chief Guest at MS Convocation',
                '0012.JPG' => 'Faculty Members at Seminar',
                'Chairman PAEC.jpg' => 'Chairman PAEC at Inaugration Ceremony of CSR',
                'CSR video playing.JPG' => 'CSR Awareness Session',
                'Dir Kinpoe addres.jpg' => 'Director KINPOE Addressing Audience',
                'DSC_1793.jpg' => 'Chairman PAEC',
                'DSC_2305.JPG' => 'Recitation of Quran before PDTP Award Distribution Ceremony',
                'DSC_2310.JPG' => 'Recitation of Naat-e-Rasool PDTP Award Distribution Ceremony',
                'DSC_2317.JPG' => 'Director KINPOE Addressing Audience of PDTP Ceremony',
                'DSC_2321.JPG' => 'Director KINPOE Addressing Audience of PDTP Ceremony',
                'DSC_2374.JPG' => 'Student Speech at PDTP Award Distribution Ceremony',
                'DSC_2391.JPG' => 'Director KINPOE Presenting Sheild to DG Corporate',
                'DSC_2404.JPG' => 'DG Corp. Giving Speech at PDTP Convocation',
                'DSC_2409.JPG' => 'Group Photo of PDTP Batch-49',
                'DSC_2005_1.JPG' => 'Group Photo of MS(NPE) Batches-25,26,27,28',
                // 'DSC_9292.JPG' => 'Former Chairman NEPRA Speech to Audience',
                'DSC_9407.jpg' => 'Former Chairman visit to CSR Classroom',
                'DSC_9564.jpg' => 'Former Chairman NEPRA Speech to Audience',
                'DSC_6578.jpg' => 'Student Activities - Gallery Preview',
                'Group photo.jpg' => 'Group Photo of Faculty with Chief Guest of CSR inaugration Ceremony',
                // 'hero_2.jpg' => 'Director KINPOE giving Speech at Cermony of PDTP Batch-49',
                'IMG_0462.JPG' => 'Dr. Nadeem Ahsan Giving lecture to Member Power',
                'kinpoe_view.jpg' => 'A beautiful view of KINPOE campus',
                'opening plaque.JPG' => 'Inauguration Ceremony',
                'shield presenting.jpg' => 'Shield Presentation to Guest',
            ];
            if (is_dir($galleryDir)) {
                foreach (scandir($galleryDir) as $file) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if (in_array($ext, $allowedExtensions) && $file[0] !== '.') {
                        $gallery_images[] = [
                            'src' => 'static/media/Photos/Gallery/' . $file,
                            'alt' => pathinfo($file, PATHINFO_FILENAME),
                            'caption' => isset($custom_captions[$file]) ? $custom_captions[$file] : ''
                        ];
                    }
                }
            }
            usort($gallery_images, function($a, $b) { return strcmp($a['src'], $b['src']); }); // Optional: sort alphabetically
            foreach ($gallery_images as $idx => $img) {
            ?>
            <div class="rounded-lg overflow-hidden shadow-lg cursor-pointer group" onclick="openModal(<?php echo $idx; ?>)">
                <img src="<?php echo $img['src']; ?>" alt="<?php echo $img['alt']; ?>" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-300">
            </div>
            <?php } ?>
        </div>
        <!-- Modal/Lightbox -->
        <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
            <div class="relative max-w-3xl w-full flex flex-col items-center">
                <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-3xl font-bold mix-blend-difference transition-colors duration-200">&times;</button>
                <button id="prevBtn" class="absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-80 text-white rounded-full w-10 h-10 flex items-center justify-center z-10" aria-label="Previous Image">
                    <i class="fas fa-chevron-left text-3xl"></i>
                </button>
                <img id="modalImg" src="" alt="Gallery Image" class="w-full max-w-[120vw] max-h-[120vh] aspect-auto object-contain rounded-lg shadow-lg" style="background: #222;">
                <button id="nextBtn" class="absolute right-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-80 text-white rounded-full w-10 h-10 flex items-center justify-center z-10" aria-label="Next Image">
                    <i class="fas fa-chevron-right text-3xl"></i>
                </button>
                <div id="modalCaption" class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-center px-4 py-3 text-base md:text-lg rounded-b-lg" style="backdrop-filter: blur(2px);"></div>
            </div>
        </div>
        <script>
        const galleryImages = <?php echo json_encode($gallery_images); ?>;
        let currentIdx = 0;
        const modal = document.getElementById('galleryModal');
        const modalImg = document.getElementById('modalImg');
        const modalCaption = document.getElementById('modalCaption');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function showModal(idx) {
            currentIdx = (idx + galleryImages.length) % galleryImages.length;
            const img = galleryImages[currentIdx];
            modalImg.src = img.src;
            modalImg.alt = img.alt;
            modalCaption.textContent = img.caption || '';
        }

        function openModal(idx) {
            modal.classList.remove('hidden');
            showModal(idx);
        }
        function closeModal() {
            modal.classList.add('hidden');
        }
        prevBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            showModal(currentIdx - 1);
        });
        nextBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            showModal(currentIdx + 1);
        });
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (modal.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeModal();
            if (e.key === 'ArrowLeft') showModal(currentIdx - 1);
            if (e.key === 'ArrowRight') showModal(currentIdx + 1);
        });
        // Close modal on click outside image
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });
        </script>
    </div>
</section>
