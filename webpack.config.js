const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = {
  mode: "development",
  entry: "./src/js/index.js",
  output: {
    filename: "js/script.js",
    path: path.join(__dirname, "dist")
  },
  devServer: {
    contentBase: path.resolve(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          "style-loader",
          "css-loader",
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [require("postcss-nested")]
              }
            }
          },
          "sass-loader"
        ]
      },
      {
        test: /\.(jpg|svg)$/,
        loader: "file-loader",
        options: {
          name: "[name].[ext]",
          outputPath: "css/img",
          publicPath: "css/img"
        }
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: "src/index.html"
    })
  ]
};
