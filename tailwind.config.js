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
                'cool-gray': {
                      50: '#F9FAFB',
                      100: '#F3F4F6',
                      200: '#E5E7EB',
                      300: '#D1D5DB',
                      400: '#9CA3AF',
                      500: '#6B7280',
                      600: '#4B5563',
                      700: '#374151',
                      800: '#1F2937',
                      900: '#111827',
                }
            }
        },
    },

    plugins: [forms, typography],
};
