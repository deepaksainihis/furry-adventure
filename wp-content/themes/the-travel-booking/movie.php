<?php
/*
Template Name: Movie
*/
?>
<?php get_header();?>

	<div class="container">
		<div class="col-md-12">
			<h3>Add New Post</h3>
			<form class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="ispost" value="1" />
				<input type="hidden" name="userid" value="" />
				<div class="col-md-12">
					<label class="control-label">Movie Name</label>
					<input type="text" class="form-controls" name="title" />
				</div>
				<div class="col-md-12">
					<label class="control-label">Release Date</label>   
					<input type="date" class="form-controls" name="release" />
				</div>
				<div class="col-md-12">
					<label class="control-label" name="review">Select a rating</label>
							<select name="review" id="review"><option value="5">Excellent</option>
							<option value="4">Very Good</option>
							<option value="3">Average</option>
							<option value="2">Poor</option>
							<option value="1">Terrible</option></select>
				</div>
				<div class="col-md-12">
					<label class="control-label">Cast Name</label>
					<input type="text" name="cast_name" class="form-controls" />                                                                                                                                                                                                                                                                                                                
				</div>
				<div class="col-md-12">
					<input type="submit" class="btn btn-primary" value="SUBMIT" name="submitpost" />
				</div>
			</form>
		</div>
	</div>

<?php get_footer();?>