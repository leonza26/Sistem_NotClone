import './bootstrap';
import Sortable from 'sortablejs';
import Alpine from 'alpinejs';

import '@fontsource/outfit/400.css';
import '@fontsource/outfit/700.css';
import '@fontsource/outfit/800.css';
import '@fontsource/inter/400.css';
import '@fontsource/inter/500.css';
import '@fontsource/inter/600.css';

// --- Import GSAP ---
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
// Jadikan Global agar bisa dipanggil di Blade
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

window.Alpine = Alpine;
window.Sortable = Sortable;

Alpine.start();

