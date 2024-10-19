
<?php
$conn = new mysqli("localhost", "username", "password", "DELIVERY_DB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shipmentNo = $_POST['shipmentNo'];
$description = $_POST['description'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$shippingDate = $_POST['shippingDate'];
$deliveryDate = $_POST['deliveryDate'];

if (isset($_POST['save'])) {
    $sql = "INSERT INTO SHIPMENT_TABLE (Shipment_No, Description, Source, Destination, Shipping_Date, Expected_Delivery_Date)
            VALUES ($shipmentNo, '$description', '$source', '$destination', '$shippingDate', '$deliveryDate')";
} else if (isset($_POST['update'])) {
    $sql = "UPDATE SHIPMENT_TABLE 
            SET Description='$description', Source='$source', Destination='$destination', Shipping_Date='$shippingDate', Expected_Delivery_Date='$deliveryDate' 
            WHERE Shipment_No=$shipmentNo";
}

if ($conn->query($sql) === TRUE) {
    echo "Record saved/updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
