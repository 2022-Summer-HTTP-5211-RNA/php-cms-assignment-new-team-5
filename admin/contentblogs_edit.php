<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: contentblogs.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $query = 'UPDATE contentblogs SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      content = "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Contentblog has been updated' );
    
  }

  header( 'Location: contentblogs.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM contentblogs
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: contentblogs.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Contentblog</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="5"><?php echo htmlentities( $record['content'] ); ?></textarea>
  
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
  
  <input type="submit" value="Edit Contentblog">
  
</form>

<p><a href="contentblogs.php"><i class="fas fa-arrow-circle-left"></i> Return to Contentblog List</a></p>


<?php

include( 'includes/footer.php' );

?>