$(document).ready(function(){
	/**********************
		Stick Navigation 
	**********************/
	// run a method of scroll on window
	$(window).scroll(function(){
		// each time the window is scrolled this code will be run
		// Add a class of fixed-nav to the element with ID mainNav 
		$("#mainNav").addClass("fixed-nav");
		// Add a class of add-padding class to the element with id headerContent
		$("#headerContent").addClass("add-padding");
		// Check if the top of the document is less than 150
		if($(document).scrollTop() < 150){
			// this means the header area is visible and we can put the navigation back to its original position
			// We are removing the classes to reset to original position
			$("#mainNav").removeClass("fixed-nav");
			$("#headerContent").removeClass("add-padding");
		}
	});

	/******************************************************
	 show/hide navigation on hamburger menu click 
	*****************************************************/
	// adding click event to the element with class im-menu and calling function toggleMenu when the event happen
	$(".im-menu").on("click", toggleMenu);
	// adding click event to the list items in the nav and calling function toggleMenu when the event happen
	$("nav ul li").on("click", toggleMenu);

	// Defining the toggleMenu function that will toggle show class form the nav ul to show and hide it on the page
	function toggleMenu(){
		$("nav > ul").toggleClass("show");
	} 

	/*********************
		Smooth Scroll
	**********************/
	// Adding a click event to the nav anchor tags that have # in the href attribute value
	$("nav a[href*=\\#]").click(function(e){
		// when click event happens this function code will be run
		// first using preventDefault on e which is the event to stop the link from performing the default function
		e.preventDefault();
		// Now checking if the path name of the anchor tag and the has of the anchor tag matches with the location we are on.
		if(location.pathname.replace("/^\//","") == this.pathname.replace("/^\//","") && location.hostname == this.hostname){
			// create a variable with name hash and save the hash value in it
			var hash = this.hash;
			// the hash value from the anchor tag refers to one of the element's id 
			var $target = $(this.hash);
			// check if the $target variable contains some data in it by using .length if it does not then we set it to be an element with name attribute set to the hash value
			$target = $target.length && $target || $("[name="+this.hash.slice(1)+"]");
			// adding logic to make sure the $target variable is not empty
			if($target.length){
				// remove active class from the element that has the active class
				$(".active").removeClass("active");
				// target the parent of this - this is the link that is clicked and the parent will be the li, add class of active to the parent
				$(this).parent().addClass("active");
				// calculate the target element's off set from top and subtract 60 from it to account for the navigation height
				var targetOffset = $target.offset().top - 60;
				// finally target the html and body tag together and run js animate on them
				// we are setting the scrollTop property of html and body to be equal to the offset of the target element setting the duration to 1000ms and calling a function when the animation is done
				$("html,body").animate({

					scrollTop: targetOffset
				}, 1000, function(){
					// in the call back function on animation completion we are changing the browser url to hash of the anchor tag concatenated with _page. Example for about it will be #about_page
					location.hash = hash+"_page";
				});
			}
		}
	});

	/**********************************************************
		Waypoints: for running function on an element's vertical position while scrolling
		We need to include the waypoint library to our code for this to work
	************************************************************/
	//  we are using simple example where we are running the waypoint method on the element with id services
	var waypoints = $("#services").waypoint({
		// handler is the function that is called when element is in view
		handler: function(direction){
			// direction is an argument that tells us if the element we are targeting for waypoint is being scrolled down of the offset or up
			if(direction == "down"){
				// if the direction of scroll is down then we add class of animated and bounceIn to each element with class service inside the element that we are running the waypoint on
				$("#"+this.element.id+" .service").addClass("animated bounceIn");
			}else if(direction == "up"){
				// if we are scrolling up then we remove the class
				$("#"+this.element.id+" .service").removeClass("animated bounceIn");
				// for the animation to work we need to include the animate.css file to our code.
			}
		},
		offset: "50%" // offset helps to define how far off the top of the screen the element needs to be for the handler to work
	});

});