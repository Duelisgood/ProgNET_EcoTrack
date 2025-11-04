/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.html", 
    "./src/**/*.js",   
  ],
  theme: {
    extend: {
      keyframes: {
        'fade-up': {
          '0%': {
            opacity: '0',
            transform: 'translateY(20px)' // Mulai 20px dari bawah
          },
          '100%': {
            opacity: '1',
            transform: 'translateY(0)' // Selesai di posisi asli
          },
        }
      },
      // 2. Buat kelas utilitas animasi
      animation: {
        'fade-up': 'fade-up 1s ease-out forwards',
      },
    },
  },
  plugins: [],
}