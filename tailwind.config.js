module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js',
  },
  theme: {
    extend: {
      fontFamily : {
        sans : ['Poppins', "sans-serif"],
      },
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}