<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM contentblogs
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Contentblog has been deleted' );
  
  header( 'Location: contentblogs.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM contentblogs
  ORDER BY title DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Contentblogs</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=contentblog&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['content']; ?></small>
      </td>
      <td align="center"><a href="contentblogs_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="contentblogs_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="contentblogs.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this contentblog?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="contentblogs_add.php"><i class="fas fa-plus-square"></i> Add Contentblog</a></p>


<?php

include( 'includes/footer.php' );

?>