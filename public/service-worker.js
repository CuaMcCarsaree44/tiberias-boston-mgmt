/**
 * @link https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox
 */

importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

workbox.precaching.precacheAndRoute([{"revision":"3fc64cdaacc3dfc7167c86f482012129","url":"assets/Logo_Oper_Abu.png"},{"revision":"362810282ecfb47671afeb0f090f0120","url":"assets/logo.png"},{"revision":"27ccd27fe238ee03bf95bae8bca79947","url":"assets/OperWorkshop_Logo_Red500.png"},{"revision":"2bf8a06f1e44df22f24366a4d2c9a496","url":"logo/logo-144.png"},{"revision":"158f929c08eb5d36d0f09b5b286b87c3","url":"logo/logo-154.png"},{"revision":"384761a0fd52c046ecd463d960f27490","url":"logo/logo-36.png"},{"revision":"44f149c2c20eeb8c5ab35c6b5e7974a2","url":"logo/logo-48.png"},{"revision":"c97cbd59f078d5f9f31721abfc84f78b","url":"logo/logo-72.png"},{"revision":"3739b1e07912fe9cf684aac955e9cfb9","url":"logo/logo-96.png"},{"revision":"d68992a86a00603d433d11d7a96d8d69","url":"scripts/script.js"},{"revision":"75690c1b84347eb994bfaf868c285879","url":"styles/style.css"}]);