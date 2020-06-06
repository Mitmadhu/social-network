<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="javascript/cropper.js"></script>


<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
 -->
	
<link rel="stylesheet" type="text/css" href="css/croppie.css">
<link rel="stylesheet" type="text/css" href="css/homestyle.css">
<?php 
	define('BASE_PATH', realpath('../../'));
 ?>

<script src="javascript/app.js"></script> 

<script>
	$(document).ready(function(){
	$('textarea').val("");

	// ye code crop krne ka option provide kr rha h
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:250,
      height:250, // photo crop krne ka dimension fix kr skte h
      type:'square' //square circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

	// ye code phpto ko crop ke rha h on crop pe click krne pe
  $('#upload_image').on('change', function(){
	    var reader = new FileReader();
	    reader.onload = function (event) {
	      $image_crop.croppie('bind', {
	        url: event.target.result
	      }).then(function(){
	        console.log('jQuery bind complete');
	      });
	    }
	    reader.readAsDataURL(this.files[0]);
	    $('#uploadimageModal').modal('show');
	  });
  // ye code uploadpost.php pe ja ke photo save kr rha h ajax se
	  $('.crop_image').click(function(event){
	    $image_crop.croppie('result', {
	      type: 'canvas',
	      size: 'original',
	      format : 'jpeg',  // yha size fromate quality change kr skte h photo ka
	      quality: 0.8  // quality 1 to 0 decrease krega
	    }).then(function(response){
	      $.ajax({
	        url:"uploadPostPic.php",
	        type: "POST",
	        data:{"image": response},
	        success:function(data)
	        {
	          $('#uploadimageModal').modal('hide');
	          var img = "<img src=" + data + ">";
	          $("#postPicHere").html(img);
	        }
	      });
	    })
	  });
	});	
</script> 