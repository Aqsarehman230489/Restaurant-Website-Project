<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "webproject";  

$conn = new mysqli($servername, $username, $password, $dbname); //connection created

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // check connection
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $username = $_POST['username'];
  $mobileNumber = $_POST['mobile_number'];
  $numPersons = $_POST['number_of_persons'];
  $reservationTime = $_POST['reservation_time'];
  $reservedTable = $_POST['reserved_table'];

  
  $stmt = $conn->prepare("INSERT INTO reservations (first_name, last_name, username, mobile_number, number_of_persons, reservation_time, reserved_table) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssiss", $firstName, $lastName, $username, $mobileNumber, $numPersons, $reservationTime, $reservedTable);

  
  if ($stmt->execute()) {
    
    $message = "Reservation successfully made!";//after submitting it will show this
  } else {
    echo "Error: " . $stmt->error;
  }
 
  $stmt->close();
}

$conn->close(); // db connection close
?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
 
  <link rel="stylesheet" href="index.html">
  <link rel="stylesheet" href="home.html">
  <link rel="icon" href="logo6.png">
  <title>Celestial cuisine</title>
  <style>
  body, html {
    height: 100%;
    font-family:'DM Sans';
    margin: 0px;
    padding: 0px;
    color: aliceblue;
  }

.navbar {
    background-color: rgba(85, 85, 85, 0.689);
    border-radius: 45px;
    margin: 15px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
     z-index: 1000; 
    padding: 1px;
  }
  
  .navbar-brand {
    display: flex; 
    align-items: center; 
    margin-left: 2px;
    
  }
  
  .navbar-brand p {
    
    color: rgb(210, 174, 138);
   margin-right: 320px;
    margin-top: 15px;
    font-weight: bold;
    font-size: larger;
    font-family:'DM Sans';
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.393);
  }
  
  .navbar img {
    width: 70px;
    height: 70px;
  }
  
  .nav-item p {
   font-family: 'sans-serif';
    margin: 10px 0px 0px 0px;
    color: rgb(210, 174, 138);
    font-family:'DM Sans';
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
    font-size: 25px;
    position: relative; 
  }
  
  .nav-item p::before {
    content: '';
    position: absolute;
    bottom: -3px; 
    left: 0;
    width: 100%;
    height: 3px;
    background-color: rgb(210, 171, 133);
    transform: scaleX(0);
    transform-origin: bottom right;
    transition: transform 0.3s ease-out;
  }
  
  .nav-item p:hover::before {
    transform: scaleX(1);
    transform-origin: bottom left;
  }
  
  
  .nav-link button {
    background-color: rgb(210, 171, 133);
    border: 2px solid rgb(210, 171, 133);
    color: white;
    font-size: larger;
    padding: 11px 20px;
    border-radius: 30px;
    transition: background-color 0.5s ease, color 0.5s ease;
    margin-right: 5px;
   
  }
  
  .nav-link button:hover {
    background-color: transparent;
    color: rgb(210, 171, 133); 
  }
  
  .navbar-collapse{
    margin-left: 10px; 
  }
  .navbar-collapse button {
    margin-right: 17px; 
  }

.fle
{
    display: flex;
}

          /* Reservation */
          
            /* .page-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #a10000;
            } */
            .container{
                margin-top: 0px;
            }
            .unique-container {
                width: 500px;
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 10px;
            }
            
            .unique-table {
                position: relative;
                width: 100%;
                height: 100px;
                background-color: rgb(79, 76, 75);
                border: none;
                text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.393);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
                
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-weight: bold;
                box-sizing: border-box;
                cursor: pointer;
            }
            
            .unique-table.reserved {
              background: linear-gradient(to right, #580000, #b70000, #941616);
            }
           

             .g-3
            {
                margin-top: 5%;
            } 
          
            body{
                padding: 0% 10%;
                background-color: rgb(44, 3, 3);
                
            }


        .sas
            {
                font-weight: bold;
            }

            .mb-3
            {
                margin-top: 10%;
            }


            form
            {
                color: white;
                padding: 10px;  
                width: 100%;
                background: transparent;
            }

            .top
            {
                color: white;
            }</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">
  <img src="logo6.png" alt="img">
      <p>Celestial Cuisine</p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:5502/home.html"><p>Home</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:5502/index.html"><p>Menu</p></a>
      </li>
       <li class="nav-item">
    <a class="nav-link" href="http://localhost/login/index1.php"><p>login</p></a>
  </li>
      <li class="nav-item">
          <a class="nav-link" href="http://localhost/submit_reservation.php"><button>Reservation</button></a>
        </li>
    </ul>
  </div>
</nav>

<br>
<br>
<br>

  
<br><br>

<div class="container text-center">
  
  <div class="row">
    <h1 class="text-center Restaurant top">Secure Your Dining Experience</h1>
 
    <div class="col">

      <form class="g-3 needs-validation" method="POST" novalidate>
        <div class="row mb-3 align-items-center">
          <label for="validationCustom01" class="col-sm-3 col-form-label sas">First name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="validationCustom01" name="first_name" placeholder="First Name" required>
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
     
        <div class="row mb-3 align-items-center">
          <label for="validationCustom02" class="col-sm-3 col-form-label sas">Last name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="validationCustom02" name="last_name" placeholder="Last Name" required>
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
     
        <div class="row mb-3 align-items-center">
          <label for="validationCustomUsername" class="col-sm-3 col-form-label sas">Username</label>
          <div class="col-sm-9">
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="text" class="form-control" id="validationCustomUsername" name="username" placeholder="user@gmail.com" required>
              <div class="invalid-feedback">Please choose a username.</div>
            </div>
          </div>
        </div>
     
        <div class="row mb-3 align-items-center">
          <label for="mobileNumber" class="col-sm-3 col-form-label sas">Mobile Number</label>
          <div class="col-sm-6">
            <input type="tel" class="form-control" id="mobileNumber" name="mobile_number" placeholder="Mobile Number" required>
            <div class="invalid-feedback">Please provide a valid phone number.</div>
          </div>
        </div>
     
        <div class="row mb-3 align-items-center">
          <label for="validationCustom03" class="col-sm-3 col-form-label sas">Persons</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="validationCustom03" name="number_of_persons" placeholder="Number of Persons" required>
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
     
        <div class="row mb-3 align-items-center">
          <label for="reservationTime" class="col-sm-3 col-form-label sas">Time</label>
          <div class="col-sm-9">
            <input type="time" class="form-control" id="reservationTime" name="reservation_time" required>
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
     
        <input type="hidden" name="reserved_table" id="selectedSeat" value="">
     
        <div class="mb-3">
    <input type="submit" name="sub" value="Submit Reservation">
</div>

<div id="submissionMessage" class="alert alert-success" style="display: none;">
    Reservation successfully made!
</div>

     </form>
     
    </div>

    <!-- flex 2 image -->
    <div class="col">



      <div class="container mt-5">


        <div class="unique-container" id="unique-container">
          <!-- tables will be here by JavaScript -->
        </div>

      </div>


    </div>

  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

<script>
    
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('unique-container');
    const totalTables = 30;
    let reservedTableCount = 0;

    function handleTableClick(tableBox) {
        if (tableBox.classList.contains('reserved')) {
            tableBox.classList.remove('reserved');
            reservedTableCount--;
            document.getElementById('selectedSeat').value = "";
        } else {
            if (reservedTableCount < 4) { // Max 4 tables can be selected
                tableBox.classList.add('reserved');
                reservedTableCount++;
                document.getElementById('selectedSeat').value = tableBox.textContent.split('\n')[0].trim();
            } else {
                alert('You can only reserve up to 4 tables. For more tables, please call us.');
            }
        }
    }

    for (let i = 1; i <= totalTables; i++) {
        const tableBox = document.createElement('div');
        tableBox.className = 'unique-table';

        const numberOfSeats = Math.floor(Math.random() * 10) + 3; // Random number between 3 and 12
        tableBox.textContent = `Table ${i}\nSeats: ${numberOfSeats}`;
        tableBox.setAttribute('data-seats', numberOfSeats);

        container.appendChild(tableBox);
        tableBox.addEventListener('click', () => handleTableClick(tableBox));
    }

    const numPersonsInput = document.getElementById('validationCustom03');
    numPersonsInput.addEventListener('input', () => {
        const selectedTable = document.querySelector('.unique-table.reserved');
        if (selectedTable) {
            const numberOfPersons = parseInt(numPersonsInput.value);
            const tableSeats = parseInt(selectedTable.getAttribute('data-seats'));
            if (numberOfPersons > tableSeats) {
                alert('Number of persons cannot exceed the number of seats available at the table.');
                numPersonsInput.value = tableSeats; // Reset input value to the number of available seats
                numPersonsInput.classList.add('is-invalid'); // Highlight input
            } else {
                numPersonsInput.classList.remove('is-invalid'); // Remove highlight if valid
            }
        }
    });

    
    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();          //if num of persons are more then number of seats
        }

        
        const selectedTable = document.querySelector('.unique-table.reserved');
        if (selectedTable) {
            const numberOfPersons = parseInt(numPersonsInput.value);
            const tableSeats = parseInt(selectedTable.getAttribute('data-seats'));
            if (numberOfPersons > tableSeats) {
                alert('Number of persons cannot exceed the number of seats available at the table.');
                numPersonsInput.value = tableSeats;  // set the input value to number of seats available
                numPersonsInput.classList.add('is-invalid'); // Highlight input
                event.preventDefault();
                event.stopPropagation();
            }
        }

        form.classList.add('was-validated');
    }, false);

   
    });


 </script>

</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.needs-validation');
    const submissionMessage = document.getElementById('submissionMessage');

    form.addEventListener('submit', event => {
        if (form.checkValidity()) {
            submissionMessage.style.display = 'block'; 
            setTimeout(() => {
                submissionMessage.style.display = 'none'; 
            }, 3000);// msg hide after 3 seconds
        }
    });
});
</script>

</html>
