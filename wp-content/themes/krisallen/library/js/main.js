jQuery(document).ready(function($){


	//Init Jquery Tweet	
/*
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
*/

	$(window).scroll(function() {
		var y = $(window).scrollTop();
		var vScroll = y/2;	

		console.log(y);

		if (y > 322) {
			$("nav").addClass('fixed');
			$("#news").css({padding : '60px 0 0'});
		} else {
			$("nav").removeClass('fixed');
			$("#news").css({padding : '0'});
			$("#logo").css("-webkit-transform", "translateY(" + vScroll + "px)");
		}
	});
	
	//FlexSlider for post on front page
	$('#news').flexslider({
		animation:	'slide',
		slideshow:	false,
		minItems:	1,
		maxItems:	4,
		itemWidth:	400,
		move:		1,
		controlNav:	false,
		selector:	".scrollarea > article"
	});
	
	$('.nextarr').click(function(e) {
		$('#news .flex-next').click();
		e.preventDefault();
	});

	$('.prevarr').click(function(e) {
		$('#news .flex-prev').click();
		e.preventDefault();
	});
	
	$('.igfeed').flexslider({
		animation:	'slide',
		slideshow:	false,
		minItems:	1,
		maxItems:	3,
		itemWidth:	185,
		itemMargin: 10,
		controlNav:	false,
		selector:	".scrollarea > a"
	});
	$('.instanext').click(function(e) {
		$('.igfeed .flex-next').click();
		e.preventDefault();
	});
	
	$('#events').flexslider({
		animation:	'slide',
		slideshow:	false,
		minItems:	1,
		maxItems:	4,
		itemWidth:	300,
		controlNav:	false,
		selector:	".scrollarea > section"
	});
	$('.eventsnext').click(function(e) {
		$('#events .flex-next').click();
		e.preventDefault();
	});	
	
	$('.fitvids').fitVids();

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
	
		$('.fitvids').fitVids();
	}

	$(window).resize(function() { onResize(); });
	onResize();


	// Jquery Twitter Feed
	
    var displaylimit = 3;
    var twitterprofile = "krisallen";
	var screenname = "Kris Allen";
    var showdirecttweets = false;
    var showretweets = true;
    var showtweetlinks = true;
    var showprofilepic = false;
	var showtweetactions = true;
	var showretweetindicator = true;
	
	
    $.getJSON('/wp-content/themes/krisallen/library/twitteroauth/get-tweets.php', 
        function(feeds) {   
		   //alert(feeds);
            var feedHTML = '';
            var displayCounter = 1;         
            for (var i=0; i<feeds.length; i++) {
				var tweetscreenname = feeds[i].user.name;
                var tweetusername = feeds[i].user.screen_name;
                var profileimage = feeds[i].user.profile_image_url_https;
                var status = feeds[i].text; 
				var isaretweet = false;
				var isdirect = false;
				var tweetid = feeds[i].id_str;
				
				//If the tweet has been retweeted, get the profile pic of the tweeter
				if(typeof feeds[i].retweeted_status != 'undefined'){
				   profileimage = feeds[i].retweeted_status.user.profile_image_url_https;
				   tweetscreenname = feeds[i].retweeted_status.user.name;
				   tweetusername = feeds[i].retweeted_status.user.screen_name;
				   tweetid = feeds[i].retweeted_status.id_str;
				   status = feeds[i].retweeted_status.text; 
				   isaretweet = true;
				 };
				 
				 
				 //Check to see if the tweet is a direct message
				 if (feeds[i].text.substr(0,1) == "@") {
					 isdirect = true;
				 }
				 
				//console.log(feeds[i]);
				 
				 //Generate twitter feed HTML based on selected options
				 if (((showretweets == true) || ((isaretweet == false) && (showretweets == false))) && ((showdirecttweets == true) || ((showdirecttweets == false) && (isdirect == false)))) { 
					if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {             
						if (showtweetlinks == true) {
							status = addlinks(status);
						}
									 
						feedHTML += '<div class="twitter-article">'; 				
						feedHTML += '<div class="tweet_text"><p><span class="tweetprofilelink"><strong><a href="https://twitter.com/'+tweetusername+'" target="_blank">'+tweetscreenname+'</a></strong> <a href="https://twitter.com/'+tweetusername+'" target="_blank">@'+tweetusername+'</a></span><span class="tweet_time"><a href="https://twitter.com/'+tweetusername+'/status/'+tweetid+'" target="_blank">'+relative_time(feeds[i].created_at)+'</a></span>'+status+'</p>';
						
						if ((isaretweet == true) && (showretweetindicator == true)) {
							feedHTML += '<div id="retweet-indicator"></div>';
						}						
						if (showtweetactions == true) {
							feedHTML += '<div id="twitter-actions"><div class="intent" id="intent-reply"><a href="https://twitter.com/intent/tweet?in_reply_to='+tweetid+'" title="Reply"></a></div><div class="intent" id="intent-retweet"><a href="https://twitter.com/intent/retweet?tweet_id='+tweetid+'" title="Retweet"></a></div><div class="intent" id="intent-fave"><a href="https://twitter.com/intent/favorite?tweet_id='+tweetid+'" title="Favourite"></a></div></div>';
						}
						
						feedHTML += '</div>';
						feedHTML += '</div>';
						displayCounter++;
					}   
				 }
            }
             
            $('.twitter .embed').html(feedHTML);
			
			//Add twitter action animation and rollovers
			if (showtweetactions == true) {				
				$('.twitter-article').hover(function(){
					$(this).find('#twitter-actions').css({'display':'block', 'opacity':0, 'margin-top':-20});
					$(this).find('#twitter-actions').animate({'opacity':1, 'margin-top':0},200);
				}, function() {
					$(this).find('#twitter-actions').animate({'opacity':0, 'margin-top':-20},120, function(){
						$(this).css('display', 'none');
					});
				});			
			
				//Add new window for action clicks
			
				$('#twitter-actions a').click(function(){
					var url = $(this).attr('href');
				  window.open(url, 'tweet action window', 'width=580,height=500');
				  return false;
				});
			}
			
			
    }).error(function(jqXHR, textStatus, errorThrown) {
		if (errorThrown == "Not Found") {
			errorThrown = "not found: tweets php script";	
		}
       alert(textStatus + " - " + errorThrown);
    });
    

    //Function modified from Stack Overflow
    function addlinks(data) {
        //Add link to all http:// links within tweets
         data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="'+url+'" >'+url+'</a>';
        });
             
        //Add link to @usernames used within tweets
        data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
        });
		//Add link to #hastags used within tweets
        data = data.replace(/\B#([_a-z0-9]+)/ig, function(reply) {
            return '<a href="https://twitter.com/search?q='+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
        });
        return data;
    }
     
     
    function relative_time(time_value) {
      var values = time_value.split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	  var shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);
      delta = delta + (relative_to.getTimezoneOffset() * 60);
     
      if (delta < 60) {
        return '1 minute ago';
      } else if(delta < 120) {
        return '1 minute ago';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + ' minutes ago';
      } else if(delta < (120*60)) {
        return '1 hour ago';
      } else if(delta < (24*60*60)) {
        return (parseInt(delta / 3600)).toString() + ' hours ago';
      } else if(delta < (48*60*60)) {
        //return '1 day';
		return shortdate;
      } else {
        return shortdate;
      }
    }

});