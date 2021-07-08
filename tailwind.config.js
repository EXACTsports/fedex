module.exports = {
  purge: ["./resources/**/*.blade.php", "./resources/**/*.js"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      minHeight: {
        "1/4": "25vh",
        "1/2": "50vh",
        "3/4": "75vh"
      },
      zIndex: {
        "-10": "-10"
      }
    }
  },
  variants: {
    extend: {}
  },
  plugins: []
};
