$(document).ready(function() {
	/***
	 Show profile section
	 Call after Jquery is loaded
	***/

	$("#profile-container").ready(function() {
		showProfileSection();
	});

	// Show edit profile button
	$(".profile-info").mouseenter(function() {
		$("#edit-" + this.id).show();
	});

	// Hide edit profile button	
	$(".profile-info").mouseleave(function() {
		$("#edit-" + this.id).hide();
	});

	// Show edit profile section
	$(".edit-profile-section-btn").click(function() {
		$("#" + this.id + "-section").show("slow");
	});

	// Hide edit profile section
	$(".hide-edit-profile-section").click(function() {
		var editSection = this.id;
		editSection = editSection.slice(editSection.indexOf('-')+1, editSection.length);
		$("#" + editSection).hide("slow");
	});

	// Save changes on edit profile
	$(".save-edit-profile").click(function() {
		
		var	category = $(this).data("category");

		// Get parent of input elements to get all data from input elements
		var parent = $($(this).parent()).parent().attr("id");
		var dataInput = $("#" + parent).find('input');
		var arrData = [];
		
		// Get array of changes made
		for (var i = 0; i <= dataInput.length - 1; i++) {
			var store = $(dataInput[i]).data("store");
			arrData.push({'body': dataInput[i].value,'store': store});
		}

		// Send changes to server

		axios.post('/profile/about/update', {
		    data: arrData,
		  })
		  .then(function (response) {
		    //$("#" + category + "-data").html($("#input-"+category).val());
		    $("#edit-" + category + "-section").hide("slow");
		  })
		  .catch(function (error) {
		    console.log(error);
		  });
	});

	// Like post
	$(".like-post").click(function() {
		var likeBtn = this;
		axios.post('/post/like/' + $(this).data('postkey'), {
		  })
		  .then(function (response) {
		  	$(likeBtn).hide();
		  	$(likeBtn).siblings(".unlike-post").show();
		  	// Select like counter
		  	var likeCounter = $(likeBtn).closest(".post-buttons-container").siblings(".like-counter-container").find(".like-counter");
		    //$(likeBtn).removeClass("like-post").addClass("unlike-post");

		    // Add 1 to like counter
		    likeCounter.html(parseInt(likeCounter.html()) + 1);
		    
		  })
		  .catch(function (error) {
		    console.log(error);
		  });
	});

	// Unlike post
	$(".unlike-post").click(function() {
		var unlikeBtn = this;
		axios.post('/post/unlike/' + $(this).data('postkey'), {
		  })
		  .then(function (response) {
		  	$(unlikeBtn).hide();
		  	$(unlikeBtn).siblings(".like-post").show();
		  	
		  	// Select like counter
		  	var likeCounter = $(unlikeBtn).closest(".post-buttons-container").siblings(".like-counter-container").find(".like-counter");
		    
		    // Subtract 1 to like counter
		    likeCounter.html(parseInt(likeCounter.html()) - 1);
		    //$(unlikeBtn).removeClass("unlike-post").addClass("like-post");
		  })
		  .catch(function (error) {
		    console.log(error);
		  });
	});

	// Call when Comment button is clicked
	$(".comment-btn").click(function() {
		$(this).closest(".post-buttons-container").siblings(".card-footer").find(".comment-box").focus();
	});

	// Call when "enter key" is pressed on comment box
	$(".comment-box").on("keypress", function(e) {
		if (e.keyCode == 13) {
            var key = $(this).data("postkey");
            var commentBody = $(this).val();

            axios.post('/post/comment', {
			    postKey: key,
			    body: commentBody,
			  })
			  .then(function (response) {
			    console.log(response);
			  })
			  .catch(function (error) {
			    console.log(error);
			  });
        }
	});

	// Preview the image that the user wants to post
	$("#hidden-post-img-btn").change(function() {
		var container = "#post-img";
	  	readURL(this, container);
	});

	// Trigger(click) the input(file) on post section
	$("#post-img-btn").click(function() {
		$("#post-img-container").show();
		$("#hidden-post-img-btn").click();
	});

	// Call when hovered on profile picture
	$("#profile-picture").mouseenter(function() {
		$("#change-profile-picture-container").css("z-index", 3);

		$("#change-profile-picture-wrapper").mouseleave(function() {
			$("#change-profile-picture-container").css("z-index", -1);
		});
	});

	// Trigger(click) the file input html element
	$("#change-profile-picture-wrapper").click(function() {
		$("#hidden-profile-picture").click();
	});

	// Call when the user successfully selected the file that he/she wants to upload.
	$("#hidden-profile-picture").change(function() {
		var data = new FormData();
		var container = "#profile-picture";
		var targetImage = this;

		data.append('image', document.getElementById("hidden-profile-picture").files[0]);

		if(data !== "") {
			axios.post('/profile/profilepicture/update', data)
			  .then(function (response) {
			  	console.log(response.data);

			    readURL(targetImage, container);
			  })
			  .catch(function (error) {
			    console.log(error.response.data.message);
			  });	
		}
		
	});

	// Show messages overlay
	$(".messages-btn").click(function() {
		if($("#messages-overlay").length){
			$("#messages-overlay-container").show("slow");
			$("body").addClass('no-scroll');
		}else{
			$("#messages-overlay-container").load("templates/messages/load", function() {
				$("body").addClass('no-scroll');
				$("#messages-overlay-container").show("slow");
			});
		}
	});

	// Hide messages overlay
	$(document).on('click', '#hide-messages-overlay', function() {
		$("body").removeClass('no-scroll');
		$("#messages-overlay-container").hide("slow");
	});

	// Load messages for selected contact on messenger
	$(document).on('click', '.contacts-container', function() {
		var contactBtn = this;
		$('.contacts-container').css('background-color','#1e2124');

		$('#messenger-right-spinner').attr('style', 'display: flex !important;');
		
		$('#messenger-right-wrapper').load('templates/messages/selected/load/' + $(contactBtn).data('user'), function() {
			$('#messenger-right-spinner').attr('style', 'display: none !important;');
			$('#messenger-right').attr("style", "display: block !important;");
			$(contactBtn).css('background-color','#36393e');
		});
		

	});

	// Send friend request
	$(document).on('click', '#add-friend', function() {
		$(this).addClass("disabled");
		$(this).prepend(
			'<i class="fas fa-spinner fa-spin text-light mr-2"></i>'
		);
		var user = $(this).data('user');
		axios.post('/'+ user +'/add', {
		    username: user
		  })
		  .then(function (response) {
		    if(response.data === 1){
		    	$("#main-profile-option-container").html(
                        '<span id="cancel-request" class="btn mr-2 profile-options" data-user="'+user+'">' +
                            'Cancel Request'
		    		);
		    }else {
		    	alert("Something went wrong. Please try again later.");
		    }
		  })
		  .catch(function (error) {
		    console.log(error.response.data.message);
		  });
	});

	// Accept friend request
	$(document).on('click', '.accept-request', function() {	
		$("#accept-decline-dropdown").addClass("disabled");
		$("#accept-decline-dropdown").prepend(
			'<i class="fas fa-spinner fa-spin text-light mr-2"></i>'
		);

		var user = $(this).data('user');

		axios.post('/'+ user +'/accept', {
		    username: user
		  })
		  .then(function (response) {
		  	
		    if(response.data === 1){
		    	$("#main-profile-option-container").html(
                        '<div class="dropdown d-inline-block">'
                            +'<button class="btn dropdown-toggle mr-2 profile-options" type="button" id="friend-option" data-toggle="dropdown" data-user="{{$user->profile->nickname}}" aria-haspopup="true" aria-expanded="false" style="background: #000000bf;">'
                                +'Friends'
                            +'</button>'
                            +'<div class="dropdown-menu p-0 border-0" aria-labelledby="friend-option" style="background: none;">'
                                +'<span id="unfriend-btn" class="btn mr-2 mb-1 profile-options w-100" data-user="'+user+'">'
                                    +'Unfriend'
                            +'</span>'

                            +'</div>'
                        +'</div>' 
		    	);
		    }else {
		    	alert("Something went wrong. Please try again later.");
		    }
		  })
		  .catch(function (error) {
		    console.log(error.response.data.message);
		  });
	});

	// Cancel friend request
	$(document).on('click', '#cancel-request', function() {
		$(this).addClass("disabled");
		$(this).prepend(
			'<i class="fas fa-spinner fa-spin text-light mr-2"></i>'
		);
		var user = $(this).data('user');

		axios.post('/'+ user +'/cancel', {
		    username: user
		  })
		  .then(function (response) {
		    if(response.data === 1){
		    	$("#main-profile-option-container").html(
                        '<span id="add-friend" class="btn mr-2 profile-options" data-user="'+user+'">' +
                            '<i class="fas fa-user-plus"></i> Add Friend'
		    		);
		    }else {
		    	alert("Something went wrong. Please try again later.");
		    }
		  })
		  .catch(function (error) {
		    console.log(error.response.data.message);
		  });
	});

	// Decline friend request
	$(document).on('click', '.decline-request', function() {
		$("#accept-decline-dropdown").addClass("disabled");
		$("#accept-decline-dropdown").prepend(
			'<i class="fas fa-spinner fa-spin text-light mr-2"></i>'
		);

		var user = $(this).data('user');

		axios.post('/'+ user +'/decline', {
		    username: user
		  })
		  .then(function (response) {
		    if(response.data === 1){
		    	$("#main-profile-option-container").html(
                        '<span id="add-friend" class="btn mr-2 profile-options" data-user="'+user+'">' +
                            '<i class="fas fa-user-plus"></i> Add Friend'
		    		);
		    }else {
		    	alert("Something went wrong. Please try again later.");
		    }
		  })
		  .catch(function (error) {
		    console.log(error.response.data.message);
		  });
	});

	// Unfriend
	$(document).on('click', '#unfriend-btn', function() {
		$("#friend-option").addClass("disabled");
		$("#friend-option").prepend(
			'<i class="fas fa-spinner fa-spin text-light mr-2"></i>'
		);

		var user = $(this).data('user');

		axios.post('/'+ user +'/unfriend', {
		    username: user
		  })
		  .then(function (response) {
		    if(response.data === 1){
		    	$("#main-profile-option-container").html(
                        '<span id="add-friend" class="btn mr-2 profile-options" data-user="'+user+'">' +
                            '<i class="fas fa-user-plus"></i> Add Friend'
		    		);
		    }else {
		    	alert("Something went wrong. Please try again later.");
		    }
		  })
		  .catch(function (error) {
		    console.log(error.response.data.message);
		  });
	});

});


/***
 Get the url of the selected image

 @params
 	input --> HTML input element container the selected profile picture.
 	container --> ID of the html element(img) to put the url of the image.
**/
function readURL(input, container) {
	console.log();
  if (input.files && input.files[0]) {
  	if (input.files[0].type == "image/jpeg" || input.files[0].type == "image/png") {
  		var reader = new FileReader();
    
	    reader.onload = function(e) {
	      $(container).attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]);
  	}
  	else {
  		alert("Invalid file type. Must be an image.");
  	}
  }
}


function submitPost() {
	$("#post-submit-loader").attr('style', 'display: inline-block !important');
	var postBody = $("#post-body").val();
	var data = new FormData();

	//console.log(document.getElementById("hidden-post-img-btn").files[0]);
	//console.log($("#post-img"));
	data.append('body', postBody);
	data.append('postImage', document.getElementById("hidden-post-img-btn").files[0]);
	//console.log(data);
	if (data != "") {
		axios.post('/post/save', data)
			  .then(function (response) {
			    $("#post-submit-loader").attr('style', 'display: none !important');
			    console.log(response.data);
			  })
			  .catch(function (error) {
			    console.log(error.response.data.message);
			  });
	}
	
}

function showEditPost(postId) {
	axios.post('/post/edit', {
	    id: postId
	  })
	  .then(function (response) {
	  	console.log(response.data);
	    $("#container").append('<div id="edit-post-overlay" class="justify-content-center"><div id="edit-post-container" class="card bg-dark-gray border-light-gray p-0 col-10 col-sm-8 col-md-6"><div class="card-header border-light-gray"><strong>Edit post</strong><span class="float-right btn post-options" onclick="hideEditPost()"><i class="fas fa-times-circle"></i></span></div><div class="card-body"><textarea id="edit-post-body" class="bg-dark-gray text-white w-100 p-2">' + response.data.body + '</textarea></div><div class="card-footer text-right"><button class="btn btn-info" onclick="updatePost(' + response.data.id + ')">Save</button></div></div></div>');
	  	$("#edit-post-overlay").show('slow');
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
}

function updatePost(postId) {
	axios.post('/post/update', {
	    id: postId,
	    body: $("#edit-post-body").val()
	  })
	  .then(function (response) {
	    $("#edit-post-overlay").remove();
	  })
	  .catch(function (error) {
	    alert('Edit post failed! Please try again later.');
	  });
}

function hideEditPost(){
	$("#edit-post-overlay").remove();
}

function deletePost(postId) {
	axios.post('/post/delete', {
	    id: postId,
	  })
	  .then(function (response) {
	  	alert("Post deleted successfully");
	  })
	  .catch(function (error) {
	    alert('Delete post failed! Please try again later.');
	  });
}

// Show profile "timeline" without reloading the page
function getProfileTimeline(user) {
	window.history.replaceState({page: "profile"}, "Timeline", "/" + user);
	$(".profile-sections").hide();
	$("#timeline").css('display', 'flex');
}

// Show profile "about" without reloading the page
function getProfileAbout(user) {
	window.history.replaceState({page: "profile"}, "About", "/" + user + "/about");
	$(".profile-sections").hide();
	$("#about").css('display', 'flex');
}

function getProfilePhotos(user) {
	window.history.replaceState({page: "profile"}, "Photos", "/" + user + "/photos");
	$(".profile-sections").hide();
	$("#photos").css('display', 'flex');
}
