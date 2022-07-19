<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: projects.php' );
  die();
  
}

if( isset( $_POST['Title'] ) )
{
  
  if( $_POST['Title'] and $_POST['content'] )
  {
    
    $query = 'UPDATE Projects SET
      Title = "'.mysqli_real_escape_string( $connect, $_POST['Title'] ).'",
      content = "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
      Date = "'.mysqli_real_escape_string( $connect, $_POST['Date'] ).'",
      Type = "'.mysqli_real_escape_string( $connect, $_POST['Type'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been updated' );
    
  }

  header( 'Location: projects.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM Projects
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: projects.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="Title" id="title" value="<?php echo htmlentities( $record['Title'] ); ?>">
    
  <br>
  
  <label for="content">Content:</label>
  <textarea type="text" name="Content" id="content" rows="5"><?php echo htmlentities( $record['content'] ); ?></textarea>
  
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
  
  <label for="date">Date:</label>
  <input type="date" name="Date" id="date" value="<?php echo htmlentities( $record['Date'] ); ?>">
    
  <br>
  
  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Website', 'Graphic Design' );
  
  echo '<select name="Type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['type'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Edit Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>