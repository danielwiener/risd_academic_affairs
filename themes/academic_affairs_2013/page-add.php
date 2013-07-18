<?php
/*
Template Name: add
*/

get_header(); ?>

<div id="main">
<div id="submit">
	<div id="message">
		<?php
		//combine the url link and the description to form the post body
		$content = $_POST['description'].'<br /><p>.'.$_POST['url'].'</p>';

		$newPost = array(); // Create post object
		$newPost['post_title'] = $_POST['title'];
		$newPost['post_content'] = $_POST['content'];
		$newPost['post_status'] = 'pending';
		$newPost['post_type'] = 'submission	';
		$newPost['post_author'] = $user_ID;
		$newPost['post_category'] = array(4,$_POST['categories']);		
					
		// create array for the custom fields
		$metaArray = array(
			"artist" =>  $current_user->user_firstname . " " . $current_user->user_lastname,
			"department" =>  $_POST['department'],
			"link" =>  $_POST['link'],
			"description" =>  $_POST['description']
		);

		$finalTags = $_POST['tags'];
		$newPost['tags_input'] = $finalTags ;  // NEEDS TO BE COMMA SEPARATED STRING

		$newPostID = wp_insert_post( $newPost ); // CREATE A NEW WORDPRESS POST

		if ($newPostID > 0){
			$newContent = $_POST['content'];
			$newContent .= '<br />';
			
			//INSERT IMAGES INTO THE POST
			if ($_FILES) {
			  foreach ($_FILES as $file => $array) {
			    $newupload = insert_attachment($file,$newPostID);
			    // $newupload returns the attachment id of the file that was just uploaded. Do whatever you want with that now.
			
				//INSERT THE ATTACHEMENT INTO THE POST CONTENT
				$newContent .= '<a href="'. wp_get_attachment_url($newupload) .'">';
				$newContent .= wp_get_attachment_image($newupload, $size='medium', $icon = false);
				$newContent .= '</a><br /><br />';
				
			  }
			}
			
			// Update post content to include images
			$my_post = array();
			$my_post['ID'] = $newPostID;
			$my_post['post_content'] = $newContent;
			
			// Update the post into the database
			$newPostID = wp_update_post( $my_post );
			

			//send an email to the administrator(s)
			$message = "";
			$message .= "Title: " . $_POST['title'] . "\n\n";
			$message .= "Author: " . $current_user->display_name . "\n\n";
			$message .= 'Link: ' . get_bloginfo('url'). '/?post_type=submission&p='.$newPostID.'&preview=true';
			
			$subject = "[" . get_bloginfo('name') . "] A new submission is awaiting your approval";
			
			// $recipient = get_bloginfo('admin_email');
			$recipient = 'jconnell@risd.edu';
			
			wp_mail($recipient, $subject, $message);
			
			if ($newPostID > 0){
				print '<p>Your post has been uploaded, and now awaits approval from the site moderator.</p>';
			} else {
				print '<p>Your post has been uploaded, but there was an error processing all the images. Please try  <a href="'. get_bloginfo('url') .'/submit">submitting again</a>, or <a href="mailto:jconnell@risd.edu">contact the site administrator.</a></p>';
			}
		} else {
				print '<p>There was an error submitting the post. Please try  <a href="'. get_bloginfo('url') .'/submit">submitting again</a>, or <a href="mailto:jconnell@risd.edu">contact the site administrator.</a></p>';

		}

		?>

		<?php //FUNCTION TO DEAL WITH UPLOADED IMAGES
		function insert_attachment($file_handler,$post_id,$setthumb='true') {

		  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

		  $attach_id = media_handle_upload( $file_handler, $post_id );

		  if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
		  return $attach_id;
		}
		?>
	</div>
</div>
</div>

<?php get_footer(); ?>
