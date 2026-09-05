/* =========================================================
   MOBILE MENU
========================================================= */
const menuBtn = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

// toggle menu
menuBtn?.addEventListener('click', (e) => {
  e.stopPropagation(); // cegah trigger click luar
  mobileMenu.classList.toggle('hidden');
});

// klik link → tutup menu
mobileMenu?.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
  });
});

// klik area luar → tutup menu
document.addEventListener('click', (e) => {
  if (
    !mobileMenu.classList.contains('hidden') &&
    !mobileMenu.contains(e.target) &&
    !menuBtn.contains(e.target)
  ) {
    mobileMenu.classList.add('hidden');
  }
});


/* =========================================================
   SERVICE DATA
========================================================= */
const serviceData = {
    website: {
        title: "Pembuatan Website",
        description: "Kami menyediakan layanan pembuatan website profesional yang responsif.",
        features: [
            "Desain responsif",
            "SEO friendly",
            "Integrasi media sosial",
            "Panel admin",
            "Optimasi kecepatan",
            "Keamanan website"
        ],
        packages: [
            { name: "Basic", price: "Rp 2.500.000", features: ["5 halaman", "Form kontak", "Integrasi sosmed", "3 revisi"] },
            { name: "Business", price: "Rp 5.000.000", features: ["10 halaman", "CMS dasar", "SEO dasar", "5 revisi"] },
            { name: "Premium", price: "Rp 10.000.000", features: ["20 halaman", "UI premium", "SEO full", "E-commerce"] }
        ]
    },

    design: {
        title: "Desain Grafis",
        description: "Layanan desain grafis profesional untuk branding dan kebutuhan visual.",
        features: ["Custom sesuai brand", "File siap cetak", "Revisi sesuai paket", "Konsultasi desain"],
        packages: [
            { name: "Logo Design", price: "Rp 500.000", features: ["3 konsep", "3 revisi", "File AI/PNG/JPG"] },
            { name: "Branding Package", price: "Rp 1.500.000", features: ["Logo", "Kartu nama", "Brand guideline"] },
            { name: "Social Media Content", price: "Rp 2.000.000", features: ["10 template IG", "Cover FB", "File PSD/PNG"] }
        ]
    },

    marketing: {
        title: "Digital Marketing",
        description: "Strategi pemasaran digital untuk bisnis Anda.",
        features: ["Analisis kompetitor", "Strategi konten", "Optimasi kampanye"],
        packages: [
            { name: "Social Media Management", price: "Rp 1.500.000/bulan", features: ["Kelola 2 platform", "12 posting/bulan"] },
            { name: "Google Ads", price: "Rp 2.500.000/bulan", features: ["Setup campaign", "Optimasi keyword"] },
            { name: "Full Package", price: "Rp 5.000.000/bulan", features: ["Ads + Content + Strategy"] }
        ]
    },

    app: {
        title: "Pengembangan Aplikasi",
        description: "Pembuatan aplikasi web & mobile sesuai kebutuhan bisnis.",
        features: ["UI/UX modern", "API development", "Testing & QA"],
        packages: [
            { name: "Web App", price: "Rp 5.000.000", features: ["5 fitur", "Desain responsif", "Admin panel"] },
            { name: "Mobile App", price: "Rp 15.000.000", features: ["Android/iOS", "Backend API"] },
            { name: "Enterprise", price: "Rp 30.000.000", features: ["Full custom", "Web + Mobile"] }
        ]
    },

    video: {
        title: "Video Marketing",
        description: "Produksi video profesional untuk promosi bisnis.",
        features: ["Shooting", "Editing", "Motion graphic"],
        packages: [
            { name: "Company Profile", price: "Rp 3.000.000", features: ["1-2 menit", "Shooting 1 hari"] },
            { name: "Product Video", price: "Rp 5.000.000", features: ["1-3 menit", "Motion graphic"] },
            { name: "Premium", price: "Rp 10.000.000", features: ["Drone", "VFX premium"] }
        ]
    },

    seo: {
        title: "SEO & Optimasi",
        description: "Optimasi website agar ranking Google meningkat.",
        features: ["Audit lengkap", "On-page + off-page", "Backlink"],
        packages: [
            { name: "SEO Basic", price: "Rp 1.000.000/bulan", features: ["10 keyword", "Audit"] },
            { name: "SEO Standard", price: "Rp 2.500.000/bulan", features: ["20 keyword", "Artikel SEO"] },
            { name: "SEO Premium", price: "Rp 5.000.000/bulan", features: ["30 keyword", "Backlink premium"] }
        ]
    }
};

/* =========================================================
   OPEN SERVICE MODAL
========================================================= */
document.querySelectorAll('.order-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const key = btn.dataset.service;
        const service = serviceData[key];

        if (!service) return;

        document.getElementById('modal-title').innerText = service.title;

        let html = `
  <p class="text-white/70">${service.description}</p>

  <h4 class="text-white font-semibold mt-4">Fitur Utama</h4>
  <ul class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-sm text-white/70">
    ${service.features.map(f => `<li>✔ ${f}</li>`).join("")}
  </ul>

  <h4 class="text-white font-semibold mt-5">Paket Harga</h4>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
`;

        service.packages.forEach(pkg => {
            html += `
    <div
      class="package-card cursor-pointer
             bg-[#1a1a1a] border border-white/10 rounded-lg p-4
             transition-all duration-300
             hover:-translate-y-1 hover:border-white/30
             hover:shadow-lg hover:shadow-white/5"
      data-package="${pkg.name}"
      data-price="${pkg.price}">

      <h5 class="text-white font-bold">${pkg.name}</h5>
      <p class="text-emerald-400 font-bold mb-2">${pkg.price}</p>

      <ul class="text-sm text-white/70 space-y-1">
        ${pkg.features.map(f => `<li>• ${f}</li>`).join("")}
      </ul>
    </div>
  `;
        });




        html += `</div>`;
        document.getElementById('modal-content').innerHTML = html;
        // =========================================================
        // KLIK PAKET → AUTO ISI ORDER FORM
        // =========================================================
        document.querySelectorAll('.package-card').forEach(card => {
            card.addEventListener('click', () => {
                const packageName = card.dataset.package;
                const price = card.dataset.price;

                // isi otomatis field kebutuhan
                document.getElementById('order-requirements').value =
                    `Paket: ${packageName}\nHarga: ${price}`;

                // buka form order
                document.getElementById('service-modal').classList.add('hidden');
                document.getElementById('order-form-modal').classList.remove('hidden');
            });
        });
        document.getElementById('order-requirements').value = '';
        document.getElementById('order-budget').value = '';


        document.getElementById('service-modal').classList.remove('hidden');

        document.getElementById('whatsapp-order-btn').dataset.service = key;
        document.getElementById('order-now-btn').dataset.service = key;

        document.getElementById('order-service').value = service.title;
    });
});

/* =========================================================
   CLOSE SERVICE MODAL
========================================================= */
document.getElementById('close-modal')?.addEventListener('click', () => {
    document.getElementById('service-modal').classList.add('hidden');
});

/* =========================================================
   WHATSAPP DIRECT FROM SERVICE MODAL
========================================================= */
document.getElementById('whatsapp-order-btn')?.addEventListener('click', function () {
    const key = this.dataset.service;
    const service = serviceData[key];
    const WA = "+6281374514952";

    if (!service) return;

    const msg = `Halo, saya tertarik dengan layanan ${service.title}`;
    window.open(`https://wa.me/${WA}?text=${encodeURIComponent(msg)}`, "_blank");

    document.getElementById('service-modal').classList.add('hidden');
});

/* =========================================================
   OPEN ORDER FORM
========================================================= */
document.getElementById('order-now-btn')?.addEventListener('click', () => {
    document.getElementById('service-modal').classList.add('hidden');
    document.getElementById('order-form-modal').classList.remove('hidden');
});

/* =========================================================
   CLOSE ORDER FORM
========================================================= */
document.getElementById('close-order-form')?.addEventListener('click', () => {
    document.getElementById('order-form-modal').classList.add('hidden');
});

/* =========================================================
   WHATSAPP ORDER VIA FORM
========================================================= */
document.getElementById('order-whatsapp-btn')?.addEventListener('click', () => {
    const WA = "+6281374514952";

    const name = document.getElementById("order-name").value;
    const email = document.getElementById("order-email").value;
    const phone = document.getElementById("order-phone").value;
    const service = document.getElementById("order-service").value;
    const requirements = document.getElementById("order-requirements").value;
    const budget = document.getElementById("order-budget").value;
    const rawDeadline = document.getElementById("order-deadline").value;
    const deadline = formatTanggalID(rawDeadline);


    if (!name || !email || !phone || !requirements || !budget || !deadline)
        return alert("Mohon lengkapi semua field!");

    const msg = `
Halo, saya ingin memesan layanan dari SolusiBersama.id:

Nama: ${name}
Email: ${email}
Telepon: ${phone}
Layanan: ${service}
Kebutuhan: ${requirements}
Budget: ${budget}
Deadline: ${deadline}
    `;

    window.open(`https://wa.me/${WA}?text=${encodeURIComponent(msg)}`, "_blank");

    document.getElementById('order-form-modal').classList.add('hidden');
});

/* =========================================================
   SUBMIT ORDER FORM (AJAX)
========================================================= */
document.getElementById('order-form')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch(window.LARAVEL.orderRoute, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": window.LARAVEL.csrf,
            "Accept": "application/json"
        },
        body: formData
    })
        .then(async response => {
            if (!response.ok) {
                let text = await response.text();
                throw new Error(text);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                document.getElementById('order-form-modal').classList.add('hidden');
                document.getElementById('success-modal').classList.remove('hidden');
                form.reset();
            } else {
                alert("Gagal: " + data.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert("Error: " + err.message);
        });
});

function formatTanggalID(dateStr) {
    const bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const d = new Date(dateStr);
    return `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
}


/* =========================================================
   CLOSE SUCCESS MODAL
========================================================= */
document.getElementById('close-success')?.addEventListener('click', () => {
    document.getElementById('success-modal').classList.add('hidden');
});

/* =========================================================
   CONTACT FORM AJAX
========================================================= */
document.getElementById('contact-form')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch(window.LARAVEL.contactRoute, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": window.LARAVEL.csrf,
            "Accept": "application/json"
        },
        body: formData
    })
        .then(async response => {
            if (!response.ok) {
                let text = await response.text();
                throw new Error(text);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                document.getElementById('success-modal').classList.remove('hidden');
                form.reset();
            } else {
                alert("Gagal: " + (data.message ?? "Terjadi kesalahan"));
            }
        })
        .catch(err => {
            console.error(err);
            alert("Terjadi kesalahan: " + err.message);
        });
});

/* =========================================================
   WHATSAPP BUTTON (CONTACT SECTION)
========================================================= */
document.getElementById('whatsapp-btn')?.addEventListener('click', () => {
    const WA = "+6281374514952";

    const message = `
Halo, saya ingin menanyakan layanan SolusiBersama.id
Apakah saya bisa dibantu?
    `;

    window.open(`https://wa.me/${WA}?text=${encodeURIComponent(message)}`, "_blank");
});


/* =========================================================
   SMOOTH SCROLL (ALL LINKS, INCLUDING BERANDA)
========================================================= */
function smoothScrollTo(targetY, duration = 900) {
  const startY = window.scrollY;
  const distance = targetY - startY;
  let startTime = null;

  function animation(currentTime) {
    if (!startTime) startTime = currentTime;
    const timeElapsed = currentTime - startTime;
    const progress = Math.min(timeElapsed / duration, 1);

    // easeInOutCubic
    const ease =
      progress < 0.5
        ? 4 * progress * progress * progress
        : 1 - Math.pow(-2 * progress + 2, 3) / 2;

    window.scrollTo(0, startY + distance * ease);

    if (timeElapsed < duration) {
      requestAnimationFrame(animation);
    }
  }

  requestAnimationFrame(animation);
}

document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', function (e) {
    const href = this.getAttribute('href');

    // ===== CASE: BERANDA =====
    if (href === "#" || href === "#top") {
      e.preventDefault();

      // tutup mobile menu
      document.getElementById('mobile-menu')?.classList.add('hidden');

      // SCROLL KE ATAS DENGAN ANIMASI
      smoothScrollTo(0, 500);
      return;
    }

    // ===== CASE: SECTION LAIN =====
    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();

    const headerOffset = 60; // tinggi header
    const elementPosition = target.getBoundingClientRect().top;
    const offsetPosition =
      elementPosition + window.scrollY - headerOffset;

    document.getElementById('mobile-menu')?.classList.add('hidden');

    smoothScrollTo(offsetPosition, 500);
  });
});
