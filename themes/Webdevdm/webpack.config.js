const path = require('path')

const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerWebpackPlugin = require('css-minimizer-webpack-plugin')

module.exports = function (env) {
  return {
    entry: {
      main: ['./src/scripts/main.js', './src/styles/main.scss'],
      editor: ['./src/scripts/editor.js', './src/styles/editor.scss',]

	},
    output: {
      path: path.join(__dirname),
      filename: 'dist/scripts/[name].min.js',
    },
    devtool: 'source-map',
    module: {
      rules: [
        {
          test: /\.js|jsx$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader'
          }
        },
        {
          test: /\.scss$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                sourceMap: true
              }
            },
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true
              }
            }
          ]
        },
        {
          test: /\.(svg|gif|png|jpe?g)$/i,
          type: 'asset/resource',
          generator: {
            filename: 'dist/assets/img/[name].[hash][ext]'
          }
        },
        {
          test: /\.(eot|svg|ttf|woff|woff2)$/,
          type: 'asset/resource',
          generator: {
            filename: 'dist/assets/fonts/[name].[hash][ext]'
          }
        }
      ]
    },
    performance: {
      hints: false,
      maxEntrypointSize: 512000,
      maxAssetSize: 512000
    },
    optimization: {
      minimize: true,
      minimizer: [
        new CssMinimizerWebpackPlugin(),
      ],
    },

    plugins: [
      new MiniCssExtractPlugin({
        filename: 'dist/styles/[name].min.css'
      }),
    ]
  }
}
