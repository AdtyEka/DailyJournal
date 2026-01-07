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
    <link rel="stylesheet" href="app.css">
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
        <img src="assets/images/chatbot/logo.png" alt="Chatbot">
    </button>

    <!-- Chat Box Container -->
    <div id="chatbotContainer" class="shadow-lg">
        <!-- Chat Header -->
        <div class="chat-header-custom d-flex justify-content-between align-items-center">
            <div class="chat-header-main">
                <div class="chat-header-logo">
                    <img src="assets/images/chatbot/logo.png" alt="Bot Logo">
                </div>
                <div class="chat-header-title">
                    <span class="chat-header-name">Daily Journal Assistant</span>
                    <span class="chat-header-status">
                        <span class="chat-header-status-dot"></span>
                        Online
                    </span>
                </div>
            </div>
            <div class="chat-header-menu" id="closeChatbotBtn">
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>

        <!-- Chat Body -->
        <div id="chatbotBody" style="height: 400px; overflow-y: auto;">
            <!-- Pesan selamat datang -->
            <div class="d-flex mb-3 align-items-end">
                <div class="chat-avatar chat-avatar-bot me-2">
                    <img src="assets/images/chatbot/logo.png" alt="Bot" class="chat-avatar-img">
                </div>
                <div>
                    <div class="chat-message-bot">
                        <div style="line-height: 1.7;">
                            Halo! 👋 Saya <strong>Daily Journal Assistant</strong>.
                            <br><br>
                            Ada yang bisa saya bantu hari ini?
                        </div>
                    </div>
                    <small class="chat-timestamp text-muted">Baru saja</small>
                </div>
            </div>
        </div>

        <!-- Chat Footer -->
        <div class="chat-input-wrapper">
            <div class="input-group">
                <input type="text" id="chatbotInput" class="form-control" 
                    placeholder="Ketik pesan Anda..." 
                    aria-label="User message">
                <button class="btn" type="button" id="sendChatBtn">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
            <!-- Loading indicator -->
            <div id="chatbotLoading" class="text-center mt-2" style="display: none;">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <small class="text-muted ms-2">Assistant sedang mengetik...</small>
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
        // Webhook n8n lokal
        const WEBHOOK_URL = 'http://localhost:5678/webhook/d0d60e60-b900-40c2-ac83-adc2e519da86/chat';

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
                <div class="d-flex mb-3 justify-content-end align-items-end">
                    <div class="me-2 text-end">
                        <div class="chat-message-user">
                            <div>${escapeHtmlChat(message)}</div>
                        </div>
                        <small class="chat-timestamp">${getCurrentTimeChat()}</small>
                    </div>
                    <div class="chat-avatar chat-avatar-user">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>
            `;
            
            chatbotBody.insertAdjacentHTML('beforeend', messageHtml);
            scrollChatToBottom();
        }

        // Fungsi menampilkan pesan bot dengan format yang lebih baik
        function displayChatBotMessage(message) {
            // Format pesan untuk tampilan yang lebih baik
            const formattedMessage = formatBotMessage(message);
            
            const messageHtml = `
                <div class="d-flex mb-3 align-items-end">
                    <div class="chat-avatar chat-avatar-bot me-2">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div>
                        <div class="chat-message-bot">
                            ${formattedMessage}
                        </div>
                        <small class="chat-timestamp text-muted">${getCurrentTimeChat()}</small>
                    </div>
                </div>
            `;
            
            chatbotBody.insertAdjacentHTML('beforeend', messageHtml);
            scrollChatToBottom();
        }

        // Fungsi untuk memformat pesan bot agar lebih rapi
        function formatBotMessage(message) {
            if (!message) return '';
            
            // Escape HTML dulu untuk keamanan
            let formatted = escapeHtmlChat(message);
            
            // Support untuk bold text dengan **text**
            formatted = formatted.replace(/\*\*([^\*\n]+?)\*\*/g, '<strong>$1</strong>');
            
            // Support untuk italic dengan *text* (hindari conflict dengan bold)
            formatted = formatted.replace(/(?<!\*)\*([^\*\n]+?)\*(?!\*)/g, '<em>$1</em>');
            
            // Process line by line untuk handle lists dan paragraf
            let lines = formatted.split('\n');
            let html = [];
            let currentParagraph = [];
            let inList = false;
            let listItems = [];
            let listType = '';
            
            for (let i = 0; i < lines.length; i++) {
                let line = lines[i].trim();
                
                // Deteksi bullet point list (-, •, *)
                let bulletMatch = line.match(/^[\-\•]\s+(.+)$/);
                // Deteksi numbered list (1., 2., dll)
                let numberMatch = line.match(/^(\d+)\.\s+(.+)$/);
                
                if (bulletMatch) {
                    // Tutup paragraph sebelumnya jika ada
                    if (currentParagraph.length > 0) {
                        html.push('<div style="margin-bottom: 0.8em; line-height: 1.7;">' + currentParagraph.join(' ') + '</div>');
                        currentParagraph = [];
                    }
                    
                    // Mulai atau lanjutkan list
                    if (!inList || listType !== 'ul') {
                        if (inList) {
                            // Tutup list sebelumnya
                            html.push(wrapListItems(listItems, listType));
                            listItems = [];
                        }
                        inList = true;
                        listType = 'ul';
                    }
                    listItems.push(bulletMatch[1]);
                    
                } else if (numberMatch) {
                    // Tutup paragraph sebelumnya jika ada
                    if (currentParagraph.length > 0) {
                        html.push('<div style="margin-bottom: 0.8em; line-height: 1.7;">' + currentParagraph.join(' ') + '</div>');
                        currentParagraph = [];
                    }
                    
                    // Mulai atau lanjutkan list
                    if (!inList || listType !== 'ol') {
                        if (inList) {
                            html.push(wrapListItems(listItems, listType));
                            listItems = [];
                        }
                        inList = true;
                        listType = 'ol';
                    }
                    listItems.push(numberMatch[2]);
                    
                } else {
                    // Tutup list jika ada
                    if (inList) {
                        html.push(wrapListItems(listItems, listType));
                        listItems = [];
                        inList = false;
                        listType = '';
                    }
                    
                    // Handle paragraf normal
                    if (line === '') {
                        // Empty line = paragraph break
                        if (currentParagraph.length > 0) {
                            html.push('<div style="margin-bottom: 0.8em; line-height: 1.7;">' + currentParagraph.join(' ') + '</div>');
                            currentParagraph = [];
                        }
                    } else {
                        // Tambahkan ke current paragraph
                        currentParagraph.push(line);
                    }
                }
            }
            
            // Tutup paragraph atau list terakhir
            if (inList && listItems.length > 0) {
                html.push(wrapListItems(listItems, listType));
            } else if (currentParagraph.length > 0) {
                html.push('<div style="margin-bottom: 0; line-height: 1.7;">' + currentParagraph.join(' ') + '</div>');
            }
            
            return html.join('');
        }
        
        // Helper function untuk wrap list items
        function wrapListItems(items, type) {
            if (items.length === 0) return '';
            
            const tag = type === 'ul' ? 'ul' : 'ol';
            const style = 'margin: 0.5em 0 0.8em 0; padding-left: 1.5em; line-height: 1.7;';
            
            let listHtml = `<${tag} style="${style}">`;
            items.forEach(item => {
                listHtml += `<li style="margin: 0.3em 0;">${item}</li>`;
            });
            listHtml += `</${tag}>`;
            
            return listHtml;
        }

        // Fungsi kirim ke N8n webhook (ASYNC / AWAIT + ERROR HANDLING)
        async function sendToN8nWebhook(message) {
            // Payload sesuai spesifikasi - format untuk n8n chat
            const payload = {
                chatInput: String(message),
                message: String(message),
                input: String(message),
                sessionId: 'daily-journal-session-' + Date.now(),
                timestamp: new Date().toISOString(),
                source: 'daily-journal-chatbot'
            };

            try {
                const response = await fetch(WEBHOOK_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                // Coba parse JSON, tapi jangan crash kalau JSON tidak valid / kosong
                let data = null;
                try {
                    data = await response.json();
                } catch (parseError) {
                    console.warn('Response bukan JSON yang valid atau kosong:', parseError);
                }

                // Jika HTTP status bukan 2xx, anggap error
                if (!response.ok) {
                    const serverMessage =
                        data && (data.error || data.reply || data.message);

                    const friendlyError =
                        serverMessage && typeof serverMessage === 'string'
                            ? serverMessage
                            : 'Maaf, terjadi kesalahan di server. Silakan coba lagi nanti.';

                    displayChatBotMessage(friendlyError);
                    return;
                }

                // Ambil reply dari field "output", "reply" atau "message"
                const botReply =
                    data && (data.output || data.reply || data.message);

                if (botReply && typeof botReply === 'string' && botReply.trim() !== '') {
                    displayChatBotMessage(botReply);
                } else {
                    displayChatBotMessage(
                        'Maaf, saya tidak menerima jawaban yang bisa dipahami dari server.'
                    );
                }
            } catch (error) {
                console.error('Error saat menghubungi webhook N8N:', error);
                displayChatBotMessage(
                    'Maaf, terjadi masalah koneksi. Pastikan server N8N berjalan lalu coba lagi.'
                );
            } finally {
                // Pastikan loading selalu disembunyikan, apapun hasilnya
                if (typeof chatbotLoading !== 'undefined' && chatbotLoading) {
                    chatbotLoading.style.display = 'none';
                }
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