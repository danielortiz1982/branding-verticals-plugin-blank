const path = require('path');

module.exports = {
  entry: './assets/frontend/scripts/ES6/main.js',
  output: {
    path: path.resolve(__dirname, 'assets/frontend/scripts/dist'),
    filename: 'bv.bundle.js'
  }
};