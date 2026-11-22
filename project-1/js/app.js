// 1. Fungsi Validasi Login (Menggunakan Struktur Percabangan If)
function validasiLogin(event) {
  event.preventDefault(); // Mencegah halaman reload saat tombol diklik

  // Mengambil nilai dari input HTML
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var pesan = document.getElementById("pesanLogin");

  // Struktur percabangan IF sesuai ketentuan soal
  if (username === "" || password === "") {
    pesan.innerHTML = '<div class="alert alert-warning rounded-4">Username dan Password tidak boleh kosong!</div>';
  } else if (username === "nazwa" && password === "242011002") {
    alert("Login Berhasil! Selamat datang, Nazwa Kania Maulani.");
    window.location.href = "dashboard.html";
  } else {
    pesan.innerHTML = '<div class="alert alert-danger rounded-4">Username atau Password salah!</div>';
  }
}

// 2. Fungsi Validasi Registrasi Sederhana
function validasiRegister(event) {
  event.preventDefault();

  var nama = document.getElementById("regNama").value;
  var username = document.getElementById("regUsername").value;
  var email = document.getElementById("regEmail").value;
  var password = document.getElementById("regPassword").value;
  var pesan = document.getElementById("pesanRegister");

  if (nama === "" || username === "" || email === "" || password === "") {
    pesan.innerHTML = '<div class="alert alert-warning rounded-4">Harap lengkapi semua data pendaftaran!</div>';
  } else {
    alert("Registrasi Berhasil! Silakan login menggunakan akun kamu.");
    window.location.href = "login.html";
  }
}

// 3. Fungsi Menampilkan Detail Informasi Sesuai Pilihan di Halaman Utama
function tampilkanDetail() {
  // Cek apakah elemen judulDetail ada di halaman saat ini
  var elJudul = document.getElementById("judulDetail");
  if (!elJudul) return;

  // Mengambil angka ?id=... dari alamat URL browser
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get("id");

  var elKategori = document.getElementById("kategoriDetail");
  var elTanggal = document.getElementById("tanggalDetail");
  var elGambar = document.getElementById("gambarDetail");
  var elIsi = document.getElementById("isiDetail");

  if (id === "2") {
    elJudul.innerText = "Pembukaan Gerai Pastel Garden Dago";
    elKategori.innerText = "Berita Cabang";
    elTanggal.innerText = "18 November 2026";
    elGambar.src = "https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=800&q=80";
    elIsi.innerText = "Mochi & Bloom Patisserie resmi membuka gerai baru bernuansa taman bunga pastel di kawasan Dago, Bandung. Pengunjung dapat menikmati suasana kafe yang nyaman, area foto estetik, serta beragam sajian kue lembut yang dibuat segar setiap hari.";
  } else if (id === "3") {
    elJudul.innerText = "Layanan Hampers Custom Perusahaan";
    elKategori.innerText = "Layanan Korporat";
    elTanggal.innerText = "20 November 2026";
    elGambar.src = "https://images.unsplash.com/photo-1558326567-98ae2405596b?auto=format&fit=crop&w=800&q=80";
    elIsi.innerText = "Kami menyediakan paket bingkisan kue eksklusif dengan kemasan pita pastel yang dapat disesuaikan untuk acara seminar, wisuda, maupun apresiasi klien perusahaan Anda.";
  } else {
    // Default untuk id === "1"
    elJudul.innerText = "Peluncuran Sakura Strawberry Mochi";
    elKategori.innerText = "Produk Unggulan";
    elTanggal.innerText = "15 November 2026";
    elGambar.src = "https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=800&q=80";
    elIsi.innerText = "Sakura Strawberry Mochi merupakan menu unggulan terbaru dari Mochi & Bloom Patisserie. Terbuat dari tepung ketan lembut dengan isian krim vanila dan buah stroberi segar pilihan yang manis dan menyegarkan.";
  }
}

// Jalankan fungsi detail saat halaman selesai dimuat
window.onload = tampilkanDetail;