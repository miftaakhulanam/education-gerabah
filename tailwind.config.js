/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}", "./public/**/*.{html,js,php}", "./**/*.{html,js,php}", "./*.{html,js,php}", "./login.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
