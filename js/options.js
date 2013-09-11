(function($) {
	$(document).ready(function(){
	
		$('.on_off').css('display','none'); 
		$('.on, .off').css('text-indent','-10000px');
	
		$("input[name='wmf_reoptions[mobileactive]']").change(function() {
		  var button = $(this).val();
			if(button == 'true'){ $('.switch1').css('background-position', 'right'); }
			if(button == 'false'){ $('.switch1').css('background-position', 'left'); }	 
	    });
		
		$("input[name='wmf_reoptions[tabletactive]']").change(function() {
		  var button = $(this).val();
			if(button == 'true'){ $('.switch2').css('background-position', 'right'); }
			if(button == 'false'){ $('.switch2').css('background-position', 'left'); }	 
	    });
		
		$("input[name='wmf_reoptions[backlink]']").change(function() {
		  var button = $(this).val();
			if(button == 'true'){ $('.switch3').css('background-position', 'right'); }
			if(button == 'false'){ $('.switch3').css('background-position', 'left'); }	 
	    });
		
	});
})(jQuery);