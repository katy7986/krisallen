$(document).ready(function(){


	//Init Jquery Tweet
	jQuery(function($){
		$(".twitter .embed").tweet({
			username: "KrisAllen",
			join_text: "auto",
			avatar_size: 32,
			count: 1,
			auto_join_text_default: "I said,", 
			auto_join_text_ed: "I",
			auto_join_text_ing: "I was",
			auto_join_text_reply: "I replied to",
			auto_join_text_url: "I was checking out",
			loading_text: "loading.",
			template: "{time} {text}"
		});
	});

	$(window).scroll(function() {
		var y = $(window).scrollTop();

		console.log(y);

		if (y > 322) {
			$("nav").addClass('fixed');
			$("#news").css({padding : '60px 0 0'});
		} else {
			$("nav").removeClass('fixed');
			$("#news").css({padding : '0'});
		}
	});


	function onResize() {
		var w = $(window).width(),
			m = Math.floor(w*0.03);

		$('#social > div').css({ width : (w-200)/3 });

		if (w < 1285 && w > 768) {
			$('#news article').css({ width : (w-180)/2 });
		}

		if (w <= 1024) {
			$('#social > div').css({ width : (w-100) });
		}

		if (w <= 768) {
			$('#news article').css({
				width : (w-(m*2)),
				marginLeft : m,
				marginBottom : m
			});

			$('#news').css({ marginTop : m });
		
			$('#social > div').css({
				width : (w-m*2),
				margin : m
			});

			$('#social .embed').css({ marginLeft : 25+m });
			$('#events').css({ margin : m });
			$('#events section').css({ width : w-m*2, marginBottom : m });
		}

	}

	$(window).resize(function() { onResize(); });
	onResize();




});