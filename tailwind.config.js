import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
    './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
            },
            colors: {
                // Accent Color
                AccentRed950: '#510300',
                AccentRed900: '#98100A',
                AccentRed300: '#B54708',
                AccentRed100: '#FFF1F0',
                Red100: '#FFDDDC',
        
                // Yellow
                Yellow100: '#FFFAEB',
        
                // Blue
                Blue700: '#2C5586',
                Blue600: '#28458B',
                Blue500: '#175CD3',
                Blue300: '#6B88AA',
                Blue100: '#B5C4D5',
                Blue102: '#E7EEF7',
                Blue50: '#EFF8FF',
                Blue: '#1D2939',
        
                // Netral
                Neutral300: '#D0D5DD',
                Neutral200: '#EAECF0',
                Neutral100: '#EAECF0',
        
                // Ebony
                Ebony900: '#101828',
                Ebony300: '#344054',
                Ebony200: '#475467',
                Ebony100: '#667085',
        
                // Green
                Green600: '#1D9C53',
                Green300: '#60BA86',
                Green200: '#B0DDC3',
                Green100: '#B0DDC3',
                Green50: '#ECFDF3',
        
                // Orange
                Orange600: '#F95016',
                Orange300: '#FB845B',
                Orange100: '#FDC2AD',
                Orange50: '#FFE7D5',
                OrangeS: '#E66445',
        
                // Purple
                Purple500: '#7A5AF8',
                Purple200: '#A28BFA',
                Purple100: '#D1C5FD',
                Purple50: '#EBE9FE',
        
                // Warna Buat Chart
                BiruChart1: '#28A0F6',
                BiruChart2: '#4E5BA6',
                UnguChart: '#7A5AF8',
                PinkChart: '#EE46BC',
                MerahChart: '#B42121',
                OrangeChart: '#F95016',
                KuningChart: '#FAC515',
                HijauChart1: '#66C61C',
                HijauChart2: '#16B364'
              },
        
        },
    },

    plugins: [
        
        forms,

        require('tailwind-scrollbar-hide')
    ],
             
};
