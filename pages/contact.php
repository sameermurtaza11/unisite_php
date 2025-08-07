<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-kinpoe-blue mb-6">Contact Us</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-bold text-kinpoe-blue mb-4">Contact Addresses</h2>
                <p class="mb-2"><strong>Physical Address:</strong></p>
                <p class="mb-4">
                    Deputy Registrar<br>
                    Karachi Institute of Power Engineering College, PIEAS, KANUPP P.O. Box No. 12601, Hawks Bay Road, Near Paradise Point, Karachi.
                </p>
                <p class="mb-2"><strong>Phone:</strong></p>
                <p class="mb-4">(021) 9920 2777 ext: 2701<br>(021) 9923 2733</p>
                <p class="mb-2"><strong>Fax:</strong></p>
                <p class="mb-4">(021)99232269</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-kinpoe-blue mb-4">Send Us a Message</h2>
                <form id="contactForm" class="space-y-4">
                    <input type="text" name="name" placeholder="Your Name" class="w-full border rounded-lg px-4 py-2" required>
                    <input type="email" name="email" placeholder="Your Email" class="w-full border rounded-lg px-4 py-2" required>
                    <textarea name="message" placeholder="Your Message" class="w-full border rounded-lg px-4 py-2" rows="5" required></textarea>
                    <button type="submit"
                        class="bg-kinpoe-blue text-white px-6 py-2 rounded-lg hover:bg-kinpoe-dark-blue transition">Send</button>
                </form>
                <div id="contactSuccess" class="hidden mt-4 text-green-600 font-semibold">Your message has been sent successfully!</div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('contactForm').onsubmit = async function (e) {
        e.preventDefault();
        const form = e.target;
        const data = {
            name: form.name.value,
            email: form.email.value,
            message: form.message.value
        };
        // You can change '/api/contact' to a PHP endpoint if you implement backend
        const res = await fetch('/api/contact', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        if (res.ok) {
            document.getElementById('contactSuccess').classList.remove('hidden');
            form.reset();
        }
    };
</script>
