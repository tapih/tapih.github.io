const path = require('path');
module.exports = {
  mode: 'production',
  entry: './src/index.js',
  output: {
    filename: 'script.js',
    path: path.join(__dirname, 'js/')
  },
};
