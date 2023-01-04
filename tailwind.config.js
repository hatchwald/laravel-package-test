/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./resources/views/**/*.blade.php"
],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms')
],
}