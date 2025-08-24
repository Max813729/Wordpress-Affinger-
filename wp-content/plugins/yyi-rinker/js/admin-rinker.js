(function($) {
    $(document).on( 'click', '.yyi-rinker-confirm-link', function ( event ) {
        var url = $(this).parent().find('input').val();
        window.open(url, '_blank');
        return false;
    });
})(jQuery);

(function($) {

    $(document).on( 'click', 'textarea.yyi-rinker-list-shortcode', function ( event ) {
        $(this).select();
        document.execCommand('copy');
    });

    $(document).on( 'click', 'textarea.yyi-rinker-term-list-shortcode', function ( event ) {
        $(this).select();
        document.execCommand('copy');
    });

    yyi_rinker_insert_tag =  function( element, tag ) {
        var text = element.val();
        var len      = text.length;
        var pos      = element.get(0).selectionStart;
        var text_before   = text.substr(0, pos);
        var text_after    = text.substr(pos, len);

        text = text_before + tag + text_after;
        element.val(text);
    }

    $(document).on('click', 'h2.tab-none', function(event){
        $('h2.tab-active').removeClass('tab-active').addClass('tab-none');
        $(this).addClass('tab-active');
        $(this).removeClass('tab-none');
        let tab_index = $(this).data('active-tab');
        $('.setting-box').addClass('hide');
        $('.setting-box-' + tab_index).removeClass('hide');
    });
})(jQuery);

