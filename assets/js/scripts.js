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
                        controller: 'wishlist',
                        action: 'add'
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
                        controller: 'wishlist',
                        action: 'delete' 
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

        // Add from book detail page (good)
        $(document).on('click', '#add-to-favourite-detail', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            user_id = $(this).attr("data-user");
            
            $(this).attr('title', 'Remove from Favourite');
            $(this).attr('id', 'remove-from-favourite-detail');
            $(this).blur();
            addToFavourites(user_id, book_id);
        });

        // Add from different book lists (good)
        $(document).on('click', '.actions #list-add-to-favourite', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            user_id = $(this).attr("data-user");

            $(this).attr('title', 'Remove from Favourite');
            $(this).attr('id', 'list-remove-from-favourite');
            $('.cart #grid-add-to-favourite.book-'+book_id).attr('title', 'Remove from Favourite');
            $('.cart #grid-add-to-favourite.book-'+book_id).attr('id', 'grid-remove-from-favourite');
            $(this).blur();
            addToFavourites(user_id, book_id);
        });

        $(document).on('click', '.cart #grid-add-to-favourite', function(e){
            e.preventDefault();
            user_id = $(this).attr("data-user");
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Remove from Favourite");
            $(this).attr('id', "grid-remove-from-favourite");
            $('.actions #list-add-to-favourite.book-'+book_id).attr('title', 'Remove from Favourite');
            $('.actions #list-add-to-favourite.book-'+book_id).attr('id', 'list-remove-from-favourite');
            $(this).blur();
            addToFavourites(user_id, book_id);
        });

        // Add from home book lists (good)
        $(document).on('click', '.cart #home-add-to-favourite', function(e){
            e.preventDefault();
            user_id = $(this).attr("data-user");
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Remove from Favourite");
            $(this).attr('id', "home-remove-from-favourite");
            $(this).blur();
            addToFavourites(user_id, book_id);
        });

        // Remove from book page (good)
        $(document).on('click', '#remove-from-favourite-detail', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            user_id = $(this).attr("data-user");

            $(this).attr('title', 'Add to Favourite');
            $(this).attr('id', 'add-to-favourite-detail');
            $(this).blur();
            removeFromFavourites(user_id, book_id);
        });

        // Remove from different book lists (good)
        $(document).on('click', '.actions #list-remove-from-favourite', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            user_id = $(this).attr("data-user");

            $(this).attr('title', 'Add to Favourite');
            $(this).attr('id', 'list-add-to-favourite');
            $('.cart #grid-remove-from-favourite.book-'+book_id).attr('title', 'Add to Favourite');
            $('.cart #grid-remove-from-favourite.book-'+book_id).attr('id', 'grid-add-to-favourite');
            $(this).blur();
            removeFromFavourites(user_id, book_id);
        });

        $(document).on('click', '.cart #grid-remove-from-favourite', function(e){
            e.preventDefault();
            user_id = $(this).attr("data-user");
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Add from Favourite");
            $(this).attr('id', "grid-add-to-favourite");
            $('.actions #list-remove-from-favourite.book-'+book_id).attr('title', 'Add to Favourite');
            $('.actions #list-remove-from-favourite.book-'+book_id).attr('id', 'list-add-to-favourite');
            $(this).blur();
            removeFromFavourites(user_id, book_id);
        });

        // Remove from home book lists (good)
        $(document).on('click', '.cart #home-remove-from-favourite', function(e){
            e.preventDefault();
            user_id = $(this).attr("data-user");
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Add from Favourite");
            $(this).attr('id', "home-add-to-favourite");
            removeFromFavourites(user_id, book_id);
        });

        // Remove item from wishlist page (good)
        $('.cart #remove-from-wishlist').click(function(e){
            e.preventDefault();
            var book_id = $(this).attr("data-book");
            var user_id = $(this).attr("data-user");

            $("#list #book-"+book_id).remove();
            $("#grid #book-"+book_id).remove();
            removeFromFavourites(user_id, book_id);    
        });

        $('.actions #remove-from-wishlist').click(function(e){
            e.preventDefault();
            var book_id = $(this).attr("data-book");
            var user_id = $(this).attr("data-user");

            $("#list #book-"+book_id).remove();
            $("#grid #book-"+book_id).remove();
            removeFromFavourites(user_id, book_id);
        });

        /*===================================================================================*/
        /*  ADD TO / REMOVE FROM CART 
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
                removeFromCartPage(book_id, unit_price, 1);
            }
        });

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
                        controller: 'cart',
                        action: 'delete_cart_page' 
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
                data: {book_id: book_id, controller: 'cart', action: 'delete'},
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
                        controller: 'cart', 
                        action: 'add' 
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

        // Add from book detail
        $(document).on('click', '#add-to-cart-detail', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            price = $(this).attr("data-price");

            $(this).attr('title', 'Remove to Cart');
            $(this).find('span').html('Remove');
            $(this).attr('id', 'remove-from-cart-detail');
            $(this).blur();
            addToCart(book_id, price);
        });

        // Add from different book lists 
        $(document).on('click', '.cart #grid-add-to-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            price = $(this).attr("data-price");

            $(this).attr('title', "Remove from Cart");
            $(this).attr('id', "grid-remove-from-cart");
            $('.actions #list-add-to-cart.book-'+book_id).attr('title', 'Remove from Cart');
            $('.actions #list-add-to-cart.book-'+book_id).attr('id', 'list-remove-from-cart');
            $(this).blur();
            addToCart(book_id, price);
        });

         $(document).on('click', '.actions #list-add-to-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            price = $(this).attr("data-price");
        
            $(this).attr('title', "Remove from Cart");
            $(this).attr('id', "list-remove-from-cart");
            $('.cart #grid-add-to-cart.book-'+book_id).attr('title', 'Remove from Cart');
            $('.cart #grid-add-to-cart.book-'+book_id).attr('id', 'grid-remove-from-cart');
            $(this).blur();
            addToCart(book_id, price);
        });

         // Add from home book lists (good)
        $(document).on('click', '.cart #home-add-to-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
            price = $(this).attr("data-price");

            $(this).attr('title', "Remove from Cart");
            $(this).attr('id', "home-remove-from-cart");
            $(this).find('i').removeClass('icon icon-plus');
            $(this).find('i').removeClass('fa fa-plus-circle');
            $(this).find('i').addClass('icon icon-minus');
            $(this).find('i').addClass('fa fa-minus-circle');
            $(this).blur();
            addToCart(book_id, price);
        });

        // Remove from book detail
        $(document).on('click', '#remove-from-cart-detail', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");

            $(this).attr('title', 'Add to Cart');
            $(this).find('span').html('Add');
            $(this).attr('id', 'add-to-cart-detail');
            $(this).blur();
            removeFromCart(book_id);
        });

        // Remove from differents pages
        $(document).on('click', '.cart #grid-remove-from-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Add to Cart");
            $(this).attr('id', "grid-add-to-cart");
            $('.actions #list-remove-from-cart.book-'+book_id).attr('title', 'Add to Cart');
            $('.actions #list-remove-from-cart.book-'+book_id).attr('id', 'list-add-to-cart');
            $(this).blur();
            removeFromCart(book_id);
        });

        $(document).on('click', '.actions #list-remove-from-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");

            $(this).attr('title', "Add to Cart");
            $(this).attr('id', "list-add-to-cart");
            $('.cart #grid-remove-from-cart.book-'+book_id).attr('title', 'Add to Cart');
            $('.cart #grid-remove-from-cart.book-'+book_id).attr('id', 'grid-add-to-cart');
            $(this).blur();
            removeFromCart(book_id);
        });

        // Remove from home book lists (good)
        $(document).on('click', '.cart #home-remove-from-cart', function(e){
            e.preventDefault();
            book_id = $(this).attr("data-book");
        
            $(this).attr('title', "Add to Cart");
            $(this).attr('id', "home-add-to-cart");
            $(this).find('i').removeClass('icon icon-minus');
            $(this).find('i').removeClass('fa fa-minus-circle');
            $(this).find('i').addClass('icon icon-plus');
            $(this).find('i').addClass('fa fa-plus-circle');
            $(this).blur();
            removeFromCart(book_id);
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

        /*===================================================================================*/
        /*  Login / Logout / Register
        /*===================================================================================*/
        $(document).on('click', '#login-submit', function(e) {
            e.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: { username: username, password: password, controller: 'login', action: 'login' },
                dataType: 'json',
                complete: function (result) {
                    if(result.responseText == 'OK') {
                        window.location.href = BASE_URL;     
                    } else {
                        $("#login-error").show();
                    }
                },
            
            });

        });

        $(document).on('click', '#logout', function(e) {

            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: { controller: 'login', action: 'logout' },
                dataType: 'json',
                complete: function (result) {
                    window.location.href = BASE_URL;     
                },
            
            });

        });

        $(document).on('click', '#register-submit', function(e) {
            e.preventDefault();
            var name = $('#full_name').val();
            var mail = $('#mail').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var repassword = $('#repassword').val();

            if(name.length == 0) {
                $("#register-error").html('Enter a valid name');
                $("#register-error").show();
                return;
            }

            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(mail.length == 0 || !re.test(mail)) {
                $("#register-error").html('Enter a valid mail');
                $("#register-error").show();
                return;
            }

            if(username.length == 0) {
                $("#register-error").html('Enter a valid username');
                $("#register-error").show();
                return;
            }

             if(password.length == 0) {
                $("#register-error").html('Enter a valid password');
                $("#register-error").show();
                return;
            }

            if(password != repassword) {
                $("#register-error").html('Passwords entered do not match');
                $("#register-error").show();
                return;
            }

            $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: { name: name, mail: mail, username: username, password: password, controller: 'login', action: 'do_register' },
                dataType: 'json',
                complete: function (result) {
                    if(result.responseText == 'OK') {
                        window.location.href = BASE_URL + "login";     
                    } else {
                        $("#register-error").html(result.responseText);
                        $("#register-error").show();
                    }
                },
            
            });

        });

        /*===================================================================================*/
        /*  CHECKOUT
        /*===================================================================================*/

        $(document).on('click', "#checkout", function(e){
             e.preventDefault();

             $.ajax({

                url: BASE_URL,
                type: 'POST',
                data: { controller: 'cart', action: 'checkout' },
                dataType: 'json',
                complete: function (result) {
                    $('#cart-amount').attr('data-cart-amount', '0.00');
                    $('#cart-count').attr('data-cart-count', '0');
                    $('#cart-amount').html('Total : $0.00');
                    $('#cart-count').html('0');
                    $("#ajax-content").html(result.responseText);
                    $("html, body").animate({ scrollTop: 0 }, "slow");  
                },
            
            });
        });

        /*===================================================================================*/
        /*  PURCHASES DETAIL
        /*===================================================================================*/

        $(document).on('click', '#view-purchases', function(e){
            e.preventDefault();
            var view = $(this).attr('data-purchase');

            $('.page-body #order-detail').addClass('purchase-detail');

            $('.page-body #purchase').hide();
            $('#purchase.purchase-'+view).show();

            var aTag = $('#purchase.purchase-'+view);
            $('html,body').animate({scrollTop: aTag.offset().top},'slow');

        });

})(jQuery);


























