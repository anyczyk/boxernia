const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        style: './assets/scss/style.scss',
        scripts: './assets/js/scripts.js'
    },
    output: {
        path: path.resolve(__dirname, 'public')
    },
    plugins: [
        new MiniCssExtractPlugin({ filename: 'style.css' })
    ],
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
                exclude: /node_modules/
            },
            {
                test: /\.(png|jpg|gif|woff|woff2|eot|ttf|svg|webp)$/,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 99999999,
                            name: '[name].[ext]',
                            outputPath: 'images/'
                        }
                    }
                ]
            },
            {
                test: /\.(bin)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'bin/'
                        }
                    }
                ]
            },
            {
                test: /\.d\.ts$/,
                loader: 'ts-loader',
                exclude: /node_modules/,
                options: {
                    transpileOnly: true
                }
            }
        ]
    },
    devtool: 'source-map',
    mode: 'development'
};