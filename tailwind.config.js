// tailwind.config.js

const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: [
    "./*.{html,php}", // <-- Tambahkan .html di sini
    "./src/**/*.{js,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
};
