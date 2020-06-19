<?php

  $password = $_GET['pwd'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  echo $hash;
  echo "<br / />";
  echo password_verify('test', '$2y$10$P3gIOFkD8ZHkb531GlTNAeNHur4l/1C5yKPYnVPeLE160xXrEcXyq');
