var smartgrid = require('smart-grid');

/* It's principal settings in smart grid project */
var settings = {
  outputStyle: 'sass', /* less || scss || sass || styl */
  columns: 12, /* number of grid columns */
  offset: '30px', /* gutter width px || % || rem */
  mobileFirst: false, /* mobileFirst ? 'min-width' : 'max-width' */
  container: {
    maxWidth: '1200px', /* max-width оn very large screen */
    fields: '15px' /* side fields */
  },
  breakPoints: {
    xl: {
      width: '1500px'
    },
    lg: {
      width: '1230px', /* -> @media (max-width: 1100px) */
    },
    md: {
      width: '992px'
    },
    sm: {
      width: '780px',
    },
    xs: {
      width: '560px'
    }
    /*
    We can create any quantity of break points.

    some_name: {
        width: 'Npx',
        fields: 'N(px|%|rem)',
        offset: 'N(px|%|rem)'
    }
    */
  }
};

smartgrid('src/sass/_parts/', settings);