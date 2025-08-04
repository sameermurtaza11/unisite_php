<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Get in Touch</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                We're here to answer your questions and connect you with the right resources—reach out to us today.
            </p>
        </div>
    </div>
</section>
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- <h1 class="text-4xl font-bold text-kinpoe-blue mb-6">Contact Us</h1> -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-bold text-kinpoe-blue text-center mb-4">Contact Addresses</h2>
                <p class="mb-2"><strong>Physical Address:</strong></p>
                <p class="mb-4">
                    Karachi Institute of Power Engineering College, PIEAS, KANUPP P.O. Box No. 12601, Hawks Bay Road, Near Paradise Point, Karachi.
                </p>
                <p class="mb-4"><strong>Phone:</strong> <span class="pl-1">(021) 9923 2777 <strong> or </strong> ext: 2701</span></p>
                
                <p class="mb-4"><strong>Email Address:</strong> <span class="pl-1">info@kinpoe.edu.pk</span></p>
                
                <p class="mb-4"><strong>Fax:</strong> <span class="pl-1">(021) 9923 2269</span></p>
                
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
    document.getElementById('contactForm').onsubmit = async function(e) {
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
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        if (res.ok) {
            document.getElementById('contactSuccess').classList.remove('hidden');
            form.reset();
        }
    };
</script>