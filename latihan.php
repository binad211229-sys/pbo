<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetStore</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fade-in {
            animation: fadeIn 0.2s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-300 min-h-screen">

    <!-- HALAMAN LOGIN / PILIH ROLE -->
    <div id="loginPage" class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-8 max-w-md w-full border border-white/20 backdrop-blur-lg animate-fade-in text-center">
            
            <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z"></path>
                </svg>
            </div>

            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">Selamat Datang!</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">Silakan pilih peran Anda untuk melanjutkan ke <span class="font-semibold text-indigo-600 dark:text-indigo-400">GadgetStore</span></p>

            <!-- Tampilan Pilihan Role -->
            <div id="roleSelection" class="space-y-4">
                <button onclick="loginAsBuyer()" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-emerald-500/30 transition transform active:scale-95 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z"></path></svg>
                    <span>Masuk sebagai Pembeli</span>
                </button>

                <button onclick="showAdminForm()" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-indigo-600/30 transition transform active:scale-95 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span>Masuk sebagai Admin</span>
                </button>
            </div>

            <!-- Form Password Admin (Otomatis Terisi) -->
            <form id="adminForm" onsubmit="loginAsAdmin(event)" class="hidden space-y-4 text-left mt-4 animate-fade-in">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 mb-1">Password Admin</label>
                    <input type="password" id="adminPassword" value="admin123" required class="w-full p-3 border rounded-xl dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 outline-none text-gray-900 dark:text-white font-mono text-center text-lg tracking-widest">
                </div>
                <div class="flex space-x-2">
                    <button type="button" onclick="hideAdminForm()" class="w-1/3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 py-3 rounded-xl font-medium transition">Batal</button>
                    <button type="submit" class="w-2/3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-indigo-600/30 transition">Login Admin</button>
                </div>
            </form>
        </div>
    </div>

    <!-- HALAMAN UTAMA / DASHBOARD STORE -->
    <div id="mainDashboard" class="hidden">
        <!-- Header / Navbar -->
        <header class="sticky top-0 z-40 bg-white dark:bg-gray-800 shadow-md transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">GadgetStore</h1>
                
                <div class="flex items-center space-x-3">
                    <!-- Toggle Mode Pembeli / Admin -->
                    <button id="toggleModeBtn" onclick="toggleModeRole()" class="px-3 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 hover:opacity-80 transition">
                        Mode Pembeli
                    </button>

                    <!-- Toggle Dark / Light Theme -->
                    <button onclick="toggleTheme()" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        <svg id="themeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>

                    <!-- Tombol Logout -->
                    <button onclick="bukaModalLogout()" class="flex items-center space-x-1 bg-rose-500 hover:bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs sm:text-sm font-medium transition shadow-md hover:shadow-rose-500/30">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Fitur Khusus Mode Admin: Tambah Produk -->
            <div id="adminPanel" class="hidden mb-8 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-indigo-200 dark:border-indigo-900">
                <h2 class="text-xl font-bold mb-4 text-indigo-600 dark:text-indigo-400">Tambah Produk Baru (Admin)</h2>
                <form id="formTambahProduk" onsubmit="tambahProduk(event)" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" id="nama" placeholder="Nama Produk" required class="p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <input type="number" id="harga" placeholder="Harga (Rp)" required class="p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <input type="url" id="gambar" placeholder="URL Gambar Produk" required class="p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <input type="url" id="video" placeholder="URL Embed / Watch YouTube" class="p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <textarea id="deskripsi" placeholder="Deskripsi Produk" rows="2" class="md:col-span-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                    <button type="submit" class="md:col-span-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition">Simpan Produk</button>
                </form>
            </div>

            <!-- Filter & Search Bar -->
            <div class="mb-8 max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" id="searchInput" oninput="renderProduk()" placeholder="Cari gadget impian Anda..." class="w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Grid Katalog Produk -->
            <div id="produkGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
        </main>
    </div>

    <!-- Modal Edit Produk -->
    <div id="modalEdit" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-xl max-w-lg w-full p-6 shadow-2xl border border-gray-200 dark:border-gray-700 animate-fade-in">
            <h3 class="text-lg font-bold mb-4 text-indigo-600 dark:text-indigo-400">Edit Produk</h3>
            <form id="formEditProduk" onsubmit="simpanEditProduk(event)" class="space-y-3">
                <input type="hidden" id="editId">
                <input type="text" id="editNama" required class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <input type="number" id="editHarga" required class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <input type="url" id="editGambar" required class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <input type="url" id="editVideo" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <textarea id="editDeskripsi" rows="3" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" onclick="tutupModalEdit()" class="px-4 py-2 rounded-lg bg-gray-300 dark:bg-gray-600 hover:opacity-80">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Notifikasi Logout Estetik -->
    <div id="modalLogout" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-2xl max-w-sm w-full p-6 text-center shadow-2xl border border-gray-200 dark:border-gray-700 animate-fade-in">
            <div class="w-12 h-12 bg-rose-100 dark:bg-rose-900/50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Konfirmasi Logout</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">Apakah Anda yakin ingin keluar dari aplikasi GadgetStore?</p>
            <div class="flex space-x-3">
                <button onclick="tutupModalLogout()" class="flex-1 py-2.5 rounded-xl bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium transition">Batal</button>
                <button onclick="prosesLogout()" class="flex-1 py-2.5 rounded-xl bg-rose-500 hover:bg-rose-600 text-white font-semibold shadow-lg hover:shadow-rose-500/30 transition">Ya, Logout</button>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        // Helper Konversi URL YouTube
        function fixYouTubeUrl(url) {
            if (!url) return '';
            if (url.includes("watch?v=")) {
                return "https://www.youtube.com/embed/" + url.split("v=")[1].split("&")[0];
            } else if (url.includes("youtu.be/")) {
                return "https://www.youtube.com/embed/" + url.split("youtu.be/")[1].split("?")[0];
            }
            return url;
        }

        // Data Produk Utama
        let dataProduk = [
            {
                id: 101,
                nama: "MacBook Pro 16\" M3 Max",
                harga: 39999000,
                deskripsi: "Chipset M3 Max 16-Core, RAM 36GB, SSD 1TB. Performa super kencang untuk rendering 3D, editing video 8K, dan komputasi berat.",
                gambar: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=800&q=80",
                video: fixYouTubeUrl("https://youtu.be/fgfyEtqHhdI?si=-pc5yWpCtPM-COee")
            },
            {
                id: 102,
                nama: "iPhone 15 Pro Max 256GB",
                harga: 24999000,
                deskripsi: "Bodi Titanium kelas penerbangan, Chipset A17 Pro, Kamera Utama 48MP dengan 5x Optical Zoom, serta port USB-C kencang.",
                gambar: "https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80",
                video: fixYouTubeUrl("https://youtu.be/keYat4iSYAQ?si=Lvvtr8kardFArffr")
            },
            {
                id: 103,
                nama: "Sony WH-1000XM5 Wireless Headphones",
                harga: 5999000,
                deskripsi: "Headphone Noise Cancelling nirkabel terbaik di kelasnya. Baterai tahan hingga 30 jam, mikrofon jernih, dan Audio Hi-Res.",
                gambar: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80",
                video: fixYouTubeUrl("https://youtu.be/v6EjmbMgv80?si=PWYOKJTfcTW8TWuW")
            },
            {
                id: 104,
                nama: "iPad Pro 12.9\" M2 WiFi 256GB",
                harga: 18499000,
                deskripsi: "Layar Liquid Retina XDR Mini-LED, ditenagai Chip M2 super cepat, fitur Apple Pencil Hover, dan port Thunderbolt.",
                gambar: "https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=800&q=80",
                video: fixYouTubeUrl("https://youtu.be/nNI_x-WVTM0?si=m29ZGxd56YbfpQAF")
            },
            {
                id: 105,
                nama: "Samsung Galaxy S24 Ultra 5G",
                harga: 21999000,
                deskripsi: "Dilengkapi Galaxy AI, S-Pen terintegrasi, Kamera 200MP dengan Space Zoom 100x, dan Snapdragon 8 Gen 3 for Galaxy.",
                gambar: "https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=800&q=80",
                video: fixYouTubeUrl("https://youtu.be/ePdbj2bZ-Ro?si=zTxB4vvHsr219M55")
            }
        ];

        let isAdmin = false;

        // FUNGSI ALUR LOGIN & LOGOUT
        function showAdminForm() {
            document.getElementById('roleSelection').classList.add('hidden');
            document.getElementById('adminForm').classList.remove('hidden');
        }

        function hideAdminForm() {
            document.getElementById('adminForm').classList.add('hidden');
            document.getElementById('roleSelection').classList.remove('hidden');
        }

        function loginAsBuyer() {
            isAdmin = false;
            updateModeUI();
            masukKeDashboard();
        }

        function loginAsAdmin(e) {
            e.preventDefault();
            const pass = document.getElementById('adminPassword').value;
            if (pass === "admin123") {
                isAdmin = true;
                updateModeUI();
                masukKeDashboard();
            } else {
                alert("Password Salah!");
            }
        }

        function masukKeDashboard() {
            document.getElementById('loginPage').classList.add('hidden');
            document.getElementById('mainDashboard').classList.remove('hidden');
            renderProduk();
        }

        function bukaModalLogout() {
            document.getElementById('modalLogout').classList.remove('hidden');
            document.getElementById('modalLogout').classList.add('flex');
        }

        function tutupModalLogout() {
            document.getElementById('modalLogout').classList.add('hidden');
            document.getElementById('modalLogout').classList.remove('flex');
        }

        function prosesLogout() {
            tutupModalLogout();
            hideAdminForm();
            document.getElementById('mainDashboard').classList.add('hidden');
            document.getElementById('loginPage').classList.remove('hidden');
        }

        // Format Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(angka);
        }

        // Toggle Dark Theme
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
        }

        // Update UI berdasarkan status Admin / Pembeli
        function updateModeUI() {
            const btn = document.getElementById('toggleModeBtn');
            const adminPanel = document.getElementById('adminPanel');

            if (isAdmin) {
                btn.innerText = 'Mode Admin';
                btn.className = 'px-3 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200 hover:opacity-80 transition';
                adminPanel.classList.remove('hidden');
            } else {
                btn.innerText = 'Mode Pembeli';
                btn.className = 'px-3 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 hover:opacity-80 transition';
                adminPanel.classList.add('hidden');
            }
        }

        function toggleModeRole() {
            isAdmin = !isAdmin;
            updateModeUI();
            renderProduk();
        }

        // Render List Produk
        function renderProduk() {
            const container = document.getElementById('produkGrid');
            const keyword = document.getElementById('searchInput').value.toLowerCase();
            container.innerHTML = '';

            const filteredData = dataProduk.filter(item => 
                item.nama.toLowerCase().includes(keyword) || 
                item.deskripsi.toLowerCase().includes(keyword)
            );

            filteredData.forEach(item => {
                const card = document.createElement('div');
                card.className = 'bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col justify-between transition hover:shadow-xl';

                card.innerHTML = `
                    <div>
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-900">
                            <img src="${item.gambar}" alt="${item.nama}" class="w-full h-full object-cover">
                            <span class="absolute top-2 left-2 bg-black/60 text-white text-xs px-2 py-1 rounded-md font-medium">Ready Stock</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">${item.nama}</h3>
                            <p class="text-xl font-extrabold text-emerald-600 dark:text-emerald-400 mb-3">${formatRupiah(item.harga)}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">${item.deskripsi}</p>
                            
                            ${item.video ? `
                                <div class="relative w-full aspect-video rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 mb-4 bg-black">
                                    <iframe src="${item.video}" title="${item.nama}" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                    
                    <div class="p-5 pt-0">
                        ${isAdmin ? `
                            <div class="flex space-x-2">
                                <button onclick="bukaModalEdit(${item.id})" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white py-2 rounded-lg font-medium text-sm transition">Edit</button>
                                <button onclick="hapusProduk(${item.id})" class="flex-1 bg-rose-600 hover:bg-rose-700 text-white py-2 rounded-lg font-medium text-sm transition">Hapus</button>
                            </div>
                        ` : `
                            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-lg font-semibold flex items-center justify-center space-x-2 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                                <span>Beli Sekarang</span>
                            </button>
                        `}
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Tambah Produk
        function tambahProduk(e) {
            e.preventDefault();
            const nama = document.getElementById('nama').value;
            const harga = parseInt(document.getElementById('harga').value);
            const gambar = document.getElementById('gambar').value;
            const video = fixYouTubeUrl(document.getElementById('video').value);
            const deskripsi = document.getElementById('deskripsi').value;

            dataProduk.unshift({
                id: Date.now(),
                nama, harga, gambar, video, deskripsi
            });

            document.getElementById('formTambahProduk').reset();
            renderProduk();
        }

        // Hapus Produk
        function hapusProduk(id) {
            if (confirm('Yakin ingin menghapus produk ini?')) {
                dataProduk = dataProduk.filter(item => item.id !== id);
                renderProduk();
            }
        }

        // Modal Edit
        function bukaModalEdit(id) {
            const item = dataProduk.find(p => p.id === id);
            if (!item) return;

            document.getElementById('editId').value = item.id;
            document.getElementById('editNama').value = item.nama;
            document.getElementById('editHarga').value = item.harga;
            document.getElementById('editGambar').value = item.gambar;
            document.getElementById('editVideo').value = item.video || '';
            document.getElementById('editDeskripsi').value = item.deskripsi;

            document.getElementById('modalEdit').classList.remove('hidden');
            document.getElementById('modalEdit').classList.add('flex');
        }

        function tutupModalEdit() {
            document.getElementById('modalEdit').classList.add('hidden');
            document.getElementById('modalEdit').classList.remove('flex');
        }

        function simpanEditProduk(e) {
            e.preventDefault();
            const id = parseInt(document.getElementById('editId').value);
            const item = dataProduk.find(p => p.id === id);

            if (item) {
                item.nama = document.getElementById('editNama').value;
                item.harga = parseInt(document.getElementById('editHarga').value);
                item.gambar = document.getElementById('editGambar').value;
                item.video = fixYouTubeUrl(document.getElementById('editVideo').value);
                item.deskripsi = document.getElementById('editDeskripsi').value;
            }

            tutupModalEdit();
            renderProduk();
        }
    </script>
</body>
</html>