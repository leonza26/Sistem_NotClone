import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                manrope: ['Manrope', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'cyan-900': '#164e63',
                "on-error-container": "#93000a",
                "tertiary-fixed-dim": "#ffb785",
                "surface-container-lowest": "#ffffff",
                "tertiary": "#954a00",
                "error-container": "#ffdad6",
                "surface-container-highest": "#dee3e4",
                "primary-fixed-dim": "#9bcee0",
                "error": "#ba1a1a",
                "primary-container": "#81b4c5",
                "on-surface": "#171d1e",
                "inverse-surface": "#2c3132",
                "surface-dim": "#d6dbdc",
                "primary": "#316574",
                "on-secondary-fixed": "#051f25",
                "outline": "#70787b",
                "on-surface-variant": "#40484b",
                "inverse-on-surface": "#edf2f3",
                "background": "#f5fafb",
                "secondary": "#4b6269",
                "outline-variant": "#c0c8cb",
                "on-tertiary-fixed": "#301400",
                "secondary-fixed": "#cee7ef",
                "on-secondary-container": "#4f666e",
                "on-primary": "#ffffff",
                "on-primary-container": "#084755",
                "tertiary-container": "#ff9035",
                "on-background": "#171d1e",
                "surface-bright": "#f5fafb",
                "primary-fixed": "#b7ebfd",
                "secondary-fixed-dim": "#b2cbd3",
                "on-secondary-fixed-variant": "#334a51",
                "tertiary-fixed": "#ffdcc6",
                "inverse-primary": "#9bcee0",
                "surface-container-low": "#eff4f5",
                "on-secondary": "#ffffff",
                "surface-container": "#eaeff0",
                "secondary-container": "#cbe4ec",
                "on-primary-fixed": "#001f27",
                "surface-tint": "#316574",
                "surface-container-high": "#e4e9ea",
                "on-tertiary-fixed-variant": "#713700",
                "surface-variant": "#dee3e4",
                "on-error": "#ffffff",
                "on-tertiary": "#ffffff",
                "on-primary-fixed-variant": "#134d5c",
                "on-tertiary-container": "#683200",
                "surface": "#f5fafb",
                "cyan-900": "#164e63",
                "on-primary": "#ffffff",
            },

            backgroundImage: {
                // Definisi gradient untuk tombol Sign Up
                'gradient-primary-cta': 'linear-gradient(135deg, #538392 0%, #709CA7 100%)',
            },

            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },

            fontFamily: {
                "headline": ["Manrope", "sans-serif"],
                "display": ["Manrope", "sans-serif"],
                "body": ["Inter", "sans-serif"],
                "label": ["Inter", "sans-serif"]
            }

        },
    },

    plugins: [forms],
};
