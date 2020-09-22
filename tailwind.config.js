const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
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

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
