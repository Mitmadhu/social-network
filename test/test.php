<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cropper.js</title>
  		<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" type="text/css" href="../css/croppie.css">


  <script src="../javascript/cropper.js"></script>
</head>

<body><div id="upload-container">
	<form name="form1" enctype="multipart/form-data" method="post" action="upload.php" />
	 <div class="form-group" id="postPicHere">
	    <label for="upload_image">Select image</label>
	    <input type="file" class="form-control-file" name="upload_image" size="32" id="upload_image" required="true">
	 </div>
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Write a caption...</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="200" name="description" rows="3" required="true"></textarea>
	  </div>
	  
	   <div class="form-group row">
	    <div class="col-sm-10">
	      <button type="submit" name="share" class="btn btn-primary">Share</button>
	    </div>
	  </div>
	</form>
</div>
<!-- =================== crop modal ====================== -->
<div id="uploadimageModal" class="modal" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal">&times;</button>
  		</div>
  		<div class="modal-body">
    		<div class="row">
					<div class="col-md-8 text-center">
					  <div id="image_demo"></div>
					</div>
			</div>
			 <button class="btn btn-success crop_image">Crop & Upload Image</button>
  		</div>
  		<div class="modal-footer">
    		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){

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
	      quality: 0.5  // quality 1 to 0 decrease krega
	    }).then(function(response){
	      $.ajax({
	        url:"../uploadPostPic.php",
	        type: "POST",
	        data:{"image": response},
	        success:function(data)
	        {
	          $('#uploadimageModal').modal('hide');
	          $("#postPicHere").html(data);
	        }
	      });
	    })
	  });

	});

	
</script> 
</body>
</html>
