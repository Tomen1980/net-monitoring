/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        'Fredoka': ['Fredoka', 'sans-serif'],
    },
  },
  plugins: [],
}
}
