module.exports = {
  corePlugins: {
    preflight: true,
  },
  important: true,
  mode: 'jit',
  purge: {
    enabled: true,
    content: [
      './assets/js/*.{js,vue}',
      './assets/js/**/*.{js,vue}',
      './assets/sass/*.scss',
      './assets/sass/**/*.scss',
      './*.php',
      './**/*.php',
    ]
  },
  darkMode: false,
  theme: {
    fontFamily: {
      'sans': ['sans-serif',],
      'serif': ['sans-serif',],
      'mono': ['sans-serif',],
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '992px',
      'xl': '1250px',
    },
    extend: {
      colors: {
        'mine-shaft': {
          DEFAULT: '#333333',
          '50': '#A6A6A6',
          '100': '#999999',
          '200': '#808080',
          '300': '#666666',
          '400': '#4D4D4D',
          '500': '#333333',
          '600': '#1A1A1A',
          '700': '#000000',
          '800': '#000000',
          '900': '#000000'
        },
        'dove-gray': {
          DEFAULT: '#666666',
          '50': '#D9D9D9',
          '100': '#CCCCCC',
          '200': '#B3B3B3',
          '300': '#999999',
          '400': '#808080',
          '500': '#666666',
          '600': '#4D4D4D',
          '700': '#333333',
          '800': '#1A1A1A',
          '900': '#000000'
        },
        'tundora': {
          DEFAULT: '#4D4D4D',
          '50': '#C0C0C0',
          '100': '#B3B3B3',
          '200': '#9A9A9A',
          '300': '#808080',
          '400': '#676767',
          '500': '#4D4D4D',
          '600': '#343434',
          '700': '#1A1A1A',
          '800': '#000000',
          '900': '#000000'
        },
        'cape-palliser': {
          DEFAULT: '#A07D3F',
          '50': '#EFE6D6',
          '100': '#E8DBC3',
          '200': '#D9C49F',
          '300': '#CBAE7A',
          '400': '#BC9756',
          '500': '#A07D3F',
          '600': '#7B6031',
          '700': '#574422',
          '800': '#322714',
          '900': '#0E0B05'
        },
        'cod-gray': {
          DEFAULT: '#1A1A1A',
          '50': '#8D8D8D',
          '100': '#808080',
          '200': '#676767',
          '300': '#4D4D4D',
          '400': '#343434',
          '500': '#1A1A1A',
          '600': '#000000',
          '700': '#000000',
          '800': '#000000',
          '900': '#000000'
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('tailwindcss-debug-screens'),
    require('@tailwindcss/line-clamp'),
  ],
};
