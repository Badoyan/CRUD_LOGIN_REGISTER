<?php
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        $auth = new UserAuth();
        $auth->register($_POST);
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        <div class="form-actions">
            <a class="btn" href="index.php">Back</a>
        </div>
    </div>
<?php } ?>