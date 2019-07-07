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