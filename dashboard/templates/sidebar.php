 <!-- Content wrapper -->
 <div class="content-wrapper">
         <!-- begin::navigation -->
         <div class="navigation">
                 <div class="navigation-header">
                         <span>Navigation</span>
                         <a href="#">
                                 <i class="ti-close"></i>
                         </a>
                 </div>
                 <div class="navigation-menu-body">
                         <ul>
                                 <li>
                                         <a class="<?php if ($title == "Home") echo 'active' ?>" href=index.php>
                                                 <span class="nav-link-icon">
                                                         <i data-feather="pie-chart"></i>
                                                 </span>
                                                 <span>Dashboard</span>
                                         </a>
                                 </li>
                                 <li>
                                         <a class="<?php if ($title == "users") echo 'active' ?>" href="users.php">
                                                 <span class="nav-link-icon">
                                                         <i data-feather="user"></i>
                                                 </span>
                                                 <span>Users</span>
                                         </a>
                                 </li>
                                 <li>
                                         <a class="<?php if ($title == "wisatas") echo 'active' ?>" href="wisatas.php">
                                                 <span class="nav-link-icon">
                                                         <i data-feather="image"></i>
                                                 </span>
                                                 <span>Wisata</span>
                                                 <!-- <span class="badge badge-danger">5</span> -->
                                         </a>
                                 </li>
                                 <li>
                                         <a class="<?php if ($title == "comments") echo 'active' ?>" href="comments.php">
                                                 <span class="nav-link-icon">
                                                         <i data-feather="message-circle"></i>
                                                 </span>
                                                 <span>Comments</span>
                                         </a>
                                 </li>
                                 <li>
                                         <a class="<?php if ($title == "help") echo 'active' ?>" href="help.php">
                                                 <span class="nav-link-icon">
                                                         <i data-feather="mail"></i>
                                                 </span>
                                                 <span>Help</span>
                                         </a>
                                 </li>
                         </ul>
                 </div>
         </div>
         <!-- end::navigation -->