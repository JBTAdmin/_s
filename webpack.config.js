const path                    = require( 'path' );
const MiniCssExtractPlugin    = require( 'mini-css-extract-plugin' );
const UglifyJsPlugin          = require( 'uglifyjs-webpack-plugin' );
const OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const BrowserSyncPlugin       = require( 'browser-sync-webpack-plugin' );
const StyleLintPlugin         = require( 'stylelint-webpack-plugin' );
const autoprefixer            = require( "autoprefixer" );
var PrettierPlugin            = require( "prettier-webpack-plugin" );

module.exports = {
	context: __dirname,
	entry: {
		// frontend: ['./js/main.js', './sass/style.scss']
		// frontend: ['./sass/style_tailwind.scss']
		frontend: ['./sass/style.scss']
		// customizer: './js/customizer.js'
	},
	// output: {
	// path: path.resolve( __dirname, 'assets/' ),
	// filename: './js/main.js'
	// },
	mode: 'development',
	devtool: 'cheap-eval-source-map',
	module: {
		rules: [
		// {
		// enforce: 'pre',
		// exclude: /node_modules/,
		// test: /\.jsx$/,
		// loader: 'eslint-loader'
		// },
		// {
		// test: /\.jsx?$/,
		// loader: 'babel-loader'
		// },
			// {
			// test: /\.s?css$/,
			// use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
			// },

			// compile all .scss files to plain old css after adding pre-fixer
			{
				test: /\.(sass|scss)$/,
				use: [MiniCssExtractPlugin.loader,
					'css-loader',
					'postcss-loader',
				// {
				// loader: 'postcss-loader',
				// options: {
				// plugins: () => [autoprefixer()]
				// }
				// },
					'sass-loader']
		},
			{
				test: /\.svg$/,
				loader: 'svg-sprite-loader',
				options: {
					extract: true,
					spriteFilename: 'svg-defs.svg'
				}
		},
			{
				test: /\.(jpe?g|png|gif)\$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							outputPath: 'images/',
							name: '[name].[ext]'
						}
				},
					'img-loader'
				]
		}
		]
	},
	plugins: [
		// new StyleLintPlugin(),
		new MiniCssExtractPlugin(
			{
				// path: path.resolve(__dirname, 'assets/css/'),
				// filename: '../style_tailwind.css'
				filename: '../style.css'
			}
		),
		new BrowserSyncPlugin(
			{
				files: '**/*.php',
				proxy: 'http://localhost:10009/'
			}
		),
		new PrettierPlugin()
	],
optimization: {
	minimizer: [new UglifyJsPlugin(), new OptimizeCssAssetsPlugin()]
	}
};
