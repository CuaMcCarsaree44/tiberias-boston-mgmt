jQuery('#sidebar')
    .css('transform', 'translateX(0%) translateY(0) translateZ(0)')
    .css('width', '240px !important');

    console.log('Hello World');

jQuery('#search')
    .on('keypress', (event) => {
        if(event.key === 'Enter'){
            jQuery('#search-btn').trigger('click');
        }
    });