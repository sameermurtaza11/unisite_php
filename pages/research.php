<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Researches & Innovation</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Pioneering Innovation in Power & Energy – A Legacy of Excellence with PIEAS
            </p>
        </div>
    </div>
</section>

<section class="relative py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <?php
            // Import research items from shared data file
            include_once __DIR__ . '/../partials/research-items.php';
            foreach ($research_items as $item):
            ?>
                <div x-data="{ open: false }" class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-start">
                    <img src="<?= $item['img'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="rounded mb-4 w-full h-40 object-cover">
                    <h3 class="text-xl font-bold text-kinpoe-blue mb-2"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="text-gray-700 mb-2"><?= htmlspecialchars($item['desc']) ?></p>
                    <button @click="open = !open" class="text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none mb-2">
                        <span x-show="!open">Read More</span><span x-show="open">Collapse</span>
                    </button>
                    <div x-show="open" x-transition class="w-full">
                        <p class="text-gray-600 text-sm"><?= htmlspecialchars($item['detail']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>