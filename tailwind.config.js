/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}", "./public/**/*.{html,js,php}", "./**/*.{html,js,php}", "./*.{html,js,php}", "./login.{html,js,php}"],
  theme: {
    container: {
      center: true,
      padding: "4rem",
    },
    extend: {},
  },
  plugins: [require("flowbite/plugin"), require("@tailwindcss/line-clamp")],
};
