/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
console.log('Hello Webpack Encore!');
// start the Stimulus application
import './bootstrap';

import './styles/js/script';

require('bootstrap');

const $ = require('jquery');

// or you can include specific pieces
require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle = "tooltip"]').tooltip();
});
