<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $query = 'INSERT INTO contentblogs (
        title,
        content
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Contentblog has been added' );
    
  }
  
  header( 'Location: contentblogs.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Contentblog</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <input type="submit" value="Add Contentblog">
  
</form>

<p><a href="contentblogs.php"><i class="fas fa-arrow-circle-left"></i> Return to Contentblog List</a></p>


<?php

include( 'includes/footer.php' );

?>