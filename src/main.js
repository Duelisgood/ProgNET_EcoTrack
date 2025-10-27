// src/main.js

const dynamicTextElement = document.getElementById('dynamic-text');
const textArray = [
    "Bersama wujudkan Indonesia Bersih.",
    "Layanan pelaporan sampah real-time.",
    "Bantu komunitas Anda lebih hijau.",
    "Kontribusi kecil, dampak besar."
];

let textIndex = 0;
let charIndex = 0;
const typingSpeed = 70; // Kecepatan ketik (ms per karakter)
const erasingSpeed = 50; // Kecepatan hapus (ms per karakter)
const newTextDelay = 1500; // Jeda sebelum teks baru diketik (ms)

function typeWriter() {
    if (charIndex < textArray[textIndex].length) {
        dynamicTextElement.textContent += textArray[textIndex].charAt(charIndex);
        charIndex++;
        setTimeout(typeWriter, typingSpeed);
    } else {
        // Mulai menghapus teks setelah jeda
        setTimeout(eraseText, newTextDelay);
    }
}

function eraseText() {
    if (charIndex > 0) {
        // Hapus karakter terakhir
        dynamicTextElement.textContent = textArray[textIndex].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(eraseText, erasingSpeed);
    } else {
        // Pindah ke teks berikutnya
        textIndex++;
        if (textIndex >= textArray.length) {
            textIndex = 0; // Kembali ke teks pertama
        }
        // Mulai mengetik teks baru
        setTimeout(typeWriter, typingSpeed + 500); 
    }
}

// Mulai efek saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
    if(textArray.length) setTimeout(typeWriter, newTextDelay);
});