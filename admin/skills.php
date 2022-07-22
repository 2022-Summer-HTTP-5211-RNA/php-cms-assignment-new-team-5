<?php

  include('includes/database.php' );
  include('includes/config.php' );
  include( 'includes/functions.php' );

  secure();

  if(isset($_GET['delete']))
  {
    
    $query = 'DELETE FROM skills
      WHERE id = '.$_GET['delete'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
      
    set_message( 'skills has been deleted' );
    
    header( 'Location: skills.php' );
    die();
    
  }

  include('includes/header.php');

  $query = 'SELECT *
    FROM skills';
  $result = mysqli_query( $connect, $query );
?>

<h2>Manage Skills</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Score</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while($record = mysqli_fetch_assoc($result)): ?>
    <tr>
    <td align="center">
        <img src="image.php?type=skill&id=<?php echo $record['id']; ?>&width=80&height=80&format=inside">
      </td>
    
      <td align="center">
        <?php echo $record['id']; ?>
      </td>
      <td align="left"><?php echo $record['Name']; ?></td>
      <td align="center"><?php echo $record['score']; ?></td>
      <td align="center"><a href="skills_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center">
        <a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
      </td>
      <td align="center">
        <a href="skills.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="skills_add.php"><i class="fas fa-plus-square"></i> Add Skills</a></p>


<?php

include('includes/footer.php');

?>