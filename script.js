const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.querySelector('#login').addEventListener('click', () => {
    container.classList.remove('sign-up');
    container.classList.add('sign-in');
});

document.querySelector('#register').addEventListener('click', () => {
    container.classList.remove('sign-in');
    container.classList.add('sign-up');
});

//reservation

(() => {
'use strict'


const forms = document.querySelectorAll('.needs-validation')

Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
    }

    form.classList.add('was-validated')
  }, false)
})
})()


document.addEventListener("DOMContentLoaded", function() {
const input = document.querySelector("#mobileNumber");
window.intlTelInput(input, {
  initialCountry: "auto",
  geoIpLookup: function(success, failure) {
    fetch("https://ipinfo.io?token=YOUR_TOKEN")
      .then(response => response.json())
      .then(data => success(data.country))
      .catch(failure);
  },
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
});








    // reservation

    document.addEventListener('DOMContentLoaded', () => {
      const container = document.getElementById('unique-container');
      const totalTables = 30;
      let reservedTableCount = 0;
  
      // Function to handle table click event
      function handleTableClick(tableBox) {
        if (tableBox.classList.contains('reserved')) {
            tableBox.classList.remove('reserved');
            reservedTableCount--;
            // Clear selected seat when unselecting table
            document.getElementById('selectedSeat').value = "";
        } else {
            if (reservedTableCount < 1) {
                tableBox.classList.add('reserved');
                reservedTableCount++;
                // Store selected seat when selecting table
                document.getElementById('selectedSeat').value = tableBox.textContent.split('\n')[0].trim();
            } else {
                alert('For more tables, please call us.');
            }
        }
    }
    
  
      for (let i = 1; i <= totalTables; i++) {
          const tableBox = document.createElement('div');
          tableBox.className = 'unique-table';
  
          const numberOfSeats = Math.floor(Math.random() * 10) + 3; // Random number between 3 and 12
          tableBox.textContent = `Table ${i}\nSeats: ${numberOfSeats}`;
          tableBox.setAttribute('data-seats', numberOfSeats); // Store number of seats as data attribute
  
          container.appendChild(tableBox);
  
          // Add click event listener to tableBox
          tableBox.addEventListener('click', () => handleTableClick(tableBox));
      }
  
      // Add event listener to the input field for number of persons
      const numPersonsInput = document.getElementById('validationCustom03');
      numPersonsInput.addEventListener('input', () => {
          const selectedTable = document.querySelector('.unique-table.reserved');
          if (selectedTable) {
              const numberOfPersons = parseInt(numPersonsInput.value);
              const tableSeats = parseInt(selectedTable.getAttribute('data-seats'));
              if (numberOfPersons > tableSeats) {
                  alert('Number of persons cannot exceed number of seats available at the table.');
                  numPersonsInput.value = tableSeats; // Reset input value to number of available seats
                  numPersonsInput.classList.add('is-invalid'); // Highlight input
              } else {
                  numPersonsInput.classList.remove('is-invalid'); // Remove highlight if valid
              }
          }
      });
  
      // Prevent form submission if number of persons exceeds number of seats
      const form = document.querySelector('.needs-validation');
      form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
          }
  
          // Validate number of persons against number of seats
          const selectedTable = document.querySelector('.unique-table.reserved');
          if (selectedTable) {
              const numberOfPersons = parseInt(numPersonsInput.value);
              const tableSeats = parseInt(selectedTable.getAttribute('data-seats'));
              if (numberOfPersons > tableSeats) {
                  alert('Number of persons cannot exceed number of seats available at the table.');
                  numPersonsInput.value = tableSeats; // Reset input value to number of available seats
                  numPersonsInput.classList.add('is-invalid'); // Highlight input
                  event.preventDefault();
                  event.stopPropagation();
              }
          }
  
          form.classList.add('was-validated');
      }, false);
  });
  

   const reservationTimeInput = document.getElementById("reservationTime");
reservationTimeInput.addEventListener("change", function () {
    const timeValue = reservationTimeInput.value;
    if (timeValue) {
        alert("Please note: If you do not arrive within 1 minutes of the selected time, your table will be unreserved by default.");
        const [hours, minutes] = timeValue.split(":");
        const reservationTime = new Date();
        reservationTime.setHours(parseInt(hours, 10));
        reservationTime.setMinutes(parseInt(minutes, 10));
        reservationTime.setSeconds(0);

        const currentTime = new Date();
        const timeDifference = reservationTime.getTime() - currentTime.getTime();

        if (timeDifference > 0) {
            setTimeout(() => {
                alert("Your reservation has been unreserved as 1 minutes have passed.");
                // Logic to unreserve the table should be implemented here
            }, timeDifference + 1 * 60 * 1000); // Add 15 minutes in milliseconds
        }
    }
});

