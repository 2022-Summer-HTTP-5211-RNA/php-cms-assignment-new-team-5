<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

?>

<ul id="dashboard">
  <li>
    <a href="contentblogs.php">
      Manage Content Blogs
    </a>
  </li>
  <li>
    <a href="education.php">
      Manage Education
    </a>
  </li>
  <li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>
  <li>
    <a href="skills.php">
      Manage Skills
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="workexperience.php">
      Manage Work experience
    </a>
  </li>

</ul>

<?php

include('includes/footer.php');

?>
