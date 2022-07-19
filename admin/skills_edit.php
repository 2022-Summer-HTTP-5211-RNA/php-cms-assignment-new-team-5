<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if( !isset( $_GET['id'] ) )
{
  
  header('Location: skills.php');
  die();
  
}

if( isset( $_POST['Name'] ) )
{
  
  if($_POST['Name'] and $_POST['score'] )
  {
    
    $query = 'UPDATE skills SET
      Name = "'.mysqli_real_escape_string( $connect, $_POST['Name'] ).'",
      score = "'.mysqli_real_escape_string( $connect, $_POST['score'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Skills has been updated' );
    
  }

  header( 'Location: skills.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM skills
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: skills.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Skills</h2>

<form method="post">
   <label for="Name">Name:</label>
   <input type="text" name="Name" id="name" value="<?php echo htmlentities( $record['Name'] ); ?>">
    
   <br>
  
   <label for="score">Score:</label>
   <input type="text" name="score" id="score" value="<?php echo htmlentities( $record['score'] ); ?>"> 
   <br>
  
  <input type="submit" value="Edit Skills">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>