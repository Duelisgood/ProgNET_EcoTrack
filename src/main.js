// src/main.js

document.addEventListener("DOMContentLoaded", function () {

    // === Bagian 1: Kode Typewriter ===
    const dynamicTextElement = document.getElementById('dynamic-text');
    if (dynamicTextElement) {
        const textArray = [
            "Hanya butuh 30 detik untuk melaporkan titik sampah di lingkungan Anda.",
            "Sampah liar adalah masalah lokal. EcoTrack mengubahnya menjadi peta aksi komunitas real-time.",
            "Jadilah mata bagi lingkungan. Laporan Anda adalah langkah awal perubahan nyata."
        ];

        let textIndex = 0;
        let charIndex = 0;
        const typingSpeed = 50;
        const erasingSpeed = 30;
        const newTextDelay = 1500;

        function typeWriter() {
            if (charIndex < textArray[textIndex].length) {
                dynamicTextElement.textContent += textArray[textIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeWriter, typingSpeed);
            } else {
                setTimeout(eraseText, newTextDelay);
            }
        }

        function eraseText() {
            if (charIndex > 0) {
                dynamicTextElement.textContent = textArray[textIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(eraseText, erasingSpeed);
            } else {
                textIndex++;
                if (textIndex >= textArray.length) textIndex = 0;
                setTimeout(typeWriter, typingSpeed + 500);
            }
        }

        if (textArray.length) setTimeout(typeWriter, newTextDelay);
    }


    // === Bagian 2: Navbar Highlighter ===
    const navContainer = document.getElementById('nav-links-container');
    const highlighter = document.getElementById('nav-highlighter');
    const navLinks = document.querySelectorAll('.nav-link');
    const extraLinks = document.querySelectorAll('#login-btn');
    const allLinks = [...navLinks, ...extraLinks];

    if (navContainer && highlighter && allLinks.length) {

        function moveHighlighter(e) {
            const link = e.target;
            highlighter.style.width = `${link.offsetWidth}px`;
            highlighter.style.left = `${link.offsetLeft}px`;
            highlighter.style.opacity = '1';
        }

        function hideHighlighter() {
            highlighter.style.opacity = '0';
        }

        allLinks.forEach(link => {
            link.addEventListener('mouseenter', moveHighlighter);
        });

        navContainer.addEventListener('mouseleave', hideHighlighter);
    }


    // === Bagian 3: Peta (Map) ===
    if (document.getElementById('map')) {
        const map = L.map('map').setView([-8.7964, 115.1765], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    }


    // === Bagian 4: Login Form ===
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username === "" || password === "") {
                alert("Please enter both username and password!");
                return;
            }

            localStorage.setItem("username", username);
            alert("Login successful!");
            window.location.href = "index.html";
        });
    }

const animatedElements = document.querySelectorAll('[data-animate="fade-up"]');

    // 2. Siapkan opsi untuk 'observer'
    const observerOptions = {
        root: null, // 'null' berarti mengamati viewport
        rootMargin: '0px',
        threshold: 0.1 // Trigger saat 10% elemen terlihat
    };

    // 3. Buat fungsi 'callback' yang akan dijalankan saat elemen terlihat
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            // Cek apakah elemennya sekarang terlihat (intersecting)
            if (entry.isIntersecting) {
                // Tambahkan kelas animasi Anda
                entry.target.classList.add('animate-fade-up');
                
                // (Opsional) Hapus opacity-0 jika perlu, 
                // tapi animasi 'forwards' Anda harusnya sudah menanganinya
                entry.target.classList.remove('opacity-0'); 

                // Hentikan pengamatan elemen ini agar animasi tidak berulang
                observer.unobserve(entry.target);
            }
        });
    };

    // 4. Buat 'observer' baru
    const scrollObserver = new IntersectionObserver(observerCallback, observerOptions);

    // 5. Mulai amati setiap elemen
    animatedElements.forEach(el => scrollObserver.observe(el));
    
});