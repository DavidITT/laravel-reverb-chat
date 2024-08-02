import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.{blade.php,js,vue,ts,scss}'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#BB78D9',
                complementary: '#78D99B',
                analogous1: '#D978BB',
                analogous2: '#D978D9',
                analogous3: '#9B78D9',
                accent1: '#FFD700',
                accent2: '#FF4500',
                accent3: '#32CD32',
            },
        },
    },

    plugins: [forms],
};
