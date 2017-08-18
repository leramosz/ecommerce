(function($) {

    var BASE_URL = 'http://localhost/bookstore/';

    "use strict";

    $(document).ready(function () {

        /*===================================================================================*/
        /*  WOW 
        /*===================================================================================*/
        new WOW().init();

        /*===================================================================================*/
        /*  OWL CAROUSEL
        /*===================================================================================*/

        var dragging = true;
        var owlElementID = "#owl-main";

        function fadeInReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
            }
        }

        function fadeInDownReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
            }
        }

        function fadeInUpReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
            }
        }

        function fadeInLeftReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
            }
        }

        function fadeInRightReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
            }
        }

        function fadeIn() {
            $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInDown() {
            $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInUp() {
            $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInLeft() {
            $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInRight() {
            $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        $(owlElementID).owlCarousel({

            autoPlay: 5000,
            stopOnHover: true,
            navigation: true,
            pagination: true,
            singleItem: true,
            addClassActive: true,
            transitionStyle: "fade",
            navigationText: ["<span data-icon='&#x23;'></span>", "<span data-icon='&#x24;'></span>"],

            afterInit: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterMove: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterUpdate: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            startDragging: function() {
                dragging = true;
            },

            afterAction: function() {
                fadeInReset();
                fadeInDownReset();
                fadeInUpReset();
                fadeInLeftReset();
                fadeInRightReset();
                dragging = false;
            }

        });

        if ($(owlElementID).hasClass("owl-one-item")) {
            $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
        }

        $(owlElementID + ".owl-one-item").owlCarousel({
            singleItem: true,
            navigation: false,
            pagination: false
        });

        $('#transitionType li a').click(function () {

            $('#transitionType li a').removeClass('active');
            $(this).addClass('active');

            var newValue = $(this).attr('data-transition-type');

            $(owlElementID).data("owlCarousel").transitionTypes(newValue);
            $(owlElementID).trigger("owl.next");

            return false;

        });

        $('.home-owl-carousel').each(function(){
            var owl = $(this);
            owl.owlCarousel({
                items : 4,
                itemsMobile :[480,1],
                itemsDesktopSmall : [980,3],
                navigation : false,
                pagination : false,
            });
        });


        $(".owl-next").click(function(){
            $($(this).data('target')).trigger('owl.next');
            return false;
        });

        $(".owl-prev").click(function(){
            $($(this).data('target')).trigger('owl.prev');
            return false;
        });

        $("#featured-author-carousel").owlCarousel({

            items : 4,
            itemsMobile :[480,1],
            itemsDesktopSmall : [980,2],
            itemsDesktop :   [1199,3]

        });



        $("#owl-demo").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items : 6,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,3],
            itemsTabletSmall: false,
        itemsMobile : [479,1], //10 items above 1000px browser width
        navigation: true,   
        navigationText: [
        "<i class='icon fa fa-caret-left'></i>",
        "<i class='icon fa fa-caret-right'></i>"
        ],
        }); 


        /*===================================================================================*/
        /*  Slider
        /*===================================================================================*/ 

        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 100,393 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );


        /*===================================================================================*/
        /*  ScrollTop
        /*===================================================================================*/ 

        // scroll-to-top button show and hide
        //jQuery(document).ready(function(){
            jQuery(window).scroll(function(){
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('.scrollup').fadeIn();
                } else {
                    jQuery('.scrollup').fadeOut();
                }
            });
        // scroll-to-top animate
        jQuery('.scrollup').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });


        /*===================================================================================*/
        /*  Quantity Incre and Decre
        /*===================================================================================*/ 
        // quantity incre and decre
        $('.quant-input .plus').click(function() {
            var cart_amount = parseFloat($('#cart-amount').attr('data-cart-amount'));
            var cart_count = parseInt($('#cart-count').attr('data-cart-count'));
            var val = $(this).parent().next().val();
            var book_id = $(this).parent().parent().attr('data-book');
            var unit_price = $(this).parent().parent().parent().prev().find('.price').html();
            unit_price = parseFloat(unit_price.replace('$',''));
            var currenTotal = $('#total-amount').html();
            currenTotal = parseFloat(currenTotal.replace('$',''));
            val = parseInt(val) + 1;
            var subtotal =  unit_price * val;
            var total = currenTotal + unit_price;
            $(this).parent().next().val(val);
            $(this).parent().parent().parent().next().find('.price').html('$'+parseFloat(subtotal).toFixed(2));
            addToCart(book_id, unit_price);
        });

        $('.quant-input .minus').click(function() {
            var cart_amount = parseFloat($('#cart-amount').attr('data-cart-amount'));
            var cart_count = parseInt($('#cart-count').attr('data-cart-count'));
            var val = $(this).parent().next().val();
            var book_id = $(this).parent().parent().attr('data-book');
            var unit_price = $(this).parent().parent().parent().prev().find('.price').html();
            unit_price = parseFloat(unit_price.replace('$',''));
            var currenTotal = $('#total-amount').html();
            currenTotal = parseFloat(currenTotal.replace('$',''));
            if (val > 1) {
                val = parseInt(val) - 1;
                var subtotal = unit_price * val;
                var total = currenTotal - unit_price;
                $(this).parent().next().val(val);
                $(this).parent().parent().parent().next().find('.price').html('$'+parseFloat(subtotal).toFixed(2));
                removeFromCart(book_id, unit_price, 1);
            }
        });

        /*===================================================================================*/
        /*  CUSTOM CONTROLS
        /*===================================================================================*/

        $('.selectpicker').selectpicker();



        var dragging = true;
        var cart = ".cart";

        function fadeInRight() {
            $(cart + " .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(cart + " .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(cart + " .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }



        /*===================================================================================*/
        /*  LAZY LOAD IMAGES USING ECHO
        /*===================================================================================*/

        echo.init({
            offset: 100,
            throttle: 250,
            unload: false
        });



        /*===================================================================================*/
        /*  TOOLTIP 
        /*===================================================================================*/
        $("[data-toggle='tooltip']").tooltip(); 
        });

        /*===================================================================================*/
        /*  ADD TO / REMOVE FROM FAVOURITE 
        /*===================================================================================*/
        function addToFavourites(user_id, book_id){
            
            var data = { 
                         fields: {
                                    user_id: user_id, 
                                    book_id: book_id
                                },
                        action: 'add-favourite' 
                    };
        
            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (result) {
                    console.dir(result);
                },
            
            });
        }

        function removeFromFavourites(user_id, book_id){

            var data = { 
                         fields: {
                                    user_id: user_id, 
                                    book_id: book_id
                                },
                        action: 'remove-favourite' 
                    };
        
            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (result) {
                    console.dir(result);
                },
            
            });
        }

        $('#add-to-favourite-detail').click(function(e){
            e.preventDefault();
            addToFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        $('.actions #add-to-favourite').click(function(e){
            e.preventDefault();
            addToFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        $('.cart #add-to-favourite').click(function(e){
            e.preventDefault();
            addToFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        $('#remove-from-favourite-detail').click(function(e){
            e.preventDefault();
            removeFromFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        $('.actions #remove-from-favourite').click(function(e){
            e.preventDefault();
            removeFromFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        $('.cart #remove-from-favourite').click(function(e){
            e.preventDefault();
            removeFromFavourites($(this).attr("data-user"), $(this).attr("data-book"));
        });

        /*===================================================================================*/
        /*  ADD TO / REMOVE FROM CART 
        /*===================================================================================*/
        function updateCartValues(cart_amount, cart_count) {
            $('#cart-amount').attr('data-cart-amount', parseFloat(cart_amount).toFixed(2));
            $('#cart-count').attr('data-cart-count', cart_count);
            $('#cart-amount').html('Total : $'+parseFloat(cart_amount).toFixed(2));
            $('#cart-count').html(cart_count); 
            $('#total-amount').html('$'+parseFloat(cart_amount).toFixed(2));
        }

        function removeFromCartPage(book_id, price, count) {

            var cart_amount = parseFloat($('#cart-amount').attr('data-cart-amount'));
            var cart_count = parseInt($('#cart-count').attr('data-cart-count'));

            cart_amount -= parseFloat(price);           
            cart_count -= count;

            var data = { 
                        book_id: book_id,
                        price: price,
                        count: count,
                        cart_amount: parseFloat(cart_amount).toFixed(2),
                        cart_count: cart_count, 
                        action: 'remove-cart-page' 
                    };
        
            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: data,
                dataType: 'json',
                complete: function (result) {
                    if(result.responseText == 'removed') {
                        updateCartValues(cart_amount, cart_count)       
                    }
                },
            
            });

        }

        function removeFromCart(book_id) {
            
            var cart_amount = parseFloat($('#cart-amount').attr('data-cart-amount'));
            var cart_count = parseInt($('#cart-count').attr('data-cart-count'));

            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: {book_id: book_id, action: 'remove-cart'},
                dataType: 'json',
                complete: function (result) {
                    var res = JSON.parse(result.responseText);
                    updateCartValues(res.new_amount, res.new_count);  
                },
            
            });

        }

        function addToCart(book_id, price) {

            var cart_amount = parseFloat($('#cart-amount').attr('data-cart-amount'));
            var cart_count = parseInt($('#cart-count').attr('data-cart-count'));

            cart_amount += parseFloat(price);           
            cart_count += 1;

            var data = { 
                        book_id: book_id,
                        price: price,
                        cart_amount: parseFloat(cart_amount).toFixed(2),
                        cart_count: cart_count, 
                        action: 'add-cart' 
                    };
        
            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: data,
                dataType: 'json',
                complete: function (result) {
                    if(result.responseText == 'added') {
                        updateCartValues(cart_amount, cart_count)       
                    }
                },
            
            });

        }

        // Adding to cart
        $('.cart #add-to-cart').click(function(e){
            e.preventDefault();
            addToCart($(this).attr("data-book"), $(this).attr("data-price"));
        });

        $('.actions #add-to-cart').click(function(e){
            e.preventDefault();
            addToCart($(this).attr("data-book"), $(this).attr("data-price"));
        });

        $('#add-to-cart-detail').click(function(e){
            e.preventDefault();
            addToCart($(this).attr("data-book"), $(this).attr("data-price"));
        });

        // removing from cart
        $('.cart #remove-from-cart').click(function(e){
            e.preventDefault();
            removeFromCart($(this).attr("data-book"));
        });

        $('.actions #remove-from-cart').click(function(e){
            e.preventDefault();
            removeFromCart($(this).attr("data-book"));
        });

        $('#remove-from-cart-detail').click(function(e){
            e.preventDefault();
            removeFromCart($(this).attr("data-book"));
        });

        // remove a book from cart page
        $('.cart-book #delete-from-cart').click(function(e){
            e.preventDefault();
            var subtotal = $(this).parent().prev().find('.price').html();
            subtotal = parseFloat(subtotal.replace('$',''));
            var count = $(this).parent().prev().prev().find('.quant-input > .txt-quantity').val();
            var book_id =  $(this).parent().parent().attr('data-book');
            $(this).parent().parent().remove(); 
            removeFromCartPage(book_id, subtotal, count);
        });


})(jQuery);


























