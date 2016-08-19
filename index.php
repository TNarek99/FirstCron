<?php 

require_once 'UserModel.php';

if (isset($_POST['email'])) {
    $userModel = new UserModel();
    
    $user = new User();
    $user->setEmail($_POST['email']);
    
    $userModel->addUser($user);
}

?>

<!doctype html>
    
<html>
    <head>
        <title>Form</title>
    </head>

    <body>
        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="submit" value="Go"> 
        </form>
    </body>
</html>