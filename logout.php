<?php
session_start();
session_destroy(); // Remove all session.
header('Location: login');

?>