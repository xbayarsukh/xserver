const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'teal-blue': {
                    '50': '#f0fafb',
                    '100': '#d8f0f5',
                    '200': '#b6e0eb',
                    '300': '#83c8dd',
                    '400': '#49a8c7',
                    '500': '#2e8cac',
                    '600': '#297191',
                    '700': '#275d77',
                    '800': '#264b5f',
                    '900': '#254254',
                    '950': '#142a38',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
