module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'primary': '#282846',
        'secondary': '#024275',
        'ternary': '#D5FAFC',
      },
      fontFamily: {
        'sans': ['Poppins', 'Helvetica', 'Arial', 'sans-serif'],
        'awaw': ['Goblin One']
      }
    },
    container: {
      padding: {
        DEFAULT: '2rem'
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
