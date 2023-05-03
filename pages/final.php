<!DOCTYPE html>
<html>
<head>
  <title>Display Data</title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 5px;
    }
  </style>
</head>
<body>
  <h1>Order Data</h1>
  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Weight</th>
        <th>Type</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Sender Contact</th>
        <th>Receiver Contact</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="table-body">
      <!-- Data will be inserted here by JavaScript -->
    </tbody>
  </table>

  <script>
    // JavaScript code to display data on the HTML page
    <?php
    include('../scriptss/connection.php');

    //start the session
    session_start();

    // Select data from orders table
    $sql = "SELECT o.order_id, o.weights, o.types, s.sender_name, r.reciever_name, s.spnumber AS sender_mobile, r.pnumber AS reciever_mobile
            FROM orders o
            JOIN sender s ON o.sender_id = s.sender_id
            JOIN receiver r ON o.reciever_id = r.reciever_id";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
      // Fetch data from the database and display it
      while ($row = mysqli_fetch_assoc($result)) {
        echo "var row = document.createElement('tr');
        row.innerHTML = '<td>" . $row['order_id'] . "</td><td>" . $row['weights'] . "</td><td>" . $row['types'] . "</td><td>" . $row['sender_name'] . "</td><td>" . $row['receiver_name'] . "</td><td>" . $row['sender_mobile'] . "</td><td>" . $row['receiver_mobile'] . "</td><td><select name=\"status\" onchange=\"updateOrderStatus(" . $row['order_id'] . ", this.value)\"><option value=\"placed\">Placed</option><option value=\"outfordelivery\">Out for delivery</option><option value=\"transit\">In transit</option><option value=\"delivered\">Delivered</option></select></td>';
        document.getElementById('table-body').appendChild(row);";
      }
    } else {
      echo "No results found";
    }
    ?>

    // JavaScript function to update order status in the database
    function updateOrderStatus(order_id, status) {
      // Create an AJAX request to update the status in the database
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      xhttp.open("POST", "update_order_status.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("order_id=" + order_id + "&status=" + status);
    }
  </script>
</body>
</html>
