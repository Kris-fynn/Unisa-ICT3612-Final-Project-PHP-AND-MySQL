<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc'; ?>

    <?php
////////////////////////////////////////////////////////////////////(a)//////////////////////////////////////////////////////////////
function boolToText($boolVal,$format=1){
    if ($format==1) {
        if ($boolVal==0) {
            echo "False <br>";
        }elseif ($boolVal==1) {
            echo "True<br>";
        }
    }elseif ($format==2) {
        if ($boolVal==0) {
            echo "No<br>";
        }elseif ($boolVal==1) {
            echo "Yes<br>";
            }
        }elseif ($format==3) {
            if ($boolVal==0) {
                echo "Negative<br>";
            }elseif ($boolVal==1) {
                echo "Positive<br>";
            }
        }else {
            echo 0;
            echo "<br>";
        }
    }
    
    //invoke functions 
    boolToText(1);
    boolToText(0, 2);
    boolToText(1, 3);
    boolToText(0, 5);
    echo "<br/>";
    ////////////////////////////////////////////////////////////////////(a)//////////////////////////////////////////////////////////////
    
    
    ////////////////////////////////////////////////////////////////////(b)//////////////////////////////////////////////////////////////
    
    function numArgs(){
        $argArray=func_get_args();
        $num = count($argArray);
        
        $numNumerals=0;
        for ($i=0; $i <$num ; $i++) { 
            
            if(is_integer($argArray[$i])) {
                $numNumerals++;
            }
        }
        echo "Total number of arguments: ".$num." total number of numerals in these arguments: ".$numNumerals."<br/>";
    }
    numArgs("Thando", 23, "Busi", 40);
    numArgs("Mutsa");
    
    ////////////////////////////////////////////////////////////////////(b)//////////////////////////////////////////////////////////////

    ?>

<iframe src="Task1.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>