<?php
$pageTitle = 'KHIZU | Contact Us & Corporate Inquiries';
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <div class="mb-space-lg">
    <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-1">
      <a href="/" class="hover:underline">Home</a>
      <span>/</span>
      <span>Concierge & Contact</span>
    </div>
    <h1 class="font-headline-xl text-headline-xl text-on-surface">Connect with KHIZU Stationery</h1>
    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
      Whether you are an institution inquiring about custom foil-embossed registers, a distributor, or need assistance with your personal satchel order, our team is at your disposal.
    </p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">

    <!-- Contact Info Cards -->
    <div class="lg:col-span-5 space-y-space-md">

      <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg space-y-space-md">
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Storefront Concierge</h3>

        <div class="space-y-space-md text-body-sm">
          <div class="flex items-start gap-space-md">
            <div class="w-10 h-10 rounded-lg bg-primary-container text-primary flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[20px]">location_on</span>
            </div>
            <div>
              <h4 class="font-label-md text-on-surface uppercase font-bold">Studio & Fulfillment Center</h4>
              <p class="text-on-surface-variant">Plot 45-B, Commercial Industrial Zone, S.I.T.E, Karachi, Pakistan</p>
            </div>
          </div>

          <div class="flex items-start gap-space-md">
            <div class="w-10 h-10 rounded-lg bg-primary-container text-tertiary flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[20px]">call</span>
            </div>
            <div>
              <h4 class="font-label-md text-on-surface uppercase font-bold">Direct Phone & WhatsApp</h4>
              <p class="text-on-surface font-semibold">+92 300 1234567</p>
              <p class="text-on-surface-variant text-[12px]">Monday – Saturday, 9:00 AM – 7:00 PM PKT</p>
            </div>
          </div>

          <div class="flex items-start gap-space-md">
            <div class="w-10 h-10 rounded-lg bg-primary-container text-secondary flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[20px]">mail</span>
            </div>
            <div>
              <h4 class="font-label-md text-on-surface uppercase font-bold">Official Communications</h4>
              <p class="text-on-surface font-semibold">concierge@khizu.com</p>
              <p class="text-on-surface-variant text-[12px]">Guaranteed response within 4 hours</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Institutional Ordering Info -->
      <div class="bg-primary-container/30 rounded-xl border border-primary/30 p-space-lg space-y-2">
        <div class="flex items-center gap-2 text-tertiary font-bold font-label-md uppercase">
          <span class="material-symbols-outlined text-[18px]">school</span>
          <span>Educational Institutions</span>
        </div>
        <p class="font-body-sm text-body-sm text-on-surface-variant">
          Supplying top universities, medical colleges, and accounting firms with high-grammage bound registers with custom university insignias and foil blocking.
        </p>
      </div>

    </div>

    <!-- Contact Form -->
    <div class="lg:col-span-7 bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg shadow-xl">
      <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Send an Inquiry</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">Real-time dispatched to our customer desk and logged in the database.</p>

      <form id="contact-inquiry-form" onsubmit="handleInquirySubmission(event)" class="space-y-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Your Full Name *</label>
            <input type="text" id="contact-name" required placeholder="Muhammad Ali" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Email Address *</label>
            <input type="email" id="contact-email" required placeholder="name@domain.com" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Phone Number</label>
            <input type="tel" id="contact-phone" placeholder="0300 0000000" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Subject</label>
            <select id="contact-subject" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary">
              <option value="General Question">General Product Question</option>
              <option value="Order Status">Track Existing Satchel Order</option>
              <option value="Institutional / Bulk">Bulk / Institutional Order (50+ units)</option>
              <option value="Custom Embossing">Custom Foil Embossing</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Detailed Message *</label>
          <textarea id="contact-message" required rows="5" placeholder="Specify requirements, paper preferences, or order reference..." class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"></textarea>
        </div>

        <button type="submit" id="contact-submit-btn" class="w-full py-3.5 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg font-bold rounded-lg shadow-lg hover:shadow-tertiary/20 transition-all flex items-center justify-center gap-2">
          <span class="material-symbols-outlined text-[20px]">send</span>
          <span>Submit Inquiry</span>
        </button>
      </form>
    </div>

  </div>

</div>

<script>
  async function handleInquirySubmission(e) {
    e.preventDefault();
    const btn = document.getElementById('contact-submit-btn');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">refresh</span> Dispatching...';

    const payload = {
      full_name: document.getElementById('contact-name').value,
      email: document.getElementById('contact-email').value,
      phone: document.getElementById('contact-phone').value,
      subject: document.getElementById('contact-subject').value,
      message: document.getElementById('contact-message').value
    };

    try {
      const resp = await fetch('/api/contact', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      const data = await resp.json();

      if (data.success) {
        showToast('Inquiry Transmitted', 'Our executive desk will reach out shortly.');
        document.getElementById('contact-inquiry-form').reset();
        btn.disabled = false;
        btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check</span><span>Inquiry Sent Successfully</span>';
        setTimeout(() => {
          btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">send</span><span>Submit Another Inquiry</span>';
        }, 3000);
      } else {
        alert(data.error || 'Could not send message.');
        btn.disabled = false;
        btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">send</span><span>Submit Inquiry</span>';
      }
    } catch (err) {
      alert('Error contacting server.');
      btn.disabled = false;
      btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">send</span><span>Submit Inquiry</span>';
    }
  }
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>
