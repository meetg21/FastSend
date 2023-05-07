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
  <h1>Order Details</h1>
  <form action="" method="POST">
    <label for="user-id">Enter Order ID: </label>
    <input type="text" name="user-id" id="user-id">
    <button type="submit" name="submit">Submit</button>
  </form>
  <br>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Weight</th>
        <th>Type</th>
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

      if(isset($_POST['submit'])) {
        $userId = $_POST['user-id'];
        // Select data from orders table for a specific user
        $sql = "SELECT * FROM orders WHERE order_id = '$userId'";
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
          // Fetch data from the database and display it
          while ($row = mysqli_fetch_assoc($result)) {
            echo "var row = document.createElement('tr');
            row.innerHTML = '<td>" . $row['order_id'] . "</td><td>" . $row['weights'] . "</td><td>" . $row['types'] . "</td>';
            document.getElementById('table-body').appendChild(row);";
          }
        } else {
          echo "No results found";
        }
      }
    ?>
  </script>
</body>
</html>
