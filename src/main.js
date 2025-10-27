// src/main.js

document.addEventListener("DOMContentLoaded", function() {
    
    // === Bagian 1: Kode Typewriter ===
    const dynamicTextElement = document.getElementById('dynamic-text');
    // Pengecekan jika elemen ada
    if (dynamicTextElement) { 
        // Ganti array ini dengan teks yang Anda inginkan
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
                if (textIndex >= textArray.length) {
                    textIndex = 0;
                }
                setTimeout(typeWriter, typingSpeed + 500); 
            }
        }

        // Mulai typewriter HANYA JIKA elemennya ada
        if(textArray.length) setTimeout(typeWriter, newTextDelay);
    } // Akhir dari Pengecekan dynamicTextElement

    
    // === Bagian 2: Kode Navbar Highlighter ===
    const navContainer = document.getElementById('nav-links-container');
    const highlighter = document.getElementById('nav-highlighter');
    const navLinks = document.querySelectorAll('.nav-link'); 

 
    if (navContainer && highlighter && navLinks.length) {
        

        function moveHighlighter(e) {
            const link = e.target; 
            
         
            highlighter.style.width = `${link.offsetWidth}px`;
            
        
            highlighter.style.left = `${link.offsetLeft}px`;
            

            highlighter.style.opacity = '1';
        }

     
        function hideHighlighter() {
            highlighter.style.opacity = '0';
        }

       
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', moveHighlighter);
        });

        
        navContainer.addEventListener('mouseleave', hideHighlighter);
    }

}); 