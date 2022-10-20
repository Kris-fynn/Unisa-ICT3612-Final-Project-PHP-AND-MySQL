<!DOCTYPE html>
<html>

<body>
<h1>Task 3</h1>
    <?php 
                
        class AssignmentRecord{

            private $studentNumber;
            private $assignment1;
            private $assignment2;
            private $assignment3;

            const ASS_ONE_WEIGHT = 0.1;
            const ASS_TWO_WEIGHT = 0.1;
            const ASS_THREE_WEIGHT = 0.8;

            public function __construct($studentNumber, $assignment1, $assignment2, $assignment3){

                $this->studentNumber = $studentNumber;
                $this->assignment1 = $assignment1;
                $this->assignment2 = $assignment2;
                $this->assignment3 = $assignment3;
            }

            public function calcYearMark(){
                
                $yearMark = ($this->assignment1 * AssignmentRecord::ASS_ONE_WEIGHT) + ($this->assignment2 * AssignmentRecord::ASS_TWO_WEIGHT) + ($this->assignment3 * AssignmentRecord::ASS_THREE_WEIGHT);
                return $yearMark;
            }

            public function __toString(){
                return "$this->studentNumber, $this->assignment1, $this->assignment2, $this->assignment3";
            }
        }

        class FullRecord extends AssignmentRecord{
            private $examMark;

            public function __construct($studentNumber, $assignment1, $assignment2, $assignment3, $examMark){
                $this->examMark = $examMark;
                parent::__construct($studentNumber, $assignment1, $assignment2, $assignment3);
            }

            public function __toString(){
                $assRec = parent::__toString();
                return $assRec.", $this->examMark";
            }
        }

        $fullRecord = new FullRecord(123456, 70, 80, 50, 55);
        $yearMark = $fullRecord->calcYearMark();
        
        echo "Year mark is $yearMark<br><br>";

        $rec = $fullRecord->__toString();
        echo "Full student record: $rec";
    ?>
    
    <br><br>
    </body>
</html>