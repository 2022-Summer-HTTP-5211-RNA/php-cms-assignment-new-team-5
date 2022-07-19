<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/function.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: workexperience.php' );
  die();
  
}

if( isset( $_POST['CompanyName'] ) )
{
  
  if( $_POST['CompanyName'] )
  {
    
    $query = 'UPDATE work experience SET
      CompanyName = "'.mysqli_real_escape_string( $connect, $_POST['CompanyName'] ).'",
      Position = "'.mysqli_real_escape_string( $connect, $_POST['Position'] ).'",
      Responsibility = "'.mysqli_real_escape_string( $connect, $_POST['Responsibility'] ).'",
      StartDate = "'.mysqli_real_escape_string( $connect, $_POST['StartDate'] ).'",
      EndDate = "'.mysqli_real_escape_string( $connect, $_POST['EndDate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Work Experience Record has been updated' );
    
  }

  header( 'Location: workexperience.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM workexperience
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: workexperience.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Work Experience</h2>

<form method="post">
  
  <label for="Name">Company Name:</label>
  <input type="text" name="CompanyName" id="CompanyName" value="<?php echo htmlentities( $record['CompanyName'] ); ?>">
    
  <br>
  
  <label for="Position">Position:</label>
  <input type="text" name="Position" id="Position" value="<?php echo htmlentities( $record['Position'] ); ?>">

  <br>
  
  <label for="Responsibility">Responsibility:</label>
  <input type="text" name="Responsibility" id="Responsibility" value="<?php echo htmlentities( $record['Responsibility'] ); ?>">
    
  <br>
  
  <label for="Startdate">Start Date:</label>
  <input type="date" name="StartDate" id="StartDate" value="<?php echo htmlentities( $record['StartDate'] ); ?>">
  
  <br>
  
  <label for="EndDate">End Date:</label>
  <input type="date" name="EndDate" id="EndDate" value="<?php echo htmlentities( $record['EndDate'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Work Experience">
  
</form>

<p><a href="workexperience.php"><i class="fas fa-arrow-circle-left"></i> Return to Work Experience List</a></p>


<?php

include( 'includes/footer.php' );

?>
