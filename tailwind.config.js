/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/views/Components/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      height: {
        'navbar' : '8%',
        'default' : '92%',
      }
    },
  },
  plugins: [],
}