<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['InstituteName'] ) )
{
  
  if( $_POST['InstituteName'] )
  {
    
    $query = 'INSERT INTO education (
        InstituteName,
        Program,
        StartDate,
        EndDate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['InstituteName'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Program'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['StartDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['EndDate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education record</h2>

<form method="post">
  
  <label for="title">Institute Name:</label>
  <input type="text" name="InstituteName" id="InstituteName">
    
  <br>
  
  <label for="program">Program:</label>
  <input type="text" name="Program" id="Program">
  
  <br>
  
  <label for="date">Start Date:</label>
  <input type="date" name="StartDate" id="StartDate">
  
  <br>
  
  <label for="date">End Date:</label>
  <input type="date" name="EndDate" id="EndDate">
  
  <br>
  
  <input type="submit" value="Add Education Record">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>
