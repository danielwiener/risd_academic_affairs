<?php
/*
Template Name: submit
*/

get_header();
?>
<div id="main">
	<div id="submit">
		<h1>
			Announcement and Update Submission Form
		</h1><!-- form start -->
		<form method="post" action="<?php bloginfo('url'); ?>/add" enctype="multipart/form-data">
			<div class="break"></div>
			<h2>
				Division
			</h2>
			<h3>
				Select a category:
			</h3>

			<div id="radios">
				<ul>
					<?php $args = array(
						'type'                     => 'post',
						'child_of'                 => 4,
						'parent'                   => '',
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'exclude'                  => '',
						'include'                  => '',
						'number'                   => '',
						'taxonomy'                 => 'category',
						'pad_counts'               => false );

						$categories =  get_categories($args);

						foreach ($categories as $category) {
						  	$option = '<li><input value="'.$category->cat_ID.'" type="radio" name="categories">';
							$option .= $category->cat_name;
							$option .= '</li>';
							echo $option;
						}

					?>
				</ul>
			</div>
			<div class="break"></div>
			
			<!-- content  -->
			<h2>
				Post Title
			</h2><input type="text" title="Post Title" name="title" id="content-title-tf" size="30" value="">
			<h2>
				Description
			</h2>
			<h3>
				A brief description containing no more than 2000 characters
			</h3>
			<textarea title="Post Text" rows="10" cols="40" name="content" id="content-text-ta"></textarea>
			<div class="break"></div>
			
			<!-- tags  -->
			<h2>
				Tags
			</h2>
			<h3>
				separate multiple tags with commas: cats, pet food, dogs):
			</h3><input type="text" id="tags" name="tags" size="60" value="">
			<div class="break"></div>
			
			<!-- Images  -->
			<h2>Upload Images</h2> 
			<input type='hidden' name='MAX_FILE_SIZE' value='6048576'>
				<p>
					<small>Max File Size: 5 MB<br>
					Allowable File Types: .jpg .gif .png<br></small>
				</p>
				
				<div id="image_labels">
				<?php for ($i = 0; $i<4; $i++){?>
				<label for='uploadfile<?php echo $i ?>'>
				<div class="fakeupload">
					<input type="text" name="fakeupload<?php echo $i ?>" /> <!-- browse button is here as background -->
				</div>
				<input type="file" 
						class='realupload' 
						name='uploadfile<?php echo $i ?>' 
						id='uploadfile<?php echo $i ?>' 
						size='30' 
						onChange="this.form.fakeupload<?php echo $i ?>.value = this.value; validateFile('uploadfile<?php echo $i ?>',true);" 
				/>
				</label>
				<?php } ?>
				</div>
				
			<div class="break"></div>

			<!-- form buttons start -->
			<!--<input type="submit" value="Preview" name="tdomf_form1_preview" id="tdomf_form1_preview"/><br />-->
<!-- 				<input type="submit" value="Send" name="send" id="tdomf_form1_send" onclick="$("#uploading").stop().animate({opacity: 1}, 300);"> -->
			<input type="submit" value="Send" name="send" id="tdomf_form1_send" onClick="$('#uploading').stop().animate({opacity: 1}, 300); ">
			
			<div id="send_fine_print">
			<p>
				All Announcements and Updates are reviewed prior to posting. You will receive a conformation e-mail upon submission. If you have any questions, please <a href="mlewis@risd.edu">e-mail the Web Administrator</a> (mlewis@risd.edu).
			</p>
			</div>
			<!-- form buttons end -->
		</form><!-- form end -->
		<!-- Form 1 end -->
		
		<!-- OVERLAY TO INDICATE LAODING -->
		<!-- first overlay. id attribute matches our selector -->
		<div id="uploading">
			<h1>UPLOADING</h1>
			<p>Your post is being submitted and your files are being uploaded.</p>
			<p>Please be patient. PLEASE DO NOT NAVIGATE AWAY FROM THIS PAGE.</p>
			<p>You will receive a confirmation when the upload is complete.</p>		
			</div>
	</div>		
</div>
		
<?php get_footer(); ?>
