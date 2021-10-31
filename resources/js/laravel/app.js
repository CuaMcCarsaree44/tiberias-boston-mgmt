require('./bootstrap');

window.axios = require('axios');

/**
 * PWA Service worker settings
 * @link https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox
 */

// Check service workers are supported
// if('serviceWorker' in navigator){
//     // Use the windows load event to keep the page load performance
//     window.addEventListener('load', () =>{
//         navigator.serviceWorker.register('/service-worker.js');
//     });
// }