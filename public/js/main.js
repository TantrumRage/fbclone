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