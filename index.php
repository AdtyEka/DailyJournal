<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Latihan PHP Login </title>
    <link rel="icon" href="assets/images/icon/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Style untuk Chatbot -->
    <style>
        /* Floating Action Button */
        #chatFloatingBtn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        #chatFloatingBtn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        /* Chat Container */
        #chatbotContainer {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 380px;
            max-width: calc(100vw - 60px);
            z-index: 999;
            display: none;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive untuk mobile */
        @media (max-width: 576px) {
            #chatbotContainer {
                width: calc(100vw - 40px);
                right: 20px;
                bottom: 90px;
            }
            
            #chatFloatingBtn {
                bottom: 20px;
                right: 20px;
                width: 55px;
                height: 55px;
            }
        }

        /* Custom scrollbar untuk chat body */
        #chatbotBody::-webkit-scrollbar {
            width: 6px;
        }

        #chatbotBody::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #chatbotBody::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        #chatbotBody::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tugas Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                </ul>
                <div class="d-flex ms-3">
                    <button id="DarkButton" class="btn btn-dark me-1"><i class="bi bi-moon-fill"></i></button>
                    <button id="lightButton" class="btn btn-danger"><i class="bi bi-brightness-high-fill"></i></button>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <!-- hero begin -->
    <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="assets/images/hero/banner.jpg" class="img-fluid" width="300">
                <div>
                    <h1 class="fw-bold display-4">
                        Create Memories, Save Memories, Everyday
                    </h1>
                    <h4 class="lead display-6">
                        Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali
                    </h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"> </span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->
<!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <!-- gambar article ditampilkan dari folder assets/images/article -->
            <img src="assets/images/article/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/gallery/17-Sumber-Gambar-Ilustrasi-Gratis-Untuk-Website-10.webp"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/gallery/17-Sumber-Gambar-Ilustrasi-Gratis-Untuk-Website-11.webp"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/gallery/Gratisography.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/gallery/pixabay.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/gallery/splitshire.webp" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- gallery end -->
    <!-- schedule start -->
    <section id="schedule" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-5 pb-4">Jadwal Kuliah & Progress</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 align-items-stretch justify-content-center">

                <!-- Senin -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between">
                            <span>SENIN</span>
                            <span class="badge bg-light text-dark">5 SKS</span>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-1">
                                <span class="fw-bold">09:30 – 12:00</span>
                                <br>
                                Log-IF
                                <br>
                                Ruang H.5.12
                            </p>
                            <br>
                            <p class="mb-1">
                                <span class="fw-bold">14:10 – 15:50</span>
                                <br>
                                Basis Data
                                <br>
                                Ruang H.5.10
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Selasa -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-success text-white fw-bold d-flex justify-content-between">
                            <span>SELASA</span>
                            <span class="badge bg-light text-dark">6 SKS</span>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-1">
                                <span class="fw-bold">12:30 – 15:00</span>
                                <br>
                                RPL
                                <br>
                                Ruang H.5.10
                            </p>
                            <br>
                            <p class="mb-1">
                                <span class="fw-bold">15:30 – 18:00</span>
                                <br>
                                SO
                                <br>
                                Ruang H.3.2
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Rabu -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-danger text-white fw-bold d-flex justify-content-between">
                            <span>RABU</span>
                            <span class="badge bg-light text-dark">5 SKS</span>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-1">
                                <span class="fw-bold">09:30 – 12:00</span>
                                <br>
                                Kriptografi
                                <br>
                                Ruang H.5.13
                            </p>
                            <br>
                            <p class="mb-1">
                                <span class="fw-bold">14:10 – 15:50</span>
                                <br>
                                PBW
                                <br>
                                Ruang D.2.J
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kamis -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-warning text-dark fw-bold d-flex justify-content-between">
                            <span>KAMIS</span>
                            <span class="badge bg-light text-dark">2 SKS</span>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-1">
                                <span class="fw-bold">14:10 – 15:50</span>
                                <br>
                                Basis Data
                                <br>
                                Ruang D.2.K
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Jumat -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-info text-white fw-bold d-flex justify-content-between">
                            <span>JUMAT</span>
                            <span class="badge bg-light text-dark">6 SKS</span>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-1">
                                <span class="fw-bold">09:30 – 12:00</span>
                                <br>
                                Probstat
                                <br>
                                Ruang H.3.2
                            </p>
                            <br>
                            <p class="mb-1">
                                <span class="fw-bold">12:30 – 15:00</span>
                                <br>
                                Data Mining
                                <br>
                                Kulino
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- schedule end -->
    <!-- profile start -->
    <section id="profile" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-4">Profil Mahasiswa</h1>

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
                <!-- FOTO PROFIL -->
                <div class="text-center mb-4 mb-md-0 me-md-5">
                    <img src="assets/images/profile/profile.jpeg" class="rounded-circle shadow" width="200" height="250"
                        alt="Foto Profil" />
                </div>

                <!-- CARD PROFIL -->
                <div class="card shadow-sm col-15 col-md-8">
                    <div class="card-body text-start">
                        <h5 class="fw-light mb-4 text-center text-md-center">
                            Mahasiswa Teknik Informatika
                        </h5>
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-4">Nama</th>
                                    <td>Aditya Eka Narayan</td>
                                </tr>
                                <tr>
                                    <th scope="row">NIM</th>
                                    <td>A11.2024.15940</td>
                                </tr>
                                <tr>
                                    <th scope="row">Program Studi</th>
                                    <td>Teknik Informatika</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>111202415940@mhs.dinus.ac.id</td>
                                </tr>
                                <tr>
                                    <th scope="row">Telepon</th>
                                    <td>081575567314</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>Kudus, Jawa Tengah</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile end -->
    <!-- footer begin -->
    <footer class="text-center p-5">
        <div>
            <a href="https://www.instagram.com/adtya.eka?igsh=bGVqanhsdHp5azVi"><i
                    class="bi bi-instagram h-2 p-2 text-dark"></i></a>
            <a href=""><i class="bi bi-twitter-x h-2 p-2 text-dark"></i></a>
            <a href="https://wa.me/+6281575567314"><i class="bi bi-whatsapp h-2 p-2 text-dark"></i></a>
        </div>
        <div>
            Aditya Eka Narayan @2025
        </div>
    </footer>
    <!-- footer end -->
    
    <!-- Floating Action Button untuk Chatbot -->
    <button id="chatFloatingBtn" title="Chat dengan Assistant">
        <i class="bi bi-chat-dots-fill"></i>
    </button>

    <!-- Chat Box Container -->
    <div id="chatbotContainer" class="card shadow-lg">
        <!-- Chat Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-robot me-2"></i>
                <strong>Daily Journal Assistant</strong>
            </div>
            <button id="closeChatbotBtn" class="btn btn-sm btn-light">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Chat Body -->
        <div class="card-body" id="chatbotBody" style="height: 350px; overflow-y: auto; background-color: #f8f9fa;">
            <!-- Pesan selamat datang -->
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 35px; height: 35px;">
                        <i class="bi bi-robot"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-2">
                    <div class="bg-white p-2 rounded shadow-sm">
                        <p class="mb-0 small">Halo! Saya Daily Journal Assistant. Ada yang bisa saya bantu?</p>
                        <small class="text-muted" style="font-size: 0.7rem;">Baru saja</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Footer -->
        <div class="card-footer bg-white p-2">
            <div class="input-group input-group-sm">
                <input type="text" id="chatbotInput" class="form-control" 
                    placeholder="Ketik pesan..." 
                    aria-label="User message">
                <button class="btn btn-primary" type="button" id="sendChatBtn">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
            <!-- Loading indicator -->
            <div id="chatbotLoading" class="text-center mt-2" style="display: none;">
                <div class="spinner-border spinner-border-sm text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <small class="text-muted ms-2">Bot sedang mengetik...</small>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    <script type="text/javascript">
        window.setTimeout("TampilanWaktu()", 1000);

        function TampilanWaktu() {
            let waktu = new Date();
            let bulan = waktu.getMonth() + 1;

            setTimeout("TampilanWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu
                .getSeconds();
        }

        document.getElementById("DarkButton").onclick = () => {
            document.body.classList.add("bg-dark");

            const sections = ["hero", "gallery", "profile"];
            sections.forEach(id => {
                const section = document.getElementById(id);
                section.classList.replace("bg-danger-subtle", "bg-secondary");
                section.classList.add("text-white");
            });

            const sectionss = ["article", "schedule"];
            sectionss.forEach(id => {
                const section = document.getElementById(id);
                section.classList.add("text-white");
                section.querySelectorAll(".card").forEach(card =>
                    card.classList.add("bg-secondary", "text-white")
                );
            });

            const footer = document.querySelector("footer");
            footer.classList.add("text-white");
            footer.querySelectorAll("i").forEach(icon =>
                icon.classList.replace("text-dark", "text-white")
            );
        };


        document.getElementById("lightButton").onclick = () => {
            document.body.classList.remove("bg-dark");

            const sections = ["hero", "gallery", "profile"];
            sections.forEach(id => {
                const section = document.getElementById(id);
                section.classList.replace("bg-secondary", "bg-danger-subtle");
                section.classList.remove("text-white");
            });

            const sectionss = ["article", "schedule"];
            sectionss.forEach(id => {
                const section = document.getElementById(id);
                section.classList.remove("text-white");
                section.querySelectorAll(".card").forEach(card =>
                    card.classList.remove("bg-secondary", "text-white")
                );
            });

            const footer = document.querySelector("footer");
            footer.classList.remove("text-white");
            footer.querySelectorAll("i").forEach(icon =>
                icon.classList.replace("text-white", "text-dark")
            );
        };

        // ========================================
        // CHATBOT FUNCTIONALITY
        // ========================================
        
        // KONFIGURASI WEBHOOK N8N
        // Ganti URL ini dengan webhook URL dari N8n Anda
        const WEBHOOK_URL = 'https://your-n8n-webhook-url.com/webhook/chatbot';

        // Elemen DOM Chatbot
        const chatFloatingBtn = document.getElementById('chatFloatingBtn');
        const chatbotContainer = document.getElementById('chatbotContainer');
        const closeChatbotBtn = document.getElementById('closeChatbotBtn');
        const chatbotBody = document.getElementById('chatbotBody');
        const chatbotInput = document.getElementById('chatbotInput');
        const sendChatBtn = document.getElementById('sendChatBtn');
        const chatbotLoading = document.getElementById('chatbotLoading');

        // Event Listeners untuk Chatbot
        
        // Buka chat box ketika floating button diklik
        chatFloatingBtn.addEventListener('click', function() {
            chatbotContainer.style.display = 'block';
            chatbotInput.focus();
        });

        // Tutup chat box
        closeChatbotBtn.addEventListener('click', function() {
            chatbotContainer.style.display = 'none';
        });

        // Kirim pesan dengan tombol
        sendChatBtn.addEventListener('click', function() {
            sendChatMessage();
        });

        // Kirim pesan dengan Enter
        chatbotInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendChatMessage();
            }
        });

        // Fungsi untuk mengirim pesan
        function sendChatMessage() {
            const message = chatbotInput.value.trim();
            
            if (message === '') {
                return;
            }

            // Tampilkan pesan user
            displayChatUserMessage(message);
            
            // Kosongkan input
            chatbotInput.value = '';
            
            // Tampilkan loading
            chatbotLoading.style.display = 'block';
            
            // Kirim ke webhook
            sendToN8nWebhook(message);
        }

        // Fungsi menampilkan pesan user
        function displayChatUserMessage(message) {
            const messageHtml = `
                <div class="d-flex mb-3 justify-content-end">
                    <div class="flex-grow-1 me-2 text-end">
                        <div class="bg-primary text-white p-2 rounded shadow-sm d-inline-block" style="max-width: 75%;">
                            <p class="mb-0 small">${escapeHtmlChat(message)}</p>
                            <small class="text-white-50" style="font-size: 0.7rem;">${getCurrentTimeChat()}</small>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 35px; height: 35px;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>
                </div>
            `;
            
            chatbotBody.insertAdjacentHTML('beforeend', messageHtml);
            scrollChatToBottom();
        }

        // Fungsi menampilkan pesan bot
        function displayChatBotMessage(message) {
            const messageHtml = `
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 35px; height: 35px;">
                            <i class="bi bi-robot"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <div class="bg-white p-2 rounded shadow-sm" style="max-width: 75%;">
                            <p class="mb-0 small">${escapeHtmlChat(message)}</p>
                            <small class="text-muted" style="font-size: 0.7rem;">${getCurrentTimeChat()}</small>
                        </div>
                    </div>
                </div>
            `;
            
            chatbotBody.insertAdjacentHTML('beforeend', messageHtml);
            scrollChatToBottom();
        }

        // Fungsi kirim ke N8n webhook
        async function sendToN8nWebhook(message) {
            try {
                const response = await fetch(WEBHOOK_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        message: message,
                        timestamp: new Date().toISOString(),
                        source: 'daily-journal-chatbot',
                        page: 'index'
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                
                // Sembunyikan loading
                chatbotLoading.style.display = 'none';

                // Tampilkan response dari bot
                const botReply = data.reply || data.message || 'Maaf, saya tidak mengerti.';
                displayChatBotMessage(botReply);

            } catch (error) {
                console.error('Error:', error);
                chatbotLoading.style.display = 'none';
                
                // Tampilkan pesan error
                displayChatBotMessage('Maaf, terjadi kesalahan koneksi. Silakan coba lagi nanti.');
            }
        }

        // Fungsi helper
        function scrollChatToBottom() {
            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        function getCurrentTimeChat() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function escapeHtmlChat(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
    </script>
</body>
</html>