<?php
// spaces.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SVU Spaces</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url("https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758792942/detailssvu_qhjzac.jpg") no-repeat center center fixed;
            background-size: cover;
            color: white;
    }
    .card {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
    .table {
      margin-bottom: 0;
    }
    b {
       display: inline-block;
       background-color: black;
       color: white;
       padding: 10px 20px;
       border-radius: 5px;
       text-decoration: none;
      cursor: pointer;
       }
  </style>
</head>
<body>
  <br><br>
 <b><button><a href="index.php">HOME</a></button></b>
<div class="container py-5">
  <h2 class="text-center mb-4">SVU Event Spaces</h2>
  <div class="row g-4">

    <!-- Auditorium -->
    <div class="col-md-4">
      <div class="card">
        <img src="https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758535717/aditoriumsvu_tl2uol.webp" alt="Auditorium">
        <div class="card-body">
          <h5 class="card-title">Auditorium</h5>
          <table class="table table-sm table-bordered">
            <tr><th>Capacity</th><td>2000</td></tr>
            <tr><th>Seating</th><td>Inbuilt Seating</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Open Air Auditorium -->
    <div class="col-md-4">
      <div class="card">
        <img src="https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758792348/open_air_ab8zps.webp" alt="Open Air Auditorium">
        <div class="card-body">
          <h5 class="card-title">Open Air Auditorium</h5>
          <table class="table table-sm table-bordered">
            <tr><th>Capacity</th><td>1500</td></tr>
            <tr><th>Seating</th><td>Inbuilt Seating</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Senate Hall -->
    <div class="col-md-4">
      <div class="card">
        <img src="https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758792499/senetehall_qbbvk7.webp" alt="Senate Hall">
        <div class="card-body">
          <h5 class="card-title">Senate Hall</h5>
          <table class="table table-sm table-bordered">
            <tr><th>Capacity</th><td>100</td></tr>
            <tr><th>Seating</th><td>Inbuilt Seating</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Gym -->
    <div class="col-md-4">
      <div class="card">
        <img src="https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758792671/gym_rbocql.avif" alt="Gym">
        <div class="card-body">
          <h5 class="card-title">SVU Gym</h5>
          <table class="table table-sm table-bordered">
            <tr><th>Capacity</th><td>20</td></tr>
            <tr><th>Seating</th><td>Workout Space</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Stadium -->
    <div class="col-md-4">
      <div class="card">
        <img src="https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758792780/stadium_abfp1v.webp" alt="Stadium">
        <div class="card-body">
          <h5 class="card-title">SVU Stadium</h5>
          <table class="table table-sm table-bordered">
            <tr><th>Capacity</th><td>Unlimited (Sports Events)</td></tr>
            <tr><th>Seating</th><td>Open Seating</td></tr>
          </table>
        </div>
      </div>
    </div>

  </div>
 

</div>

</body>
</html>
