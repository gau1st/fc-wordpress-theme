/* freshhand animated j.s
*created by Gilang Esha Gautama (gau_1st@yahoo.co.id) 
*/

var Layer1_left;
var Layer2_left;
var Layer3_left;
var Layer4a_left;
var start_here;
var about_us;
var our_service;
var contact_us;
var our_work;
var active_button;
var active_shake;
var loaded;


//******Shaking sequence*********

  var interval = 60;
  var duration= 700;
  var shake= 10;
  var vibrateIndex = 0;
  var vibrateIndex1 = 0;
  var vibrateIndex2 = 0;
  var vibrateIndex3 = 0;
  var vibrateIndex4 = 0;
  var vibrateIndex5 = 0;
  var selectors = $('.logo_container, .footer_old_website, .greeting, .copyrights, .icon_social-cont, .twit_container, #start-here, #start-here-current, #about-us, #about-us-current, #our-service, #our-service-current, #contact-us, #contact-us-current, #our-work, #our-work-current, #start-here-layer-judul, #start-here-layer-content, #start-here-layer-sub_content, #about-us-layer-judul, #about-us-layer-content, #about-us-layer-sub_content, #our-service-layer-judul, #our-service-layer-content, #our-service-layer-sub_content, #contact-us-layer-judul, #contact-us-layer-content, #contact-us-layer-sub_content'); /* Your own container ID*/

    $('.touchSurprise').click(function() { 	
		if (active_shake == true){ 
			active_shake = false;
                        active_button = false;
    		vibrateIndex = setInterval(vibrate, interval);
    		setTimeout(stopVibration, duration);

			vibrateIndex1 = setInterval(vibrate1, interval);
    		setTimeout(stopVibration1, duration);

			vibrateIndex2 = setInterval(vibrate2, interval);
    		setTimeout(stopVibration2, duration);

			vibrateIndex3 = setInterval(vibrate3, interval);
    		setTimeout(stopVibration3, duration);

			vibrateIndex4 = setInterval(vibrate4, interval);
    		setTimeout(stopVibration4, duration);

			vibrateIndex5 = setInterval(vibrate5, interval);
    		setTimeout(stopVibration5, duration);
		}
	});


	var vibrate = function(){
		var rotate	= (Math.floor(Math.random() * shake) - ((shake - 1) / 2));
		$(selectors).stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate * -1 + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration = function() {
		clearInterval(vibrateIndex);
		$(selectors).stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		active_shake = true
active_button = true;
	};
	
	var vibrate1 = function(){
		var rotate	= Math.floor(Math.random() * 2) - ((2 - 1) / 2);
		$('.layer1').stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration1 = function() {
		clearInterval(vibrateIndex1);
		$('.layer1').stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		
	};
	
	var vibrate2 = function(){
		var rotate	= Math.floor(Math.random() * 2) - ((2 - 1) / 2);
		$('.layer2').stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration2 = function() {
		clearInterval(vibrateIndex2);
		$('.layer2').stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		
	};
    	

	var vibrate3 = function(){
		var rotate	= Math.floor(Math.random() * 2) - ((2 - 1) / 2);
		$('.layer3').stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration3 = function() {
		clearInterval(vibrateIndex3);
		$('.layer3').stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		
	};
	
	var vibrate4 = function(){
		var rotate	= Math.floor(Math.random() * 2) - ((2 - 1) / 2);
		$('.layer4b').stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration4 = function() {
		clearInterval(vibrateIndex4);
		$('.layer4b').stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		
	};
	
	var vibrate5 = function(){
		var rotate	= Math.floor(Math.random() * 2) - ((2 - 1) / 2);
		$('.layer4c').stop(true,false)
		.css({WebkitTransform:	'rotate(' + rotate + 'deg)', MozTransform:	'rotate(' + rotate + 'deg)', MsTransform:	'rotate(' + rotate + 'deg)', OTransform:	'rotate(' + rotate + 'deg)' });
	}

	var stopVibration5 = function() {
		clearInterval(vibrateIndex5);
		$('.layer4c').stop(true,false)
		.css({WebkitTransform:	'rotate(0deg)', MozTransform:	'rotate(0deg)', MsTransform:	'rotate(0deg)', OTransform:	'rotate(0deg)'});
		
	};
    	


//*****End Shaking Sequence********


function load()
{
	if (loaded != true){
 		        loaded = true;
                $("#Layer4a").delay(200).animate({"left": "+=2000px"}, 1000);
        	$("#Layer3").delay(350).animate({"left": "+=2000px"}, 1000);
                $("#Layer2").delay(500).animate({"left": "+=2000px"}, 1000);
            	$("#Layer1").delay(650).animate({"left": "+=2000px"}, 1000);
            	$('#start-here-layer').delay(100).fadeIn(100, function(){
            	$("#start-here-layer-sub_content").fadeOut(10, function(){
            	   $("#start-here-layer-judul").animate({"left": "+=2000px"}, 1000);
            	   $("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
            	   $("#start-here-layer-content").delay(200).animate({"left": "+=2200px"}, 1300, function(){
            	   		$("#start-here-layer-sub_content").delay(500).fadeIn(1000,function(){
            	   		active_button = true;
						active_shake = true;
 		           		start_here = true;	 		           		
                                });
                                

            	   });
            	});   
            	});
            	$('#start-here-current').fadeIn(1000);
            	$('#about-us').fadeIn(1000);
            	$('#our-service').fadeIn(1000);
            	$('#contact-us').fadeIn(1000);
            	$('#our-work').fadeIn(1000);
     }       	
}





$('.img_frame_latest_work').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;


  if (start_here == true){
		$('#start-here-current').fadeOut(0);
        $('#start-here').fadeIn(0);
        $('#our-work').fadeOut(0);
  		$('#our-work-current').fadeIn(0);
  		$("#start-here-layer-sub_content").fadeOut(800, function(){
  		
  		$("#Layer1").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer1").fadeOut(10);
  		});

		$("#Layer2").animate({"left": "+=1000px"}, 1000,function(){
  			$("#Layer2").fadeOut(10);
  		});

		$("#Layer3").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer3").fadeOut(10);
  		});

		$("#Layer4a").delay(300).animate({"left": "+=1000px"}, 2800,function(){
  			$("#Layer4a").fadeOut(10);
			start_here = false;
			our_work = true;
			active_button = true;
  		});
		
  		
  		$(".touchSurprise").animate({"left": "+=1000px"}, 100);
  		$("#about-us-layer-judul").animate({"left": "+=4000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
        $("#about-us-layer-content").animate({"left": "+=4400px"}, 1000);

		$("#our-service-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#our-service-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#our-service-layer-content").animate({"left": "+=4400px"}, 1000);
	
		$("#contact-us-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#contact-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#contact-us-layer-content").animate({"left": "+=4500px"}, 1000);
  		
  		$("#start-here-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
  		$("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
        $("#start-here-layer-content").delay(400).animate({"left": "+=2200px"}, 2500, function(){
        	$("#start-here-layer").fadeOut(100);
        });
        
        $("#our-work-layer").delay(1500).fadeIn(1500, function(){
        		
        });
        
  		});
  }
}
});




$('#start-here').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;
  if (about_us == true){
  		$('#about-us-current').fadeOut(0);
  		$('#about-us').fadeIn(0);
  		$('#start-here').fadeOut(0);
  		$('#start-here-current').fadeIn(0);
  		$("#about-us-layer-sub_content").fadeOut(800, function(){
  		$("#Layer1").fadeIn(0);
  		$("#Layer1").delay(300).animate({"left": "-=1000px"}, 2000, function(){
  			$("#start-here-layer-sub_content").fadeIn(800, function(){
            active_shake = true;     
            about_us = false;
 	    start_here = true;
 	    active_button = true;       
            });
			
			
  		});
  		$("#about-us-layer-judul").delay(300).animate({"left": "-=2000px"}, 1700, function(){
        	$("#about-us-layer").fadeOut(100);
        	
        });
  		$("#about-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        $("#about-us-layer-content").animate({"left": "-=2200px"}, 1000);
        
        $("#start-here-layer").fadeIn(110, function(){
        		    $("#start-here-layer-sub_content").fadeOut(10, function(){
        			$("#start-here-layer-sub_content").animate({"left": "-=2550px"}, 1000);
        			$("#start-here-layer-judul").delay(200).animate({"left": "-=2000px"}, 1500);
        			$("#start-here-layer-content").animate({"left": "-=2200px"}, 1000, function(){
        			
        			});
        			
        		});
        	});
        
  		});
  		
  } else if (our_service == true){		
        $('#our-service-current').fadeOut(0);
  		$('#our-service').fadeIn(0);
        $('#start-here').fadeOut(0);
  		$('#start-here-current').fadeIn(0);
  		$("#our-service-layer-sub_content").fadeOut(800, function(){
  		$("#Layer2").fadeIn(0);
  		$("#Layer1").fadeIn(0);
  		$("#Layer2").animate({"left": "-=1000px"}, 1000);
  		$("#Layer1").delay(300).animate({"left": "-=1000px"}, 2000, function(){
  			$("#start-here-layer-sub_content").fadeIn(800, function(){
			active_shake = true;
our_service = false;
  			start_here = true;
  			active_button = true;
			});
            
  		});
  		
  		$("#our-service-layer-judul").delay(300).animate({"left": "-=2000px"}, 1700, function(){
        	$("#our-service-layer").fadeOut(100);
        	
        });
        
  		$("#our-service-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        $("#our-service-layer-content").animate({"left": "-=2200px"}, 1000);
        
        
  		$("#about-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
        $("#about-us-layer-content").animate({"left": "-=4400px"}, 1000);
        $("#about-us-layer-judul").animate({"left": "-=4000px"}, 1000);
        
        
        $("#start-here-layer").fadeIn(110, function(){
        		    $("#start-here-layer-sub_content").fadeOut(10, function(){
        			$("#start-here-layer-sub_content").animate({"left": "-=2550px"}, 1000);
        			$("#start-here-layer-judul").animate({"left": "-=2000px"}, 1500);
        			$("#start-here-layer-content").animate({"left": "-=2200px"}, 1000, function(){
        			
        			});
        			
        		});
        	});
        
  		});
  } else if (contact_us == true){
		 	$('#contact-us-current').fadeOut(0);
	  		$('#contact-us').fadeIn(0);
	        $('#start-here').fadeOut(0);
	  		$('#start-here-current').fadeIn(0);
	  		$("#contact-us-layer-sub_content").fadeOut(800, function(){
	  		$("#Layer3").fadeIn(0);
			$("#Layer2").fadeIn(0);
	  		$("#Layer1").fadeIn(0);
			$("#Layer3").animate({"left": "-=1000px"}, 500);
	  		$("#Layer2").delay(300).animate({"left": "-=1000px"}, 1000);
	  		$("#Layer1").delay(600).animate({"left": "-=1000px"}, 1500, function(){
	  			$("#start-here-layer-sub_content").fadeIn(800, function(){
				active_shake = true;
contact_us =false;
				start_here = true;
				active_button = true;
				});
	            
	  		});
			
			$("#contact-us-layer-judul").delay(100).animate({"left": "-=2000px"}, 1700, function(){
	        	$("#contact-us-layer").fadeOut(100);

	        });

	  		$("#contact-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
	        $("#contact-us-layer-content").animate({"left": "-=2250px"}, 1000);
	        $("#Layer4c").animate({"left": "-=2000px"}, 1200, function(){
	        });
	       	$("#Layer4b").animate({"left": "-=2000px"}, 2000, function(){
	       	});
			
	  		$("#our-service-layer-judul").animate({"left": "-=4000px"}, 1000);
	  		$("#our-service-layer-sub_content").animate({"left": "-=5200px"}, 1000);
	        $("#our-service-layer-content").animate({"left": "-=4400px"}, 1000);


	  		$("#about-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
	        $("#about-us-layer-content").animate({"left": "-=4400px"}, 1000);
	        $("#about-us-layer-judul").animate({"left": "-=4000px"}, 1000);
	
			


	        $("#start-here-layer").fadeIn(110, function(){
	        		    $("#start-here-layer-sub_content").fadeOut(10, function(){
	        			$("#start-here-layer-sub_content").animate({"left": "-=2550px"}, 1000);
	        			$("#start-here-layer-judul").animate({"left": "-=2000px"}, 1500);
	        			$("#start-here-layer-content").animate({"left": "-=2200px"}, 1000, function(){

	        			});

	        		});
	        	});

	  		});
  } else if (our_work == true){

	$('#our-work-current').fadeOut(0);
	$('#our-work').fadeIn(0);
    $('#start-here').fadeOut(0);
	$('#start-here-current').fadeIn(0);
	$("#our-work-layer").fadeOut(800, function(){
	$("#Layer4a").fadeIn(0);
	$("#Layer3").fadeIn(0);
	$("#Layer2").fadeIn(0);
	$("#Layer1").fadeIn(0);
	$("#Layer4a").animate({"left": "-=1000px"}, 500);
	$("#Layer3").delay(300).animate({"left": "-=1000px"}, 1000);
	$("#Layer2").delay(600).animate({"left": "-=1000px"}, 1500);
	$("#Layer1").delay(900).animate({"left": "-=1000px"}, 2000, function(){
		$("#start-here-layer-sub_content").fadeIn(800, function(){
			active_shake = true;
our_work = false;
		start_here = true;
		active_button = true;
		});
        
	});
	$(".touchSurprise").animate({"left": "-=1000px"}, 1000);

	$("#contact-us-layer-judul").animate({"left": "-=4000px"}, 1000);
	$("#contact-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
    $("#contact-us-layer-content").animate({"left": "-=4500px"}, 1000);
	
	$("#our-service-layer-judul").animate({"left": "-=4000px"}, 1000);
	$("#our-service-layer-sub_content").animate({"left": "-=5200px"}, 1000);
    $("#our-service-layer-content").animate({"left": "-=4400px"}, 1000);


	$("#about-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
    $("#about-us-layer-content").animate({"left": "-=4400px"}, 1000);
    $("#about-us-layer-judul").animate({"left": "-=4000px"}, 1000);

	
    $("#start-here-layer").fadeIn(110, function(){
    		    $("#start-here-layer-sub_content").fadeOut(10, function(){
    			$("#start-here-layer-sub_content").animate({"left": "-=2550px"}, 1000);
    			$("#start-here-layer-judul").animate({"left": "-=2000px"}, 1500);
    			$("#start-here-layer-content").animate({"left": "-=2200px"}, 1000, function(){

    			});

    		});
    	});

	});
  } else if (start_here == true ) {
  
  }
}
  
});
$('#about-us').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;
  if (start_here == true){
        $('#start-here-current').fadeOut(0);
        $('#start-here').fadeIn(0);
        $('#about-us').fadeOut(0);
  		$('#about-us-current').fadeIn(0);
  		$("#start-here-layer-sub_content").fadeOut(800, function(){
  		$("#Layer1").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer1").fadeOut(10);
  		});
  		$("#start-here-layer-judul").delay(200).animate({"left": "+=2000px"}, 1000);
  		$("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
        $("#start-here-layer-content").delay(400).animate({"left": "+=2200px"}, 2000, function(){
        	$("#start-here-layer").fadeOut(100, function(){
start_here = false;
  						about_us = true;
  						active_button = true;
});
						
        	
        });
        
        $("#about-us-layer").fadeIn(110, function(){
        		    $("#about-us-layer-sub_content").fadeOut(10, function(){
        			$("#about-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        			$("#about-us-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#about-us-layer-content").animate({"left": "+=2200px"}, 1300, function(){
        			$("#about-us-layer-sub_content").fadeIn(800, function(){
        				active_shake = true;
        			});
        			});
        			
        		});
        	});
        
  		});
  		
  		

  } else if (our_service == true){
			$('#our-service-current').fadeOut(0);
		  	$('#our-service').fadeIn(0);
		    $('#about-us').fadeOut(0);
		  	$('#about-us-current').fadeIn(0);
	  		$("#our-service-layer-sub_content").fadeOut(800, function(){
	  		$("#Layer2").fadeIn(0);
	  		$("#Layer2").delay(300).animate({"left": "-=1000px"}, 2000, function(){
	  			$("#about-us-layer-sub_content").fadeIn(800, function(){
				active_shake = true;
our_service = false;
	            about_us = true;
	            active_button = true;
				});
				
	  		});
	  		$("#our-service-layer-judul").delay(300).animate({"left": "-=2000px"}, 1700, function(){
	        	$("#our-service-layer").fadeOut(100);

	        });
	  		$("#our-service-layer-sub_content").animate({"left": "-=2600px"}, 1000);
	        $("#our-service-layer-content").animate({"left": "-=2200px"}, 1000);

	        $("#about-us-layer").fadeIn(110, function(){
	        		    $("#about-us-layer-sub_content").fadeOut(10, function(){
	        			$("#about-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
	        			$("#about-us-layer-judul").delay(200).animate({"left": "-=2000px"}, 1500);
	        			$("#about-us-layer-content").animate({"left": "-=2200px"}, 1000, function(){

	        			});

	        		});
	        	});

	  		});
        
  } else if (contact_us == true){
		$('#contact-us-current').fadeOut(0);
  		$('#contact-us').fadeIn(0);
        $('#about-us').fadeOut(0);
  		$('#about-us-current').fadeIn(0);
  		$("#contact-us-layer-sub_content").fadeOut(800, function(){
  		$("#Layer3").fadeIn(0);
  		$("#Layer2").fadeIn(0);
  		$("#Layer3").animate({"left": "-=1000px"}, 1000);
  		$("#Layer2").delay(300).animate({"left": "-=1000px"}, 2000, function(){
  			$("#about-us-layer-sub_content").fadeIn(800, function(){
			active_shake = true;
contact_us =false;
			about_us = true;
			active_button = true;
			});
            
  		});

  		
  		$("#contact-us-layer-judul").delay(100).animate({"left": "-=2000px"}, 1700, function(){
        	$("#contact-us-layer").fadeOut(100);
        	
        });
        
  		$("#contact-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        $("#contact-us-layer-content").animate({"left": "-=2250px"}, 1000);
        
        
  		$("#our-service-layer-sub_content").animate({"left": "-=5200px"}, 1000);
        $("#our-service-layer-content").animate({"left": "-=4400px"}, 1000);
        $("#our-service-layer-judul").animate({"left": "-=4000px"}, 1000);
        
        
        $("#about-us-layer").fadeIn(110, function(){
        		    $("#about-us-layer-sub_content").fadeOut(10, function(){
	
					$("#Layer4c").animate({"left": "-=2000px"}, 1200, function(){
				    });
				    
					$("#Layer4b").animate({"left": "-=2000px"}, 2000, function(){
				    });
        			$("#about-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        			$("#about-us-layer-judul").animate({"left": "-=2000px"}, 1500);
        			$("#about-us-layer-content").animate({"left": "-=2200px"}, 1000, function(){
        			
        			});
        			
        		});
        	});
        
  		});
  		
  } else if (our_work == true){
	
	$('#our-work-current').fadeOut(0);
	$('#our-work').fadeIn(0);
    $('#about-us').fadeOut(0);
	$('#about-us-current').fadeIn(0);
	$("#our-work-layer").fadeOut(800, function(){
	$("#Layer4a").fadeIn(0);
	$("#Layer3").fadeIn(0);
	$("#Layer2").fadeIn(0);
	$("#Layer1").fadeIn(0);
	$("#Layer4a").animate({"left": "-=1000px"}, 500);
	$("#Layer3").delay(300).animate({"left": "-=1000px"}, 1000);
	$("#Layer2").delay(600).animate({"left": "-=1000px"}, 1500, function(){
		$("#about-us-layer-sub_content").fadeIn(800, function(){
			active_shake = true;
our_work = false;
		about_us = true;
		active_button = true;	
		});
        
	});
	$(".touchSurprise").animate({"left": "-=1000px"}, 1000);
	$("#contact-us-layer-judul").animate({"left": "-=4000px"}, 1000);
	$("#contact-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
    $("#contact-us-layer-content").animate({"left": "-=4500px"}, 1000);
	
	$("#our-service-layer-judul").animate({"left": "-=4000px"}, 1000);
	$("#our-service-layer-sub_content").animate({"left": "-=5200px"}, 1000);
    $("#our-service-layer-content").animate({"left": "-=4400px"}, 1000);
	
    $("#about-us-layer").fadeIn(110, function(){
    		    $("#about-us-layer-sub_content").fadeOut(10, function(){
    			$("#about-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
    			$("#about-us-layer-judul").animate({"left": "-=2000px"}, 1500);
    			$("#about-us-layer-content").animate({"left": "-=2200px"}, 1000, function(){

    			});

    		});
    	});

	});
	
  } else if (about_us == true ) {
  
  }
} 
});


$('#our-service').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;
  if (start_here == true){  		
        $('#start-here-current').fadeOut(0);
 		$('#start-here').fadeIn(0);
  		$('#our-service').fadeOut(0);
  		$('#our-service-current').fadeIn(0);
  		$("#start-here-layer-sub_content").fadeOut(800, function(){
  		
  		$("#Layer1").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer1").fadeOut(10);
  		});

		$("#Layer2").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer2").fadeOut(10);
  		});

  		$("#about-us-layer-judul").animate({"left": "+=4000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
        $("#about-us-layer-content").animate({"left": "+=4400px"}, 1000);
  		
  		$("#start-here-layer-judul").delay(100).animate({"left": "+=2000px"}, 1000);
  		$("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
        $("#start-here-layer-content").delay(200).animate({"left": "+=2200px"}, 2000, function(){
        	$("#start-here-layer").fadeOut(100);
        });
        
        $("#our-service-layer").fadeIn(110, function(){
        		    $("#our-service-layer-sub_content").fadeOut(10, function(){
        			$("#our-service-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        			$("#our-service-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#our-service-layer-content").animate({"left": "+=2200px"}, 1300, function(){
        				$("#our-service-layer-sub_content").fadeIn(800, function(){
							start_here = false;
							our_service = true;
							active_button = true;
							active_shake = true;
			        	});
        			});
        			
        		});
        	});
        
  		});
  } else if (our_service == true){
  		
  } else if (contact_us == true){
        $('#contact-us-current').fadeOut(0);
  		$('#contact-us').fadeIn(0);
        $('#our-service').fadeOut(0);
  		$('#our-service-current').fadeIn(0);
  		$("#contact-us-layer-sub_content").fadeOut(800, function(){
  		$("#Layer3").fadeIn(0);
  		$("#Layer3").delay(300).animate({"left": "-=1000px"}, 2000, function(){
  			$("#our-service-layer-sub_content").fadeIn(800, function(){
			
                        active_shake = true;
                        contact_us =false;
  			our_service = true;
  			active_button = true;
			});
			
			
  		});
  	
		$("#contact-us-layer-judul").delay(100).animate({"left": "-=2000px"}, 1700, function(){
        	$("#contact-us-layer").fadeOut(100);
        	
        });

       
  		$("#contact-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        $("#contact-us-layer-content").animate({"left": "-=2250px"}, 1000);
        $("#Layer4c").animate({"left": "-=2000px"}, 1200, function(){
        });
       	$("#Layer4b").animate({"left": "-=2000px"}, 2000, function(){
       	});
        
        $("#our-service-layer").fadeIn(110, function(){
        		    $("#our-service-layer-sub_content").fadeOut(10, function(){
        			$("#our-service-layer-sub_content").animate({"left": "-=2600px"}, 1000);
        			$("#our-service-layer-judul").delay(200).animate({"left": "-=2000px"}, 1500);
        			$("#our-service-layer-content").animate({"left": "-=2200px"}, 1000, function(){
        			
        			});
        			
        		});
        	});
        
  		});
        
  		
  } else if (our_work == true){
		$('#our-work-current').fadeOut(0);
  		$('#our-work').fadeIn(0);
        $('#our-service').fadeOut(0);
  		$('#our-service-current').fadeIn(0);
		$("#our-work-layer").fadeOut(800, function(){
		$("#Layer4a").fadeIn(0);
		$("#Layer3").fadeIn(0);
		$("#Layer4a").animate({"left": "-=1000px"}, 500);
		$("#Layer3").delay(300).animate({"left": "-=1000px"}, 1200, function(){
			$("#our-service-layer-sub_content").fadeIn(800, function(){
				active_shake = true;
our_work = false;
			our_service = true;
			active_button = true;	
			});
	        
		});
$(".touchSurprise").animate({"left": "-=1000px"}, 1000);
		$("#contact-us-layer-judul").animate({"left": "-=4000px"}, 1000);
		$("#contact-us-layer-sub_content").animate({"left": "-=5200px"}, 1000);
	    $("#contact-us-layer-content").animate({"left": "-=4500px"}, 1000);


	    $("#our-service-layer").fadeIn(110, function(){
	    		    $("#our-service-layer-sub_content").fadeOut(10, function(){
	    			$("#our-service-layer-sub_content").animate({"left": "-=2600px"}, 1000);
	    			$("#our-service-layer-judul").animate({"left": "-=2000px"}, 1500);
	    			$("#our-service-layer-content").animate({"left": "-=2200px"}, 1000, function(){

	    			});

	    		});
	    	});
		
  	});	
  		
  } else if (about_us == true ) {
		$('#about-us-current').fadeOut(0);
  		$('#about-us').fadeIn(0);
        $('#our-service').fadeOut(0);
  		$('#our-service-current').fadeIn(0);
  		$("#about-us-layer-sub_content").fadeOut(800, function(){
  		$("#Layer2").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer2").fadeOut(10);
  		});
  		$("#about-us-layer-judul").delay(200).animate({"left": "+=2000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        $("#about-us-layer-content").delay(400).animate({"left": "+=2200px"}, 2000, function(){
        	$("#about-us-layer").fadeOut(100);
						
        	
        });
        
        $("#our-service-layer").fadeIn(110, function(){
        		    $("#our-service-layer-sub_content").fadeOut(10, function(){
        			$("#our-service-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        			$("#our-service-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#our-service-layer-content").animate({"left": "+=2200px"}, 1300, function(){
        			$("#our-service-layer-sub_content").fadeIn(800, function(){
        				active_shake = true;
about_us = false;
  						our_service = true;
  						active_button = true;
        			});
        			});
        			
        		});
        	});
        
  		});  		
  		
  }
} 
});

$('#contact-us').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;
  if (start_here == true){
		$('#start-here-current').fadeOut(0);
        $('#start-here').fadeIn(0);
  		$('#contact-us').fadeOut(0);
  		$('#contact-us-current').fadeIn(0);
  		$("#start-here-layer-sub_content").fadeOut(800, function(){
  		
  		$("#Layer1").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer1").fadeOut(10);
  		});

		$("#Layer2").animate({"left": "+=1000px"}, 1400,function(){
  			$("#Layer2").fadeOut(10);
  		});

		$("#Layer3").animate({"left": "+=1000px"}, 2800,function(){
  			$("#Layer3").fadeOut(10);
			
  		});
		
  		
  		
  		$("#about-us-layer-judul").animate({"left": "+=4000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
        $("#about-us-layer-content").animate({"left": "+=4400px"}, 1000);

		$("#our-service-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#our-service-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#our-service-layer-content").animate({"left": "+=4400px"}, 1000);
  		
  		$("#start-here-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
  		$("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
        $("#start-here-layer-content").delay(400).animate({"left": "+=2200px"}, 2500, function(){
        	$("#start-here-layer").fadeOut(100);
        });
        
        $("#contact-us-layer").delay(700).fadeIn(110, function(){
        		    $("#contact-us-layer-sub_content").fadeOut(10, function(){
        			$("#contact-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
					$("#Layer4b").delay(200).animate({"left": "+=2000px"}, 1100, function(){
        
        			});
       				$("#Layer4c").delay(500).animate({"left": "+=2000px"}, 800, function(){
        
       				});
        			$("#contact-us-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#contact-us-layer-content").animate({"left": "+=2250px"}, 1300, function(){
        				$("#contact-us-layer-sub_content").fadeIn(800, function(){
							active_shake = true;
							start_here = false;
							contact_us = true;
							active_button = true;
			        	});
        			});
        			
        		});
        	});
        
  		});
  } else if (our_service == true){
  		
  		$('#our-service-current').fadeOut(0);
  		$('#our-service').fadeIn(0);
        $('#contact-us').fadeOut(0);
  		$('#contact-us-current').fadeIn(0);
  		$("#our-service-layer-sub_content").fadeOut(800, function(){
  		$("#Layer3").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer3").fadeOut(10);
  		});

  		
  		$("#our-service-layer-judul").delay(200).animate({"left": "+=2000px"}, 1000);
  		$("#our-service-layer-sub_content").animate({"left": "+=2600px"}, 1000);
                $("#our-service-layer-content").delay(400).animate({"left": "+=2200px"}, 2000, function(){
        	$("#our-service-layer").fadeOut(100);
						
        });
        
        $("#contact-us-layer").fadeIn(110, function(){
        		    $("#contact-us-layer-sub_content").fadeOut(10, function(){
        			$("#contact-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        			$("#Layer4b").delay(200).animate({"left": "+=2000px"}, 1100, function(){
        
        			});
       				$("#Layer4c").delay(500).animate({"left": "+=2000px"}, 800, function(){
        
       				});
        			

                    $("#contact-us-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#contact-us-layer-content").animate({"left": "+=2250px"}, 1300, function(){
        			$("#contact-us-layer-sub_content").fadeIn(800, function(){
our_service = false;
  						contact_us = true;
  						active_button = true;
                                                active_shake = true;
						
        			});
        			});
        			
        		});
        	});
        
  		});  		
  		
  } else if (contact_us == true){
  		
  } else if (our_work == true){
		$('#our-work-current').fadeOut(0);
  		$('#our-work').fadeIn(0);
        $('#contact-us').fadeOut(0);
  		$('#contact-us-current').fadeIn(0);
		$("#our-work-layer").fadeOut(800, function(){
		$("#Layer4a").fadeIn(0);
		$("#Layer4a").animate({"left": "-=1000px"}, 2000, function(){
			$("#contact-us-layer-sub_content").fadeIn(800, function(){
				active_shake = true;
our_work = false;
			contact_us = true;
			active_button = true;
			});
	                	
		});


	    $("#contact-us-layer").fadeIn(110, function(){
	    		    $("#contact-us-layer-sub_content").fadeOut(10, function(){
					$("#Layer4b").delay(200).animate({"left": "+=2000px"}, 1100, function(){

	        		});
	       			$("#Layer4c").delay(500).animate({"left": "+=2000px"}, 800, function(){

	       			});
$(".touchSurprise").animate({"left": "-=1000px"}, 1000);
	    			$("#contact-us-layer-sub_content").animate({"left": "-=2600px"}, 1000);
	    			$("#contact-us-layer-judul").animate({"left": "-=2000px"}, 1500);
	    			$("#contact-us-layer-content").animate({"left": "-=2250px"}, 1000, function(){
	    			});

	    		});
	    	});
		
  	});

  } else if (about_us == true ) {
		$('#about-us-current').fadeOut(0);
  		$('#about-us').fadeIn(0);
        $('#contact-us').fadeOut(0);
  		$('#contact-us-current').fadeIn(0);
  		$("#about-us-layer-sub_content").fadeOut(800, function(){
  		
  		$("#Layer2").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer2").fadeOut(10);
  		});

		$("#Layer3").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer3").fadeOut(10);
  		});

  		
  		
  		$("#our-service-layer-judul").animate({"left": "+=4000px"}, 1000);
  		$("#our-service-layer-sub_content").animate({"left": "+=5200px"}, 1000);
        $("#our-service-layer-content").animate({"left": "+=4400px"}, 1000);
  		
  		$("#about-us-layer-judul").delay(100).animate({"left": "+=2000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        $("#about-us-layer-content").delay(200).animate({"left": "+=2200px"}, 2000, function(){
        	$("#about-us-layer").fadeOut(100);
        });
        
        $("#contact-us-layer").fadeIn(110, function(){
        		    $("#contact-us-layer-sub_content").fadeOut(10, function(){
        			$("#contact-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
					$("#Layer4b").delay(200).animate({"left": "+=2000px"}, 1100, function(){
        
        			});
       				$("#Layer4c").delay(500).animate({"left": "+=2000px"}, 800, function(){
        
       				});
        			$("#contact-us-layer-judul").animate({"left": "+=2000px"}, 1000);
        			$("#contact-us-layer-content").animate({"left": "+=2250px"}, 1300, function(){
        				$("#contact-us-layer-sub_content").fadeIn(800, function(){
							active_shake = true;
							about_us = false;
	  						contact_us = true;
	  						active_button = true;
			        	});
        			});
        			
        		});
        	});
        
  		});

  }
} 
});

$('#our-work').click(function() {
if (active_button == true){
  active_button = false;
  active_shake = false;
  if (start_here == true){
		$('#start-here-current').fadeOut(0);
        $('#start-here').fadeIn(0);
        $('#our-work').fadeOut(0);
  		$('#our-work-current').fadeIn(0);
  		$("#start-here-layer-sub_content").fadeOut(800, function(){
  		
  		$("#Layer1").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer1").fadeOut(10);
  		});

		$("#Layer2").animate({"left": "+=1000px"}, 1000,function(){
  			$("#Layer2").fadeOut(10);
  		});

		$("#Layer3").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer3").fadeOut(10);
  		});

		$("#Layer4a").delay(300).animate({"left": "+=1000px"}, 2800,function(){
  			$("#Layer4a").fadeOut(10);
			start_here = false;
			our_work = true;
			active_button = true;
  		});
		
  		
  		$(".touchSurprise").animate({"left": "+=1000px"}, 100);
  		$("#about-us-layer-judul").animate({"left": "+=4000px"}, 1000);
  		$("#about-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
        $("#about-us-layer-content").animate({"left": "+=4400px"}, 1000);

		$("#our-service-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#our-service-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#our-service-layer-content").animate({"left": "+=4400px"}, 1000);
	
		$("#contact-us-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#contact-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#contact-us-layer-content").animate({"left": "+=4500px"}, 1000);
  		
  		$("#start-here-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
  		$("#start-here-layer-sub_content").animate({"left": "+=2550px"}, 1000);
        $("#start-here-layer-content").delay(400).animate({"left": "+=2200px"}, 2500, function(){
        	$("#start-here-layer").fadeOut(100);
        });
        
        $("#our-work-layer").delay(1500).fadeIn(1500, function(){
        		
        });
        
  		});
  		
  } else if (our_service == true){
		 	$('#our-service-current').fadeOut(0);
	  		$('#our-service').fadeIn(0);
	        $('#our-work').fadeOut(0);
	  		$('#our-work-current').fadeIn(0);
	  		$("#our-service-layer-sub_content").fadeOut(800, function(){

	  		$("#Layer3").animate({"left": "+=1000px"}, 500,function(){
	  			$("#Layer3").fadeOut(10);
	  		});

			$("#Layer4a").animate({"left": "+=1000px"}, 2000,function(){
	  			$("#Layer4a").fadeOut(10);
	  		});


                        $(".touchSurprise").animate({"left": "+=1000px"}, 100);
			$("#contact-us-layer-judul").animate({"left": "+=4000px"}, 1000);
		  	$("#contact-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
		    $("#contact-us-layer-content").animate({"left": "+=4500px"}, 1000);

	  		$("#our-service-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
	  		$("#our-service-layer-sub_content").animate({"left": "+=2600px"}, 1000);
	        $("#our-service-layer-content").delay(400).animate({"left": "+=2200px"}, 2500, function(){
	        	$("#our-service-layer").fadeOut(100);
				our_service = false;
				our_work = true;
				active_button = true;
	        });

	        $("#our-work-layer").delay(1500).fadeIn(1500, function(){

	        });

	  		});
		
  } else if (contact_us == true){
		$('#contact-us-current').fadeOut(0);
  		$('#contact-us').fadeIn(0);
        $('#our-work').fadeOut(0);
  		$('#our-work-current').fadeIn(0);
  		$("#contact-us-layer-sub_content").fadeOut(800, function(){
		
	    $("#Layer4c").animate({"left": "-=2000px"}, 1000, function(){
	    });
	    $("#Layer4b").animate({"left": "-=2000px"}, 1500, function(){
	    });
		
		$("#Layer4a").animate({"left": "+=1000px"}, 2000,function(){
  			$("#Layer4a").fadeOut(10);
  		});
		
		
		$(".touchSurprise").animate({"left": "+=1000px"}, 100);
  		$("#contact-us-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
  		$("#contact-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);

		

        $("#contact-us-layer-content").delay(400).animate({"left": "+=2250px"}, 2500, function(){
        	$("#contact-us-layer").fadeOut(100);
			contact_us =false;
  			our_work = true;
  			active_button = true;
        });

        $("#our-work-layer").delay(1500).fadeIn(1500, function(){

        });

  		});
  } else if (our_work == true){
  		
  } else if (about_us == true ) {
		$('#about-us-current').fadeOut(0);
  		$('#about-us').fadeIn(0);
        $('#our-work').fadeOut(0);
  		$('#our-work-current').fadeIn(0);
  		$("#about-us-layer-sub_content").fadeOut(800, function(){

		$("#Layer2").animate({"left": "+=1000px"}, 500,function(){
  			$("#Layer2").fadeOut(10);
  		});

		$("#Layer3").animate({"left": "+=1000px"}, 1500,function(){
  			$("#Layer3").fadeOut(10);
  		});

		$("#Layer4a").animate({"left": "+=1000px"}, 3000,function(){
  			$("#Layer4a").fadeOut(10);
			about_us = false;
			our_work = true;
			active_button = true;
  		});
$(".touchSurprise").animate({"left": "+=1000px"}, 100);
		$("#our-service-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#our-service-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#our-service-layer-content").animate({"left": "+=4400px"}, 1000);
	
		$("#contact-us-layer-judul").animate({"left": "+=4000px"}, 1000);
	  	$("#contact-us-layer-sub_content").animate({"left": "+=5200px"}, 1000);
	    $("#contact-us-layer-content").animate({"left": "+=4500px"}, 1000);
  		
  		$("#about-us-layer-judul").delay(200).animate({"left": "+=2000px"}, 1500);
  		$("#about-us-layer-sub_content").animate({"left": "+=2600px"}, 1000);
        $("#about-us-layer-content").delay(400).animate({"left": "+=2200px"}, 2500, function(){
        	$("#about-us-layer").fadeOut(100);
        });
        
        $("#our-work-layer").delay(1500).fadeIn(1500, function(){
        		
        });
        
  		});
  }
} 
});
