/*
 *
 *		THEME-OPTIONS.JS
 *
 */

$(document).ready(function() {
    
	var theme_options_content = ' \
		<h4>Theme Options</h4> \
		<a href="#"></a> \
		<br> \
		<h5>Change Color</h5> \
		<div class="colors clearfix"> \
			<a id="default" href="#" data-style="default"></a> \
			<a id="green" href="#" data-style="green"></a> \
			<a id="beige" href="#" data-style="beige"></a> \
		</div><!-- colors --> \
		<h5>Change Layout</h5> \
		<div class="layout clearfix"> \
			<a class="wide" href="#" data-style="wide"><img src="assets/plugins/theme-options/images/wide.png" alt="">Wide</a> \
			<a class="boxed" href="#" data-style="boxed"><img src="assets/plugins/theme-options/images/boxed.png" alt="">Boxed</a> \
		</div><!-- layout --> \
		<h5>Change Pattern</h5> \
		<div class="patterns clearfix"> \
			<a class="bg-pattern-1" href="#" data-style="bg-pattern-1"></a> \
			<a class="bg-pattern-2" href="#" data-style="bg-pattern-2"></a> \
			<a class="bg-pattern-3" href="#" data-style="bg-pattern-3"></a> \
			<a class="bg-pattern-4" href="#" data-style="bg-pattern-4"></a> \
			<a class="bg-pattern-5" href="#" data-style="bg-pattern-5"></a> \
			<a class="bg-pattern-6" href="#" data-style="bg-pattern-6"></a> \
			<a class="bg-pattern-7" href="#" data-style="bg-pattern-7"></a> \
			<a class="bg-pattern-8" href="#" data-style="bg-pattern-8"></a> \
			<a class="bg-pattern-9" href="#" data-style="bg-pattern-9"></a> \
			<a class="bg-pattern-10" href="#" data-style="bg-pattern-10"></a> \
		</div><!-- pattern --> \
	\ ';
	
	$("#theme-options").prepend(theme_options_content);
	
	$("#theme-options > a").on("click", function(e) {
        
		e.preventDefault();
		$("#theme-options").toggleClass("open");
		
    });
	
	
	var link = $('link[data-style="styles"]');
	var chelsea_colors = $.cookie('chelsea_colors'),
		chelsea_layout = $.cookie('chelsea_layout'),		
		chelsea_bg_pattern = $.cookie('chelsea_bg_pattern');
		
	if (!($.cookie('chelsea_colors'))) {
		
		$.cookie('chelsea_colors', 'default', 365);
		chelsea_colors = $.cookie('chelsea_colors');
		$('#theme-options .colors a[data-style="'+chelsea_colors+'"]');
		
	} else {
		
		link.attr('href','assets/css/alternative-styles/' + chelsea_colors + '.css');
		$('#theme-options .colors a[data-style="'+chelsea_colors+'"]');
		
	};

	if (!($.cookie('chelsea_layout'))) {
		
		$.cookie('chelsea_layout', 'wide', 365);
		chelsea_layout = $.cookie('chelsea_layout');
		$("body").addClass(chelsea_layout);
		$('#theme-options .layout a[data-style="wide"]');
		
	} else {
		
		if (chelsea_layout=="boxed") {
			
			$("body").addClass(chelsea_layout);
			$("body").removeClass("wide");
			
		} else { 
		
			$("body").addClass(chelsea_layout);
			$("body").removeClass("boxed bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			
		};
		
	};

	if ((chelsea_layout =="boxed") && $.cookie('chelsea_bg_pattern')) {
		
		$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 wide");
		$("body").addClass(chelsea_bg_pattern); 
		
	} else { 
	
		if (chelsea_layout =="boxed") {
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			
		} else {
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 boxed");
			
		}
		
	};


	// CHANGE COLOR //
	$('#theme-options .colors a').on('click',function(e) {
		
		var $this = $(this),
			chelsea_colors = $this.data('style');
			
		e.preventDefault();
		
		link.attr('href', 'assets/css/alternative-styles/' + chelsea_colors + '.css');
		$.cookie('chelsea_colors', chelsea_colors, 365);
				
	});

	// BOXED LAYOUT //
	$('#theme-options .layout a.boxed').on('click',function(e) {
		
		e.preventDefault(); 
		
		$("body").addClass("boxed");
		$("body").removeClass("wide");
		$.cookie('chelsea_layout', 'boxed', 365);
		
		if ($.cookie('chelsea_bg_pattern')) {
			
			var chelsea_bg_pattern = $.cookie('chelsea_bg_pattern');
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			$("body").addClass(chelsea_bg_pattern);
			
		}
		
		document.location.reload();
		
	});

	// WIDE LAYOUT
	$('#theme-options .layout a.wide').on('click',function(e) {
		
		e.preventDefault(); 
		
		$("body").addClass("wide");
		$("body").removeClass("boxed bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
		$.cookie('chelsea_layout', 'wide', 365);
		
		document.location.reload();
		
	});
	
	// CHANGE PATTERNS //
	$('#theme-options .patterns a').on('click',function(e) {
		
		var $this = $(this),
			chelsea_bg_pattern = $this.data('style');
			
		e.preventDefault();
			 
		$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 wide");
		$("body").addClass(chelsea_bg_pattern);
		$("#theme-options select").val("boxed");
		$.cookie('chelsea_bg_pattern', chelsea_bg_pattern, 365);
		
	});

});    	