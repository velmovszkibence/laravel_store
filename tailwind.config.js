module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
        colors: {
            'orange': '#FF8B15',
        },
        minHeight: {
            '80': '80%',
            '90': '90%'
        },
        maxHeight: {
          '10': '2.5rem',
          '20':	'5rem',
          '24': '6rem'
        },
        transitionDuration: {
            '2000': '2000ms',
            '3000': '3000ms'
        }
    },
  },
  variants: {},
  plugins: [
  ]
}
