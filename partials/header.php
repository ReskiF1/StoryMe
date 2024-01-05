<?php
require 'config/database.php';

//fetch current user from database
if(isset($_SESSION['user-id'])){
  $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT avatar FROM users WHERE id=$id";
  $result = mysqli_query($connection, $query);
  $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StoryMe</title>

    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" />
    <!-- BOXICONS CDN -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- GFONT MONTSERRAT -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <a href="<?= ROOT_URL ?>" class="nav_logo">StoryMe</a>
        <ul class="nav_items">
          <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
          <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
          <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
          <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
          <?php if(isset($_SESSION['user-id'])): ?>
            <li class="nav_profile">
              <div class="avatar">
                <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" />
              </div>
              <ul>
                <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li><a href="<?= ROOT_URL ?>signin.php">Signin</a></li>
          <?php endif ?>
        </ul>

        <button id="open_nav-btn"><i class="bx bx-menu"></i></button>
        <button id="close_nav-btn"><i class="bx bx-x"></i></button>
      </div>
    </nav>