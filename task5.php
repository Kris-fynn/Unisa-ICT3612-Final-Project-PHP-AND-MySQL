<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc'; 
    
        echo "<b>Tables and they Primary and Foreign Keys</b>:</br>";
        echo "<b>Customers:</b></br> <b>    Primary:</b> CustomerId<br/><b>     Foreign:</b><br/><br/>";
        echo "<b>Orders:</b></br> <b>    Primary:</b> OrderID<br/><b>     Foreign:</b>CustomerID,EmployeeID<br/><br/>";
        echo "<b>Order_Details:</b></br> <b>    Primary:</b> OrderID<br/><b>     Foreign:</b>ProductID<br/><br/>";
        echo "<b>Employees:</b></br> <b>    Primary:</b> EmployeeID<br/><b>     Foreign:</b><br/><br/>";
        echo "<b>Suppliers:</b></br> <b>    Primary:</b> SupplierID<br/><b>     Foreign:</b><br/><br/>";
        echo "<b>Products:</b></br> <b>    Primary:</b> ProductID<br/><b>     Foreign:</b>SupplierID,CategoryID<br/><br/>";
        echo "<b>Shippers:</b></br> <b>    Primary:</b> ShipperID<br/><b>     Foreign:</b><br/><br/>";
        echo "<b>Categories:</b></br> <b>    Primary:</b> CategoryID<br/><b>     Foreign:</b><br/><br/>";
    ?>

    <iframe src="task5.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>