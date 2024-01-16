import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {

		container: {
			center: true,
			xl: '1470px'
		},
		screens: {
			sm: '576px',
			md: '768px',
			lg: '992px',
			xl: '1170px',
		},
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
            flexBasis: {
                '1/7': '14.2857143%',
                '1/8': '13.2857143%',
                '2/7': '28.5714286%',
                '3/7': '42.8571429%',
                '4/7': '57.1428571%',
                '5/7': '71.4285714%',
                '6/7': '85.7142857%',
              }
        },
    },

    plugins: [forms],
};
