
<!DOCTYPE html>
<html>
<body>
<h1>Task 1</h1>
<?php 
    //Task 1(a)
    function boolToText($boolValue, $format = 1) {
        //use a switch for the format, and nested ifs for the values
        switch ($format) {
            case 1:
                if($boolValue == TRUE) {
                    return "True";
                } else {
                    return "False";
                }                
                break;
            case 2:
                if($boolValue == TRUE) {
                    return "Yes";
                } else {
                    return "No";
                }                
                break;
            case 3:
                if($boolValue == TRUE) {
                    return "Positive";
                } else {
                    return "Negative";
                }                
                break;
            default:
                if($boolValue == TRUE) {
                    return "1";
                } else {
                    return "0";
                }                
                break;
        }
    }
 ?>
 
	<h2>Task 1 (a) : </h2>
    <p>boolToText(0); Result = <?php echo boolToText(0); ?></p>
    <p>boolToText(1, 2); Result = <?php echo boolToText(1, 2); ?></p>
    <p>boolToText(0, 3); Result = <?php echo boolToText(0, 3); ?></p>
    <p>boolToText(1, 5); Result = <?php echo boolToText(1, 5); ?></p>
    <br>
  
<?php

    //Task 1 (b)
    function checkNumerals(){
            $numerals = 0;
            $params = func_get_args();

            foreach($params as $arg){
                if(is_numeric($arg))
                    $numerals++;
            }
            echo "Total number of arguments: ".func_num_args().", total number of numerals in these arguments: $numerals";
        }

        
        
?>   
	<h2>Task 1 (b) :</h2>
    <p>checkNumerals("Thando", 23, "Busi", 40);</p>
    <p><?php checkNumerals("Thando", 23, "Busi", 40); ?></p>
    <p>checkNumerals("Mutsa");</p>
    <p><?php checkNumerals("Mutsa"); ?></p>    
</body>
</html>






