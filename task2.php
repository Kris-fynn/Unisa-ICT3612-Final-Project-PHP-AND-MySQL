<!DOCTYPE html>
<html>

<body>
<h1>Task 2</h1>
    <?php 
                
        class Square{
            private $shapeName;
            private $shapeLength;

            public function __construct($shapeLength){
                $this->shapeName = "Square";
                $this->shapeLength = $shapeLength;
            }

            public function setShapeLength($shapeLength){
                $this->shapeLength = $shapeLength;
            }

            public function getShapeName(){
                return $this->shapeName;
            }

            public function getShapeLength(){
                return $this->shapeLength;
            }

            public function getArea(){
                return $this->shapeLength * $this->shapeLength;
            }

            public function getPerimeter(){
                return 4 * $this->shapeLength;
            }
        }

        $SquareObj = new Square(10);
        $shapeLength = $SquareObj->getShapeLength();
        $shapeName = $SquareObj->getShapeName();
        echo "The new shape is <strong>$shapeName</strong> and one side length is <strong>$shapeLength</strong>.<br><br>";

        $SquareObj->setShapeLength(20);
        $shapeLength = $SquareObj->getShapeLength();
        echo "The new length is <strong>$shapeLength</strong>.<br><br>";

        $area = $SquareObj->getArea();
        $perimeter = $SquareObj->getPerimeter();

        echo "The <strong>$shapeName's</strong> area is <strong>$area</strong> and perimeter is <strong>$perimeter</strong>"
    ?>
    
    
    
</body>
</html>