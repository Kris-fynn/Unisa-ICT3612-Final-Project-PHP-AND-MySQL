<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc'; 

    class AssignmentRecord{
        protected $studentNum;
        protected $assignment1;
        protected $assignment2;
        protected $assignment3;

        const ass1Weight = .1;
        const ass2Weight = .1;
        const ass3Weight = .8;

        function __construct($studNum,$ass1,$ass2,$ass3){
            $this->studentNum = $studNum;
            $this->assignment1 = $ass1;
            $this->assignment2 = $ass2;
            $this->assignment3 = $ass3;
        }

        function yearMark(){
            return $this->assignment1*ass1Weight+$this->assignment2*ass2Weight+$this->assignment3*ass3Weight;
        }
        function __toString(){
            return $this->studentNum.",".$this->assignment1.",".$this->assignment2.",".$this->assignment3;
        }
    }

    class FullRecord extends AssignmentRecord{

        private $examMark;

        function __construct($studNum,$ass1,$ass2,$ass3,$examMark){
            $this->examMark =$examMark;
            $this->studentNum = $studNum;
            $this->assignment1 = $ass1;
            $this->assignment2 = $ass2;
            $this->assignment3 = $ass3;
        }

        function __toString(){
           return  AssignmentRecord::__toString().",".$this->examMark;
        }
    }

    $fullRecord = new FullRecord(123456,70,80,50,55);

   echo $fullRecord->__toString();

   
    
    ?>
    
    <iframe src="task3.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>