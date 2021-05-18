module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'primary': '#282846',
        'secondary': '#F99746',
        'ternary': '#E9FCFD',
        'danger': '#FA3E3E'
      },
      fontFamily: {
        'sans': ['Poppins', 'Helvetica', 'Arial', 'sans-serif'],
        'awaw': ['Goblin One']
      }
    },
    container: {
      padding: {
        DEFAULT: '4rem'
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
