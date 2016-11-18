/**
 * @fileoverview Config for webpack.
 */
import webpack from 'webpack';

const DEBUG = !(process.env.NODE_ENV === 'production');

export default {
  cache: true,
  watchOptions: {
    poll: 500,
  },
  entry: './resources/js/app.js',
  output: {
    path: 'webroot/public',
    filename: 'app.js',
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel',
      },
    ],
  },
  resolve: {
    root: ['node_modules', 'resources/js'],
    extensions: ['', '.js'],
  },
  devtool: DEBUG ? '#source-map' : false,
  plugins: [
    ...(DEBUG ? [] : [
      new webpack.optimize.DedupePlugin(),
      new webpack.optimize.UglifyJsPlugin({
        debug: false,
        minimize: true,
        oupput: {
          comments: false,
        },
        compressor: {
          warnings: false,
        },
      }),
    ]),
  ],
}
