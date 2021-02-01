<section class="menu cid-r6VkWYIybb" once="menu" id="menu1-0">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="navbar-brand"><span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5"
                                                                       href="index.php"><?php echo $logourl; ?></a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger"><span></span> <span></span> <span></span> <span></span></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item active">
                    <a class="nav-link link text-black display-4 active" href="<?php echo $homepage; ?>"> Home </a></li>
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="<?php echo $about; ?>"> Features </a></li>
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="<?php echo $contact; ?>"> Contact </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link link text-black dropdown-toggle display-4"
                       data-toggle="dropdown-submenu">
                        Login
                    </a>
                    <div class="dropdown-menu">
                        <a class="text-black dropdown-item display-4"
                           href="<?php echo $user_login; ?>">User</a>
                        <a class="text-black dropdown-item display-4"
                           href="<?php echo $staff_login; ?>">Staff</a>
                        <a class="text-black dropdown-item display-4" href="<?php echo $admin_login; ?>">Admin</a>
                    </div>
                </li>

            </ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4"
                                                           href="<?php echo $user_reg; ?>"> Register</a></div>
        </div>
    </nav>
</section>
<?php include "notify.php"; ?>
