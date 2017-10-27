
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var swipe = require('jquery-touchswipe');

/*
window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

*/
 $(function() {     


 $(".carousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});


    });

 

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

function resizeNewsMain() {

    if ($(window).width() > 760) {
    var maxHeight = Math.max.apply(null, $("#news .row p").map(function () {
        return $(this).height();
    }).get());
    
    $('#news .row p').css('min-height', maxHeight);
    }
    
}


$(window).on('resize', resizeNewsMain );

 resizeNewsMain();


$('.animScroll').on('click', function(event) {
//$('a[href^="#top"]').on('click', function(event) {

    var target = $(this.getAttribute('href'));

    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 1000);
    }

});


$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 420) {
        $('#scrollTop').fadeIn("slow");
    } else {
        $('#scrollTop').fadeOut("slow");
    }

});








$('.carousel').carousel({
    pause: "false"
});






