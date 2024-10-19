
function checkShipmentNo() {
    var shipmentNo = document.getElementById("shipmentNo").value;
    if (shipmentNo) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "check_shipment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText == "exists") {
                    enableUpdate();
                    fillForm(shipmentNo);
                } else {
                    enableSave();
                    enableFormFields();
                }
            }
        };
        xhr.send("shipmentNo=" + shipmentNo);
    }
}

function enableFormFields() {
    document.getElementById("description").disabled = false;
    document.getElementById("source").disabled = false;
    document.getElementById("destination").disabled = false;
    document.getElementById("shippingDate").disabled = false;
    document.getElementById("deliveryDate").disabled = false;
}

function fillForm(shipmentNo) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "get_shipment_data.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById("description").value = data.description;
            document.getElementById("source").value = data.source;
            document.getElementById("destination").value = data.destination;
            document.getElementById("shippingDate").value = data.shippingDate;
            document.getElementById("deliveryDate").value = data.deliveryDate;
        }
    };
    xhr.send("shipmentNo=" + shipmentNo);
}
