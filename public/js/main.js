$(document).ready(function() {
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
	  readURL(this);
	});

	// Trigger(click) the input(file) on post section
	$("#post-img-btn").click(function() {
		$("#post-img-container").show();
		$("#hidden-post-img-btn").click();
	});

});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#post-img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}


function submitPost() {
	$("#post-submit-loader").attr('style', 'display: inline-block !important');
	var postBody = $("#post-body").val();

	axios.post('/post/save', {
	    body: postBody
	  })
	  .then(function (response) {
	    $("#post-submit-loader").attr('style', 'display: none !important');
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
}

function showEditPost(postId) {
	axios.post('/post/edit', {
	    id: postId
	  })
	  .then(function (response) {
	  	console.log(response.data);
	    $("#container").append('<div id="edit-post-overlay" class="justify-content-center"><div id="edit-post-container" class="card bg-dark border-light p-0 col-10 col-sm-8 col-md-6"><div class="card-header border-light"><strong>Edit post</strong><span class="float-right btn post-options" onclick="hideEditPost()"><i class="fas fa-times-circle"></i></span></div><div class="card-body"><textarea id="edit-post-body" class="bg-dark text-white w-100 p-2">' + response.data.body + '</textarea></div><div class="card-footer text-right"><button class="btn btn-info" onclick="updatePost(' + response.data.id + ')">Save</button></div></div></div>');
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

// Show profile timeline without reloading the page
function getProfileTimeline(user) {
	window.history.replaceState({page: "timeline"}, "Timeline", "/" + user);
	$(".profile-sections").hide();
	$("#timeline").show();
}

// Show profile about without reloading the page
function getProfileAbout(user) {
	window.history.replaceState({page: "timeline"}, "Timeline", "/" + user + "/about");
	$(".profile-sections").hide();
	$("#about").show();
}
