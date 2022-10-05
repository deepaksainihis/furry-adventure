module.exports = {
	globDirectory: './',
	globPatterns: [
		'**/*.{php,txt,html,css,scss,svg,png,gif,js,mo,po,pot,md,eot,ttf,woff,woff2,json,jpg,otf,xml,pem,lock,yml,zip,tsx,ts,snap,patch,dist,csv,bat,m4,w32,c,h,phpt,crt,mp4,jpeg,log}'
	],
	swDest: 'sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};