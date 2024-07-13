const path = require('path')

const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerWebpackPlugin = require('css-minimizer-webpack-plugin')

module.exports = function (env) {
  return {
    entry: [
      './index.js',
      './styles.scss'
    ],
    output: {
      path: path.join(__dirname),
      filename: 'dist/js/bundle.js',
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
          exclude: [/fonts/],
          type: 'asset/resource',
          generator: {
            filename: 'dist/img/[name].[hash][ext]'
          }
        },
        {
          test: /\.(eot|svg|ttf|woff|woff2)$/,
          exclude: [/img/],
          type: 'asset/resource',
          generator: {
            filename: 'dist/fonts/[name].[hash][ext]'
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
        filename: 'dist/css/bundle.css'
      }),
    ]
  }
}
