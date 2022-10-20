<!DOCTYPE html>
<html>
<body>
<h1>Task 4</h1>
<?php
    //Task 4 (a)
    class Validate{

        private static $userRegex = "/^([a-z]){4}$/";
        private static $passwordRegex = "/^([0-9]){6,8}$/";

        public static function ValidateUser($user){
            return preg_match(Validate::$userRegex, $user);
        }

        public static function ValidatePassword($password){
            return preg_match(Validate::$passwordRegex, $password);
        }
    }
?>
<h2>Task 4(a) :</h2>
<p>Validate username and password</p>
<p>
    <?php 
        echo "<b>Username </b> <br>";
        echo "Validate abcd - " . Validate::ValidateUser('abcd') . "<br>";        
        echo "Validate abcde - " . Validate::ValidateUser('abcde') . "<br>";
        echo "<br>";
		
        echo "<b>Password </b> <br>";        
        echo "Validate 1234567 - " . Validate::ValidatePassword('1234567') . "<br>";        
        echo "Validate abcde - " . Validate::ValidatePassword('abcde') . "<br>";
        echo "<br>";
    ?>
</p>

<h2>Task 4(b) :</h2>
<p>/^[01]?\d\/[0-3]\d\/\d{4}$/</p>
<p>
    <?php 
        echo "Validate 10/10/2011 - " . preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", "11/11/1111") . "<br>";
        echo "Validate 3/3/1981 - " . preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", "aa/aa/aaaa") . "<br>";
        echo "<br>";
    ?>
</p>
</body>
</html>






