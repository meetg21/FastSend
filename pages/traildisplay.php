



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
  <h1>Receiver Data</h1>
  <table>
    <thead>
      <tr>
        <th>ID</
        <th>Name</th>
        <th>Email</th>
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
      // Select data from receiver table
      $sql = "SELECT * FROM reciever";
      $result = mysqli_query($conn, $sql);

      // Check if there are any results
      if (mysqli_num_rows($result) > 0) {
        // Fetch data from the database and display it
        while ($row = mysqli_fetch_assoc($result)) {
          echo "var row = document.createElement('tr');
          row.innerHTML = '<td>" . $row['reciever_id'] . "</td><td>" . $row['reciever_name'] . "</td><td>" . $row['email'] . "</td>';
          document.getElementById('table-body').appendChild(row);";
        }
      } else {
        echo "No results found";
      }
    ?>
  </script>
</body>
</html>
