<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc'; 
    ///////////////////////////////////////////////////////////////(A)///////////////////////////////////////////////////////////
        class Validate{

            private static $usernameReg='/^[a-z]{4}/';
            private static $passwordReg='/^[0-9]{6,8}/';



            static function validateUsername($username){
                if (preg_match(Validate::$usernameReg, $username)){
                    return "true";
                }else {
                    return "false";
                }
            }
            static function validatePassword($password){
                if (preg_match(Validate::$passwordReg, $password)){
                    return "true";
                }else {
                    return "false";
                }

            }
        }
       
       echo Validate::validateUsername('adfgh')."<br/>";
        echo Validate::validateUsername('ADGK')."<br/>";
        echo Validate::validatePassword('458965')."<br/>";
        echo Validate::validatePassword('4589624c898')."<br/>";
    ?>

    <iframe src="task4.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>