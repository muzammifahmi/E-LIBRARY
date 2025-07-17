import './bootstrap';
import Alpine from 'alpinejs';
import 'alertifyjs/build/css/alertify.min.css';
import 'alertifyjs/build/css/themes/default.min.css';
import alertify from 'alertifyjs';

window.alertify = alertify; // agar bisa dipakai global di blade


window.Alpine = Alpine;

Alpine.start();
