jQuery(document).ready(function($){
	//update these values if you change these breakpoints in the style.css file (or _layout.scss if you use SASS)
	var MqM= 768,
		MqL = 1024;

	var faqsSections = $('.cd-faq-group'),
		faqTrigger = $('.cd-faq-trigger'),
		faqsContainer = $('.cd-faq-items'),
		faqsCategoriesContainer = $('.cd-faq-categories'),
		faqsCategories = faqsCategoriesContainer.find('a'),
		closeFaqsContainer = $('.cd-close-panel');
	
	//select a faq section 
	faqsCategories.on('click', function(event){
		event.preventDefault();
		var selectedHref = $(this).attr('href'),
			target= $(selectedHref);
		if( $(window).width() < MqM) {
			faqsContainer.scrollTop(0).addClass('slide-in').children('ul').removeClass('selected').end().children(selectedHref).addClass('selected');
			closeFaqsContainer.addClass('move-left');
			$('body').addClass('cd-overlay');
		} else {
	        $('body,html').animate({ 'scrollTop': target.offset().top - 19}, 200); 
		}
	});

	//close faq lateral panel - mobile only
	$('body').bind('click touchstart', function(event){
		if( $(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) { 
			closePanel(event);
		}
	});
	faqsContainer.on('swiperight', function(event){
		closePanel(event);
	});

	//show faq content clicking on faqTrigger
	faqTrigger.on('click', function(event){
		event.preventDefault();
		$(this).next('.cd-faq-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
	});

	//update category sidebar while scrolling
	$(window).on('scroll', function(){
		if ( $(window).width() > MqL ) {
			(!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory); 
		}
	});

	$(window).on('resize', function(){
		if($(window).width() <= MqL) {
			faqsCategoriesContainer.removeClass('is-fixed').css({
				'-moz-transform': 'translateY(0)',
			    '-webkit-transform': 'translateY(0)',
				'-ms-transform': 'translateY(0)',
				'-o-transform': 'translateY(0)',
				'transform': 'translateY(0)',
			});
		}	
		if( faqsCategoriesContainer.hasClass('is-fixed') ) {
			faqsCategoriesContainer.css({
				'left': faqsContainer.offset().left,
			});
		}
	});

	function closePanel(e) {
		e.preventDefault();
		faqsContainer.removeClass('slide-in').find('li').show();
		closeFaqsContainer.removeClass('move-left');
		$('body').removeClass('cd-overlay');
	}

	function updateCategory(){
		updateCategoryPosition();
		updateSelectedCategory();
	}

	function updateCategoryPosition() {
		var top = $('.cd-faq').offset().top,
			height = jQuery('.cd-faq').height() - jQuery('.cd-faq-categories').height(),
			margin = 20;
		if( top - margin <= $(window).scrollTop() && top - margin + height > $(window).scrollTop() ) {
			var leftValue = faqsCategoriesContainer.offset().left,
				widthValue = faqsCategoriesContainer.width();
			faqsCategoriesContainer.addClass('is-fixed').css({
				'left': leftValue,
				'top': margin,
				'-moz-transform': 'translateZ(0)',
			    '-webkit-transform': 'translateZ(0)',
				'-ms-transform': 'translateZ(0)',
				'-o-transform': 'translateZ(0)',
				'transform': 'translateZ(0)',
			});
		} else if( top - margin + height <= $(window).scrollTop()) {
			var delta = top - margin + height - $(window).scrollTop();
			faqsCategoriesContainer.css({
				'-moz-transform': 'translateZ(0) translateY('+delta+'px)',
			    '-webkit-transform': 'translateZ(0) translateY('+delta+'px)',
				'-ms-transform': 'translateZ(0) translateY('+delta+'px)',
				'-o-transform': 'translateZ(0) translateY('+delta+'px)',
				'transform': 'translateZ(0) translateY('+delta+'px)',
			});
		} else { 
			faqsCategoriesContainer.removeClass('is-fixed').css({
				'left': 0,
				'top': 0,
			});
		}
	}

	function updateSelectedCategory() {
		faqsSections.each(function(){
			var actual = $(this),
				margin = parseInt($('.cd-faq-title').eq(1).css('marginTop').replace('px', '')),
				activeCategory = $('.cd-faq-categories a[href="#'+actual.attr('id')+'"]'),
				topSection = (activeCategory.parent('li').is(':first-child')) ? 0 : Math.round(actual.offset().top);
			
			if ( ( topSection - 20 <= $(window).scrollTop() ) && ( Math.round(actual.offset().top) + actual.height() + margin - 20 > $(window).scrollTop() ) ) {
				activeCategory.addClass('selected');
			}else {
				activeCategory.removeClass('selected');
			}
		});
	}
});
$(function() {
	var $input = $('.sexyform');
	var selected = $('option:selected').val();
	$input.sexyForm(selected);
	$('select').on('change', function(){
		var style = $('option:selected').val();
		$('.formContainer').children().remove();
		var newInput = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Enter Your First Name",
			id: '1'
		});
		var newInput2 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Enter Your Last Name",
			id: '2'
		});
		var newInput3 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Enter Your E-mail",
			id: '3'
		});
		var newInput4 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Enter Your Contact Number",
			id: '4'
		});
		
		var newInput5 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Enter Your Qualification",
			id: '5'
		});
		var newInput6 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "College/Organisation/University",
			id: '6'
		});
		var newInput7 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Country Of Current Residence",
			id: '7'
		});
		var newInput8 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Country Of Current Residence",
			id: '8'
		});
		var newInput9 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "What Benefit Do You Expect From CELT?",
			id: '9'
		});
		var newInput10 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Which challenges, do you feel, does a startup face in it's inception and what are your solutions to those ?",
			id: '10'
		});
		var newInput11 = $('<span>').addClass('sexyform').attr({
			'data-placeholder': "Where do you see yourself in 10 years from now?",
			id: '11'
		});
		$('.formContainer').append(newInput, newInput2, newInput3, newInput4, newInput5, newInput6, newInput7, newInput8
		, newInput9, newInput10, newInput11, newInput12, newInput13
		);
		$input.sexyForm('one');
	});
	$('.howToShow').on('click', function (){
		$('.howTo').fadeToggle();
	});
	$('.exit').on('click', function (){
		$('.howTo').fadeToggle();
	});
});
$(function() {
	$('.sexyform').sexyForm('one');
	
});
$(document).on("click", ".sexyform", function () {
   var id=$(this).attr('id');
   $.ajax({
    type: 'POST',
    url: "form_submit1",
    data:{fname:id},
    success: function (result) {
       document.write("success");
     },
  })
})
  

