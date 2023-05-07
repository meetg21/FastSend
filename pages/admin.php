<!DOCTYPE html>
<html>
<head>
  <title>Display Data</title>
  <style>
    body {
    background-color: #f2f2f2;
    text-align: center;
  }

  table {
    width: 80%;
    margin: 0 auto;
    background: linear-gradient(#0f6292, #0d4d76);
    color: #fff;
  }

  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
    text-align: center;
  }

  th {
    font-weight: bold;
  }

  button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    background-color: #0f6292;
    color: #fff;
    cursor: pointer;
  }
  .header{
    position:relative;
    top:0px;
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
    right:630px;
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

</head>
<body>

<div class="header">
      <img id="logo" src="../images/fastsend.svg" />
      <a id="fastsend">FastSend</a>
      <a id="homepage" href="../pages/home.html">Homepage</a>
      <a id="hello" >Admin's Portal </a>

    </div>
    <br><br>
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
      </tr>
    </thead>
    <tbody id="table-body">
      <!-- Data will be inserted here by JavaScript -->
    </tbody>
  </table>
  <button onclick="downloadTable()">Download PDF</button>
  <footer>Made with 🤍 by Meet Gala &amp; Riya Hemani</footer>
  <script>
    // JavaScript code to display data on the HTML page
    <?php
    include('../scriptss/connection.php');

    //start the session
    session_start();

    // Select data from orders table
    $sql = "SELECT o.order_id, o.weights, o.types, s.sender_name, r.reciever_name, s.spnumber AS sender_mobile, r.pnumber AS receiver_mobile
            FROM orders o
            JOIN sender s ON o.sender_id = s.sender_id
            JOIN reciever r ON o.reciever_id = r.reciever_id";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
      // Fetch data from the database and display it
      while ($row = mysqli_fetch_assoc($result)) {
        echo "var row = document.createElement('tr');
        row.innerHTML = '<td>" . $row['order_id'] . "</td><td>" . $row['weights'] . "</td><td>" . $row['types'] . "</td><td>" . $row['sender_name'] . "</td><td>" . $row['reciever_name'] . "</td><td>" . $row['sender_mobile'] . "</td><td>" . $row['receiver_mobile'] . "</td>';
        document.getElementById('table-body').appendChild(row);";
      }
    } else {
      echo "No results found";
    }
    ?>;

function downloadTable() {
  // Create a new jsPDF instance
  const doc = new jsPDF();

  // Set the table header
  const header = ['Order ID', 'Weight', 'Type', 'Sender Name', 'Receiver Name', 'Sender Contact', 'Receiver Contact', 'Status'];

  // Initialize the data array
  const data = [];

  // Add each row of data to the array
  const rows = document.querySelectorAll('table tbody tr');
  rows.forEach((row) => {
    const rowData = [];
    const cells = row.querySelectorAll('td');
    cells.forEach((cell) => {
      rowData.push(cell.textContent);
    });
    data.push(rowData);
  });

  // Add the table to the PDF document
  doc.autoTable({
    head: [header],
    body: data,
  });

  // Download the PDF file
  doc.save('order-data.pdf');
}

  </script>



</body>
</html>

