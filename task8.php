<html>
<body>
<h1>Task 8</h1>

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

// Task 8(a)
?>
 <h2>Task 8(a) : </h2>
<?php

function writeToFile($students) {	
	$file = fopen("fullrecords.txt", "wb");
	foreach($students as $student){
			fwrite($file, $student->__toString() . "\n");
		}	
    fclose($file);		
}

$student_1 = new FullRecord(123456, 75, 80, 23, 50);
$student_2 = new FullRecord(123457, 50, 50, 75, 60);
$student_3 = new FullRecord(123458, 60, 70, 80, 53);
$student_4 = new FullRecord(123459, 20, 30, 40, 50);
$student_5 = new FullRecord(654321, 55, 80, 65, 75);

$students = array($student_1, $student_2, $student_3, $student_4, $student_5);
writeToFile($students);

echo "<p>File populated..</p>";
?>
      
  <a href="fullrecords.txt" download>Download File </a>
 <h2>Task 8(b) : </h2>

<?php
// Task 8(b)

echo "<p>Recreating objects..</p>";

$file = fopen("fullrecords.txt", "rb");
$student_records = array();
while(!feof($file)){
	$record = fgetcsv($file);
	if($record == false) continue;
	  $student_records[] = new FullRecord($record[0], $record[1], $record[2], $record[3], $record[4]);	
}

foreach($student_records as $record){
		echo $record;
		echo "<br>";
}	

?>
</body>
</html>

