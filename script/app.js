$(document).ready(function(){

    $('.hamburger').click(function(){
        $(this).toggleClass('rotated-hamburger')
        $('.navigation').toggleClass('shown');
    })

    $(window).click(function(){
        if($(event.target).hasClass('navigation__container')) {
            $('.navigation').removeClass('shown');
            $('.hamburger').removeClass('rotated-hamburger');
        }
    })

    $('.dropdown__item-title').click(function(){
        $(this).next().slideToggle();
    })

    $('.modal').click(function(){
        $(this).removeClass('opened')

        $('.modal-content').click(function(event){
            event.stopPropagation()
        })
    })

    // Dropdown Menu
    $('.dropdown_toggle').click(function(){
        event.preventDefault();
        $(this).toggleClass('opened');
        $(this).children().toggleClass('rotated')
        $(this).next().slideToggle(500);
    })

    // Change Programms List in WhatToLearn page
    $('.programms__tabs-item').click(function(){
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
    })
})