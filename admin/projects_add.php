<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['Title'] ) )
{
  
  if( $_POST['Title'] and $_POST['content'] )
  {
    
    $query = 'INSERT INTO Projects (
        Title,
        content,
        Type,
        Date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['Title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been added' );
    
  }
  
  header( 'Location: projects.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="Title" id="title">
    
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
  
  <label for="date">Date:</label>
  <input type="date" name="Date" id="date">
  
  <br>
  
  <label for="Type">Type:</label>
  <?php
  
  $values = array( 'Website', 'UX/UI Design' );
  
  echo '<select name="Type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Add Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>