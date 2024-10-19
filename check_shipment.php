
<?php
$conn = new mysqli("localhost", "username", "password", "DELIVERY_DB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shipmentNo = $_POST['shipmentNo'];
$sql = "SELECT * FROM SHIPMENT_TABLE WHERE Shipment_No = $shipmentNo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "exists";
} else {
    echo "not_exists";
}

$conn->close();
?>
