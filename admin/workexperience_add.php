<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/function.php' );

secure();

if( isset( $_POST['CompanyName'] ) )
{
  
  if( $_POST['CompanyName'] )
  {
    
    $query = 'INSERT INTO work experience (
        CompanyName,
        Position,
        Responsibility,
        StartDate,
        EndDate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['CompanyName'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Position'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Responsibility'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['StartDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['EndDate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Workexperience has been added' );
    
  }
  
  header( 'Location: workexperience.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Work Experience record</h2>

<form method="post">
  
  <label for="title">Company Name:</label>
  <input type="text" name="CompanyName" id="CompanyName">
    
  <br>
  
  <label for="position">Position:</label>
  <input type="text" name="Position" id="Position">
  
  <br>
  
  <label for="responsibility">Responsibility:</label>
  <input type="text" name="Responsibility" id="Responsibility">

  <br>
  
  <label for="date">Start Date:</label>
  <input type="date" name="StartDate" id="StartDate">
  
  <br>
  
  <label for="date">End Date:</label>
  <input type="date" name="EndDate" id="EndDate">
  
  <br>
  
  <input type="submit" value="Add Work Experience Record">
  
</form>

<p><a href="workexperience.php"><i class="fas fa-arrow-circle-left"></i> Return to Work Experience List</a></p>


<?php

include( 'includes/footer.php' );

?>
