<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if(isset( $_POST['Name'] ))
{
  
  if( $_POST['Name'] and $_POST['score'] )
  {
    
    $query = 'INSERT INTO skills (
        Name,
        score
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['Name'] ).'", 
         "'.mysqli_real_escape_string( $connect, $_POST['score'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'skills has been added' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Skills</h2>

<form method="post">
  
  <label for="Name">Name:</label>
  <input type="text" name="Name" id="name">
    
  <br>
  
  <label for="score">Score:</label>
  <input type="text" name="score" id="score"> 
  <br>
  
  <input type="submit" value="Add Skills">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skills List</a></p>


<?php

include( 'includes/footer.php' );

?>