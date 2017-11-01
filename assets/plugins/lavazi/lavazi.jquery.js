//     Lavazi - Lava Lamp jQuery Plugin v2.1
//     Coded By Mohammad Hamza
//     @hamzadhamiya
//     Must Be Used Under MIT Lisence
(function($) {
    $.fn.lavazi = function(options) {
        var defaults = {
            // These are the defaults.
            theme: "simple",
            activeClass: "selected",
            background: "#222",
            transitionTime: 300,
            height: 4,
            mode: 'barBottom',
            easings: 'easeInOutBack'
        }
		// Extend Defaults
        var settings = $.extend({}, defaults, options);
		// Add class on the basis of theme
		// Append lamp
        this.addClass('lavazi_nav ' + settings.theme).append('<span class="lavazi_lamp ' + settings.theme + '"></span>');
		// Ease setup
		// Uses CSS transitions only
        var easeToApply;
        switch (settings.easings) {
            case 'easeInOutBack':
                easeToApply = 'cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                break;
            case 'easeIn':
                easeToApply = 'ease-in';
                break;
            case 'easeOut':
                easeToApply = 'ease-out';
                break;
            case 'easeInOut':
                easeToApply = 'ease-in-out';
                break;
            case 'easeInCubic':
                easeToApply = 'cubic-bezier(0.55, 0.055, 0.675, 0.19)';
                break;
            case 'easeOutCubic':
                easeToApply = 'cubic-bezier(0.215, 0.61, 0.355, 1)';
                break;
            case 'easeInOutCubic':
                easeToApply = 'cubic-bezier(0.645, 0.045, 0.355, 1)';
                break;
        }
		// Setting the lmp
        this.find('.lavazi_lamp').height(settings.height).css({
            "-moz-transition": "all " + settings.transitionTime + "ms " + easeToApply,
			"-ms-transition": "all " + settings.transitionTime + "ms " + easeToApply,
			"-o-transition": "all " + settings.transitionTime + "ms " + easeToApply,
            "-webkit-transition": "all " + settings.transitionTime + "ms " + easeToApply,
            "transition": "all " + settings.transitionTime + "ms " + easeToApply,
            "background": settings.background,
            "height": settings.height + "px"
        });
		// If theme is rounded then rounding the corners
        if (settings.theme == "rounded") {
            var cheight = settings.height,
                nheight = cheight / 2;
            this.find('.lavazi_lamp').css({
                "border-radius": nheight + "px",
                "-moz-border-radius": nheight + "px",
                "-webkit-border-radius": nheight + "px"
            })
        }
		// Append arrow if theme is arrow
        if (settings.theme == "arrow") {
            this.find('.lavazi_lamp').append('<span class="arrow_inner"></span>');
            $('.arrow_inner', this).css({
                "border-bottom-color": settings.background
            });
        }
		// Working starts here
        var t = this,
		// Select the children li items of the navigation
		// Look for active one
            m = t.children('li.' + settings.activeClass);
        $.findLavaziSelected = function() {
			// If no active class then...
            if (t.children('li').hasClass(settings.activeClass)) {
                var u = t.children('li.' + settings.activeClass);
            } else {
				// Add the active class on first one
                var u = t.children('li').first();
            }
			// Get absicca of active link
            var v = u.position().left,
			// Get outer width of active link
			// Includes Padding
                w = u.outerWidth(),
				// Top Or Bottom
				// Top Bottom Length
                TOB, TBL,
                x = t.find('.lavazi_lamp');
				// Setting the modes
            switch (settings.mode) {
                case "barBottom":
                    TOB = 'bottom', TBL = 0;
                    break;
                case "barTop":
                    TOB = 'top', TBL = 0;
                    break;
                case "belowBar":
                    TOB = 'top', TBL = '100%';
                    break;
                case "aboveBar":
                    TOB = 'below', TBL = '100%';
                    break;
            }
			// Putting the required CSS
            x.css({
                'left': v,
                TOB: TBL,
                'width': w,
                'opacity': 1
            });
        };
		// Reposition lamp on resource load
        $(window).load(function() {
            $.findLavaziSelected();
        });
		// Reposition on hover
        t.children('li').hover(function() {
            m.addClass('temporary_remove').removeClass(settings.activeClass);
            $(this).addClass(settings.activeClass);
            $.findLavaziSelected();
        }, function() {
            m.addClass(settings.activeClass).removeClass('temporary_remove');
            $(this).removeClass(settings.activeClass);
            $.findLavaziSelected();
        });
        $.findLavaziSelected();
    };
}(jQuery));
