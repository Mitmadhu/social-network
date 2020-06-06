function deletePost(postid){
	swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover this imaginary file!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    
	    window.open('functions/deletepost.php?postid='+postid, '_self');
	  } else {
	    swal("Your imaginary file is safe!");
	  }
	});
}
/*
	dynamic bnane ke liye hi na js use hota h haa

	bnao usko thk h
	hha kro
*/

function postComment(btn, postId){
	/*
		make ajax call
	*/
	/*
		.done is a function which runs when ajax call is completed

		return from ajax will be store in data variable 
	*/
	var button = $(btn);

	var comment = button.siblings('textarea').val();
	button.siblings('textarea').val("");


	/*
	 siblings function selects siblings

	*/
	$.post("ajax/makeComment.php", {sendViaPostMethod :comment, postId :postId}).done(function(data){
		$(button).parent('.post-comment').siblings('.load-comments').prepend(data);

	});
	/*$.post("ajax/test.php" ,{sendComment : comment ,postid:postId}).done(function(data){
		alert(data);//achha
	});*/
}


function getNewPeople(btn){
	var button = $(btn);
	var myData = button.siblings('input').val();

	if (myData.length > 1) {
		$.post("ajax/findnewpeople.php" , {sendNameViaPost : myData}).done(function(data){
			$('#searchResult').html(data); 
		});	
	}	

}

function liveSearch(btn){
   var button = $(btn);
   var myData = button.val();		

   if (myData.length > 1) {
   	$.post("ajax/findnewpeople.php" , {sendNameViaPost : myData}).done(function(data){
   		$('#searchResult').html(data); 
   	});	
   }	
}

