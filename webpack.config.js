'use strict';
var path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin')

module.exports = {
  entry: [
    'webpack/hot/dev-server',
    'webpack-dev-server/client?http://localhost:8080',
    path.resolve(__dirname, 'app/main.js')
  ],
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'bundle.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015']
        }
      }, {
        test: /\.scss$/,
        loader: 'style!css!sass?includePaths[]=' +
        path.resolve(__dirname, './node_modules/bootstrap-sass/assets/stylesheets/')
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      title: 'Homepage Template',
      template: 'app/templates/homepage.html',
      files: {
        "js": "bundle.js"
      }
    })]
};