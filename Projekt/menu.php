</section>
</div>
</div>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="inner">
            <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <?php
                        if ($user != false && ($user->class == 'admin' || $user->class == 'author')) {
                            echo "<li><a href='/wprg/Projekt/edit.php'>New post</a></li>";
                        }
                        ?>
                        <li>
                            <?php
                            if ($user == false) {
                                echo "<a href='/wprg/Projekt/register.php'>Register</a></li>";
                            } else {
                                echo "<a href='/wprg/Projekt/changepass.php'>Change password</a></li>";
                            }
                            ?>
                        </li>
                        <li><a href="index.php">Contact</a></li>								
                    </ul>
                </nav>