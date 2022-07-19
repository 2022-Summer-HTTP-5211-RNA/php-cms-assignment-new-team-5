<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/function.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM workexperience
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Work experience record has been deleted' );
  
  header( 'Location: workexperience.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM workexperience
  ORDER BY StartDate DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Work Experience</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Company Name</th>
    <th align="center">Position</th>
    <th align="center">Responsibility</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left"><?php echo $record['CompanyName'] ; ?></td>
      <td align="left"><?php echo $record['Position'] ; ?></td>
      <td align="left"><?php echo $record['Responsibility'] ; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['StartDate'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['EndDate'] ); ?></td>
      <td align="center"><a href="workexperience_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="workexperience.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this record?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="workexperience_add.php"><i class="fas fa-plus-square"></i> Add Work Experience Record</a></p>


<?php

include( 'includes/footer.php' );

?>