<!DOCTYPE html>
<html>
<head>
  <title>Display Data</title>
  <style>
  body {
    background-color: #f2f2f2;
    text-align: center;
    font-family: Arial, sans-serif;
  }

  h1 {
    margin-top: 50px;
    color: #333;
  }

  form {
    margin-bottom: 20px;
  }

  label {
    font-size: 18px;
    margin-right: 10px;
  }

  input[type="text"] {
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button[type="submit"] {
    display: inline-block;
    padding: 8px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    background-color: #0f6292;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button[type="submit"]:hover {
    background-color: #0d4d76;
  }

  table {
    width: 80%;
    margin: 0 auto;
    background: linear-gradient(#0f6292, #0d4d76);
    color: #fff;
    border-collapse: collapse;
  }

  table,
  th,
  td {
    border: 1px solid #fff;
    padding: 10px;
    text-align: center;
  }

  th {
    font-weight: bold;
  }
  .header{
    height:65px;
    background-color: #0f6292;
  
  }
    
  #logo{
    position:absolute;
    height:145px;
    top:-27px;
    left:-20px;
  }
  #fastsend{
    position:absolute;
    top:30px;
    left:94px;
    font-weight: bold;
    font-size: large;
    color:black;
  }
  
  #homepage{
    position:absolute;
    top:30px;
    right:30px;
    color:black;
    font-family: "Red Hat Display", sans-serif;
    font-size:20px;
    text-decoration: none;
  }
  
  #hello{
    position:absolute;
    top:10px;
    right:730px;
    color:black;
    font-weight: bold;
    font-size: 40px;
  
  }
  footer {
    position:absolute;
    bottom : 0px;
    width: 100%;
    background-color: #0f6292;
    /* padding: 8px; */
    text-align: center;
    color: white;
    font-family: "Red Hat Display", sans-serif;
  }
</style>

</head>
<body>
<div class="header">
      <img id="logo" src="../images/fastsend.svg" />
      <a id="fastsend">FastSend</a>
      <a id="homepage" href="../pages/home.html">Homepage</a>
      <!-- <a id="hello" >  </a> -->

    </div>
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

<footer>Made with 🤍 by Meet Gala &amp; Riya Hemani</footer>
</body>
</html>
