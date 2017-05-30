(function($) {
    "use strict"; // Start of use strict
    function init_brands_navigation() {
        var e = $(".brands .brand_group_name");
        // Limit menu width
        e.closest('.sub-menu').addClass('brand-box');
        // @event
        e.hover(function() {
                var e = $(this),
                    t = e.parents(".brands").find(".brand_list"),
                    n = t.find('[brand_group="' + e.attr("brand_group") + '"]');
                if (n.length) {
                    var o = n.position().top + t.prop("scrollTop") - 30;
                    t.animate({
                        scrollTop: o
                    }, 0)
                }
            }),
            e.click(function(e) {
                e.preventDefault(),
                    e.stopPropagation()
            })
    }
    init_brands_navigation();
})(jQuery);