<!-- ========================================================= -->
<!--                   SERVICE DETAIL MODAL                   -->
<!-- ========================================================= -->
<div id="service-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="relative w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-2xl 
           bg-[#121212] border border-white/10 shadow-2xl p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
      <h3 id="modal-title" class="text-2xl font-bold text-white">
        Detail Layanan
      </h3>

      <button id="close-modal"
        class="text-white/50 hover:text-white text-3xl leading-none transition">
        &times;
      </button>
    </div>

    <!-- CONTENT -->
    <div id="modal-content" class="space-y-4 text-white/70 leading-relaxed"></div>

    <!-- CTA -->
    <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
      <button id="whatsapp-order-btn"
        class="px-5 py-3 rounded-lg bg-green-600 text-white font-semibold
               hover:bg-green-700 transition"
        data-service="">
        Pesan via WhatsApp
      </button>

      <button id="order-now-btn"
        class="px-5 py-3 rounded-lg bg-white text-black font-semibold
               hover:bg-neutral-200 transition"
        data-service="">
        Pesan Sekarang
      </button>
    </div>
  </div>
</div>

<!-- ========================================================= -->
<!--                     ORDER FORM MODAL                     -->
<!-- ========================================================= -->
<div id="order-form-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="w-full max-w-2xl max-h-[90vh] overflow-y-auto rounded-2xl
           bg-[#121212] border border-white/10 shadow-2xl">

    <div class="p-8">

      <!-- HEADER -->
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-white">
          Form Pemesanan
        </h3>

        <button id="close-order-form"
          class="text-white/50 hover:text-white text-3xl leading-none transition">
          &times;
        </button>
      </div>

      <!-- FORM -->
      <form id="order-form" method="POST" action="{{ route('order.send') }}" class="space-y-5">
        @csrf

        @foreach ([
          ['Nama Lengkap','order-name','text'],
          ['Email','order-email','email'],
          ['Nomor Telepon','order-phone','tel']
        ] as [$label,$id,$type])
        <div>
          <label class="block mb-1 text-sm text-white/70">{{ $label }}</label>
          <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3
                   text-white focus:ring-2 focus:ring-white/20 focus:border-white/40">
        </div>
        @endforeach

        <input type="hidden" id="order-service" name="order-service">

        <div>
          <label class="block mb-1 text-sm text-white/70">Kebutuhan Anda</label>
          <textarea id="order-requirements" name="order-requirements" rows="3" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3
                   text-white focus:ring-2 focus:ring-white/20"></textarea>
        </div>

        <div>
          <label class="block mb-1 text-sm text-white/70">Budget</label>
          <input type="text" id="order-budget" name="order-budget" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3 text-white">
        </div>

        <div>
          <label class="block mb-1 text-sm text-white/70">Deadline</label>
          <input type="date" id="order-deadline" name="order-deadline" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3 text-white">
        </div>

        <!-- ACTION -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
          <button type="submit"
            class="flex-1 py-3 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition">
            Kirim Pesanan
          </button>

          <button type="button" id="order-whatsapp-btn"
            class="flex-1 py-3 rounded-lg bg-green-600 text-white font-bold hover:bg-green-700 transition">
            WhatsApp
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- ========================================================= -->
<!--                       SUCCESS MODAL                      -->
<!-- ========================================================= -->
<div id="success-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="bg-[#121212] border border-white/10 rounded-2xl shadow-2xl
           w-full max-w-md p-8 text-center">

    <div class="flex justify-center mb-6">
      <div class="bg-green-500/20 p-4 rounded-full">
        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
            d="M5 13l4 4L19 7" />
        </svg>
      </div>
    </div>

    <h3 class="text-xl font-bold text-white mb-2">
      Berhasil Terkirim!
    </h3>

    <p class="text-white/60 mb-6">
      Pesan Anda telah kami terima. Kami akan segera menghubungi Anda.
    </p>

    <button id="close-success"
      class="w-full py-3 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition">
      Tutup
    </button>
  </div>
</div>
