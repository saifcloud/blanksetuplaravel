
// responsive function navbar function

$(document).ready(function(){
    $('.navbar-toggler').click(function(){
        $('.collapse').toggleClass('showit');
    });
});

//function for Notification

		$(document).ready(function(){
			$('.pf_dropdwn').click(function(){
				$('.pf-dropdown-menu').toggle();
            });
            $('#wrapper').on("click", function(e){
                $('.pf-dropdown-menu').hide();
            });
            
		});
	

// function for hightlight navlink 
	
		$(document).ready(function(){
			$('.sidebar-nav li').click(function(){
				$(this).addClass('.sidebar-nav active');
				$(this).siblings().removeClass('.sidebar-nav active')
			});
		});


// function for click on navlink to change tab

	$(document).ready(function(){
		$('#pf_tab_one').show();
		$('#pf_tab_two').hide();
			$('#pf_tab_three').hide();
			$('#pf_tab_four').hide();
			$('#pf_tab_five').hide();
		$('#tab_one').click(function(){
			$('#pf_tab_one').show();
			$('#pf_tab_two').hide();
			$('#pf_tab_three').hide();
			$('#pf_tab_four').hide();
			$('#pf_tab_five').hide();
		});

		$('#tab_two').click(function(){
			$('#pf_tab_two').show();
			$('#pf_tab_one').hide();
			$('#pf_tab_three').hide();
			$('#pf_tab_four').hide();
			$('#pf_tab_five').hide();
		});

		$('#tab_three').click(function(){
			$('#pf_tab_three').show();
			$('#pf_tab_one').hide();
			$('#pf_tab_four').hide();
			$('#pf_tab_five').hide();
			$('#pf_tab_two').hide();
		});

		$('#tab_four').click(function(){
			$('#pf_tab_three').hide();
			$('#pf_tab_one').hide();
			$('#pf_tab_four').show();
			$('#pf_tab_five').hide();
			$('#pf_tab_two').hide();
		});

		$('#tab_five').click(function(){
			$('#pf_tab_three').hide();
			$('#pf_tab_one').hide();
			$('#pf_tab_four').hide();
			$('#pf_tab_five').show();
			$('#pf_tab_two').hide();
		});
	});


    // this funtion for complete portfolio investment section


    $(document).ready(function(){
        $('#pf_inner_two').hide();
        $('.pf_click_one').css('min-width', '76.5%');
        $('.pf_click_one').click(function(){
            $('#pf_inner_one').show();
            $('#pf_inner_two').hide();
            $('.pf_click_one').addClass('pf_active');
            $('.pf_click_two').removeClass('pf_active');
            $('.pf_click_two').removeClass('slide-out');
            $('.pf_click_one').css('min-width', '76.5%');
        
        });

        $('.pf_click_two').click(function(){
            $('#pf_inner_two').show();
            $('#pf_inner_one').hide();
            $('.pf_click_one').removeClass('pf_active');
            $('.pf_click_two').addClass('pf_active');
            $('.pf_click_two').addClass('slide-out');
            $('.pf_click_one').css('min-width', '0%');
        });
    });


    // this function for  complete wallet tab section

    $(document).ready(function(){
		$('#pf_inner_two_second').hide();
		$('#pf_inner_one_second').show();
		$('#pf_inner_three_second').hide();
		$('#pf_inner_four_second').hide();
        $('#pf_tab_two').hide();
        $('#pf_click_second_first').css('min-width', '0%');
        $('#pf_click_second_third').css('min-width', '0%');
        $('#pf_click_second_four').css('min-width', '0%');
        $('#pf_click_second_first').css('min-width', '46.7%');
		$('#pf_click_second_first').click(function(){
			$('#pf_inner_one_second').show();
			$('#pf_click_second_first').addClass('pf_active');
			// $('#pf_click_second_first').addClass('slide-out');
		$('#pf_inner_two_second').hide();
		$('#pf_inner_three_second').hide();
		$('#pf_inner_four_second').hide();
        $('#pf_click_second_first').css('min-width', '42.7%');
        $('#pf_click_second_second').css('min-width', '0%');
        $('#pf_click_second_second').removeClass('pf_active');
        $('#pf_click_second_third').css('min-width', '0%');
        $('#pf_click_second_third').removeClass('pf_active');
        $('#pf_click_second_four').removeClass('pf_active');
        $('#pf_click_second_four').css('min-width', '0%');
	});

		$('#pf_click_second_second').click(function(){
        $('#pf_inner_two_second').show();
        $('#pf_click_second_second').addClass('pf_active');
		$('#pf_inner_one_second').hide();
		$('#pf_inner_three_second').hide();
		$('#pf_inner_four_second').hide();
        $('#pf_click_second_second').css('min-width', '39.7%');
        $('#pf_click_second_first').css('min-width', '0%');
        $('#pf_click_second_first').removeClass('pf_active');
        $('#pf_click_second_first').removeClass('slide-out');
        $('#pf_click_second_third').css('min-width', '0%');
        $('#pf_click_second_third').removeClass('pf_active');
        $('#pf_click_second_third').removeClass('slide-out');
        $('#pf_click_second_four').removeClass('slide-out');
        $('#pf_click_second_four').removeClass('pf_active');
        $('#pf_click_second_four').css('min-width', '0%');
	});

		
	$('#pf_click_second_third').click(function(){
		$('#pf_inner_three_second').show();
		$('#pf_inner_two_second').hide();
		$('#pf_inner_one_second').hide();
		$('#pf_inner_four_second').hide();
        $('#pf_click_second_third').css('min-width', '53.6%');
        $('#pf_click_second_third').addClass('pf_active');
        $('#pf_click_second_third').addClass('slide-out');
        //wallet 3rd click
        $('#pf_click_second_second').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_four').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_first').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_first').removeClass('pf_active');
        $('#pf_click_second_four').removeClass('pf_active');
        $('#pf_click_second_first').removeClass('slide-out');
        $('#pf_click_second_second').removeClass('pf_active');
        $('#pf_click_second_second').removeClass('slide-out');
        $('#pf_click_second_four').removeClass('slide-out');
	});

	$('#pf_click_second_four').click(function(){
		$('#pf_inner_four_second').show();

		$('#pf_inner_two_second').hide();
		$('#pf_inner_one_second').hide();
		$('#pf_inner_three_second').hide();
        $('#pf_click_second_four').css('min-width', '42.7%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_four').addClass('pf_active');
        $('#pf_click_second_four').addClass('slide-out');
        // wallet 4th click
        $('#pf_click_second_second').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_third').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_first').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
        $('#pf_click_second_first').removeClass('pf_active');
        $('#pf_click_second_first').removeClass('slide-out');
        $('#pf_click_second_third').removeClass('pf_active');
        $('#pf_click_second_third').removeClass('slide-out');
        $('#pf_click_second_second').removeClass('pf_active');
		$('#pf_click_second_second').removeClass('slide-out');
	});
});



// this function for  complete referral tab section

$(document).ready(function(){
    $('#pf_inner_one_three').show();
    $('#pf_inner_two_three').hide();
    $('#pf_inner_three_three').hide();
    $('#pf_click_third_first').css('min-width', '54.7%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_first').click(function(){
        $('#pf_inner_one_three').show();
        $('#pf_inner_two_three').hide();
    $('#pf_inner_three_three').hide();
    //slide out , pf actvie and css add
    $('#pf_click_third_first').css('min-width', '54.7%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_first').addClass('pf_active');
    //slide out , pf actvie and css remove on other
    $('#pf_click_third_second').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_second').removeClass('pf_active');
    
    //
    $('#pf_click_third_third').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_third').removeClass('pf_active');
   

    });

    
    $('#pf_click_third_second').click(function(){
        $('#pf_inner_two_three').show();
        //
        $('#pf_inner_one_three').hide();
        $('#pf_inner_three_three').hide();
        //slide out , pf actvie and css add
    $('#pf_click_third_second').css('min-width', '54.7%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_second').addClass('pf_active');
   
    //slide out , pf actvie and css remove on other
    $('#pf_click_third_first').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_first').removeClass('pf_active');
    //
    $('#pf_click_third_third').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_third').removeClass('pf_active');
    });


    $('#pf_click_third_third').click(function(){
        $('#pf_inner_three_three').show();
        //
        $('#pf_inner_one_three').hide();
        $('#pf_inner_two_three').hide();
        //slide out , pf actvie and css add
    $('#pf_click_third_third').css('min-width', '54.7%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_third').addClass('pf_active');
    //slide out , pf actvie and css remove on other
    $('#pf_click_third_first').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_first').removeClass('pf_active');
    //
    $('#pf_click_third_second').css('min-width', '0%', 'transition', '0.3s all ease-in-out',);
    $('#pf_click_third_second').removeClass('pf_active');
    });
});


// toggler button animation hide show function

$(document).ready(function(){
    $('.pf_wrapper').removeClass();
    $('#toggler_pf').click(function(){
    $('#sideout').removeClass('moved');
    $('.page-content-wrapper').parent().addClass('pf_wrapper');
});
    $('.sidemenu_cancel img').click(function(){
        $('#sideout').addClass('moved');
        $('.page-content-wrapper').parent().removeClass('pf_wrapper');
    });
    $('#wrapper').on("click", function(e){
        $('#sideout').addClass('moved');
        $('.page-content-wrapper').parent().removeClass('pf_wrapper');
    });
});




