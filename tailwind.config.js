import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'pine': {
                    50: '#F8FBF5',
                    100: '#F0F7EA',
                    200: '#DAEBCB',
                    300: '#C4DEAC',
                    400: '#97C66D',
                    500: '#6BAD2F',
                    600: '#609C2A',
                    700: '#40681C',
                    800: '#304E15',
                    900: '#20340E',
                },
            }
        },
    },

    plugins: [forms, typography],
};
