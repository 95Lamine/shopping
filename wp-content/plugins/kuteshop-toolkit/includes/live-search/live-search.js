(function ($) {
    "use strict"; // Start of use strict

    $(document).ready(function () {
        setTimeout(function () { // Set Time Out for event off
            var timer, last_keyword = true;
            $('document').on('keydown', '.kuteshop-live-search-form .txt-livesearch', function (e) {
                var key_board = e.keyCode;

                if ( key_board == 38 || key_board == 40 ) // Key up or down
                    e.preventDefault();
            });

            $(document).on('paste blur keyup', '.kuteshop-live-search-form .txt-livesearch', function (e) {
                var _this         = $(this),
                    container     = _this.closest('.kuteshop-live-search-form'),
                    key_board     = e.keyCode,
                    list_products = container.find('.products-search .product-search'),
                    keyword       = _this.val(),
                    product_cat   = $(this).closest('.kuteshop-live-search-form').find('select[name="product_cat"]').val();

                if ( typeof product_cat === "undefined" || product_cat == 0 ) {
                    product_cat = '';
                }
                if ( keyword.length < kuteshop_ajax_live_search.kuteshop_live_search_min_characters ) return false;
                var data = {
                    action: 'kuteshop_live_search',
                    security: kuteshop_ajax_live_search.security,
                    keyword: keyword,
                    product_cat: product_cat
                };
                container.addClass('loading');
                $.post(kuteshop_ajax_live_search.ajaxurl, data, function (response) {
                    container.removeClass('loading');
                    container.find('.suggestion-search-data').remove();
                    container.find('.not-results-search').remove();
                    container.find('.products-search').remove();

                    // Prepare response.
                    if ( response.message ) {
                        container.find('.results-search').append('<div class="not-results-search">' + response.message + '</div>');
                    } else {
                        container.find('.results-search').append('<div class="products-search"></div>');
                        // Show suggestion.
                        if ( response.suggestion ) {
                            container.find('.results-search').append('<div class="suggestion-search suggestion-search-data">' + response.suggestion + '</div>');
                        }

                        // Show results.
                        //container.find( '.products-search' ).append( '<div class="products-search-result-head">'+kuteshop_ajax_live_search.product_matches_text+'<span class="count">('+response.result_count+')'+kuteshop_ajax_live_search.results_text+'</span></div>' );
                        $.each(response.list_product, function (key, value) {
                            container.find('.products-search').append('<div class="product-search-item"><div class="product-image">' + value.image + '</div><div class="product-title-price"><div class="product-title"><a class="mask-link" href="' + value.url + '">' + value.title.replace(new RegExp('(' + keyword + ')', 'ig'), '<span class="keyword-current">$1</span>') + '</a></div><div class="product-price">' + value.price + '</div></div></div>');
                        });

                        container.find('.products-search').append('<div class="product-search view-all button">' + kuteshop_ajax_live_search.view_all_text + '</div>');
                    }
                });
            });

            $('body').on('focus', '.kuteshop-live-search-form .txt-livesearch', function () {
                var container = $(this).closest('.kuteshop-live-search-form');
                container.removeClass('loading');
                container.find('.suggestion-search-data').show();
                container.find('.not-results-search').show();
                container.find('.products-search').show();
            });

            $('body').on('blur', '.kuteshop-live-search-form .txt-livesearch', function () {
                var container = $(this).closest('.kuteshop-live-search-form');
                container.removeClass('loading');
                container.find('.suggestion-search-data').hide();
                container.find('.not-results-search').hide();
                container.find('.products-search').fadeOut(300);
            });

            $('body').on('click', '.kuteshop-live-search-form .view-all', function () {
                var _this  = $(this);
                var parent = _this.closest('.kuteshop-live-search-form ').submit();
            });

            $(document).click(function (event) {
                var container = $(event.target).closest(".kuteshop-live-search-form")
                if ( container.length <= 0 ) {
                    container.hide();
                }
            });
        }, 1)
    });
})(jQuery); // End of use strict