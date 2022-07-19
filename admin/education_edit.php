<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['InstituteName'] ) )
{
  
  if( $_POST['InstituteName'] )
  {
    
    $query = 'UPDATE education SET
      InstituteName = "'.mysqli_real_escape_string( $connect, $_POST['InstituteName'] ).'",
      Program = "'.mysqli_real_escape_string( $connect, $_POST['Program'] ).'",
      StartDate = "'.mysqli_real_escape_string( $connect, $_POST['StartDate'] ).'",
      EndDate = "'.mysqli_real_escape_string( $connect, $_POST['EndDate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education Record has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="Name">Institute Name:</label>
  <input type="text" name="InstituteName" id="InstituteName" value="<?php echo htmlentities( $record['InstituteName'] ); ?>">
    
  <br>
  
  <label for="Program">Program:</label>
  <input type="text" name="Program" id="Program" value="<?php echo htmlentities( $record['Program'] ); ?>">
    
  <br>
  
  <label for="Startdate">Start Date:</label>
  <input type="date" name="StartDate" id="StartDate" value="<?php echo htmlentities( $record['StartDate'] ); ?>">
  
  <br>
  
  <label for="EndDate">End Date:</label>
  <input type="date" name="EndDate" id="EndDate" value="<?php echo htmlentities( $record['EndDate'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>
