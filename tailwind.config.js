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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', ...defaultTheme.fontFamily.serif],
                serif: ['Cormorant Garamond', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                // Paleta moderna basada en verde elegante y suave
                primary: {
                    50: '#f0f7f4',
                    100: '#e0f0ea',
                    200: '#c1e1d5',
                    300: '#a2d2c0',
                    400: '#6db8a6',
                    500: '#449d92',
                    600: '#2d7a5c',
                    700: '#236b50',
                    800: '#1a5240',
                    900: '#0d3928',
                },
                secondary: {
                    50: '#faf9f7',
                    100: '#f5f3f0',
                    200: '#ebe7e1',
                    300: '#e0dcd2',
                    400: '#c5bab3',
                    500: '#a9979a',
                    600: '#8d7581',
                    700: '#6e5965',
                    800: '#554249',
                    900: '#3c2c2e',
                },
                accent: {
                    50: '#fef5f5',
                    100: '#fdebeb',
                    200: '#fbd7d7',
                    300: '#f9c3c3',
                    400: '#f59595',
                    500: '#f17b7b',
                    600: '#e85555',
                    700: '#cf4949',
                    800: '#a03d3d',
                    900: '#713030',
                },
                neutral: {
                    50: '#fafafa',
                    100: '#f5f5f5',
                    200: '#e5e5e5',
                    300: '#d4d4d4',
                    400: '#a3a3a3',
                    500: '#737373',
                    600: '#525252',
                    700: '#404040',
                    800: '#262626',
                    900: '#171717',
                },
            },
        },
    },

    plugins: [forms],
};
