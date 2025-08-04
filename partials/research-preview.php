<!-- Research Preview Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Research Excellence</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Explore our cutting-edge research initiatives in power engineering and energy systems.
            </p>
        </div>

        <?php
        // Import research items from shared data file
        include_once __DIR__ . '/../partials/research-items.php';
        if (!isset($research_items) || !is_array($research_items)) {
            $research_items = [];
        }
        $max_preview = 4;
        if (count($research_items) > $max_preview) {
            shuffle($research_items);
            $preview_items = array_slice($research_items, 0, $max_preview);
        } else {
            $preview_items = $research_items;
        }
        ?>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach ($preview_items as $item): ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-kinpoe-blue mb-3"><?= htmlspecialchars($item['title']) ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?= htmlspecialchars($item['desc']) ?>
                        </p>
                        <a href="index.php?content_file=pages/research.php" class="text-kinpoe-blue hover:text-kinpoe-dark-blue font-semibold">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <a href="index.php?content_file=pages/research.php" class="inline-block bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                View All Research Projects
            </a>
        </div>
    </div>
</section>
