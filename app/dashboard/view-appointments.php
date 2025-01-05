<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Appointments</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex flex-col">
  <!-- Header -->
  <?php require ('../../includes/header.php') ?>

  <!-- Appointment Details Section -->
  <div class="container mx-auto my-5 p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Appointment Details</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <p class="text-lg font-semibold">Doctor:</p>
        <p class="text-gray-700">Dr. John Smith</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Preferred Date & Time:</p>
        <p class="text-gray-700">2025-01-03 10:00 AM</p>
      </div>
      <div class="md:col-span-2">
        <p class="text-lg font-semibold">Reason for Visit:</p>
        <p class="text-gray-700">Follow-up on blood pressure</p>
      </div>
    </div>
  </div>

  <!-- Patient Information Section -->
  <div class="container mx-auto my-5 p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Patient Information</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <p class="text-lg font-semibold">Full Name:</p>
        <p class="text-gray-700">Jane Doe</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Phone Number:</p>
        <p class="text-gray-700">(123) 456-7890</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Email:</p>
        <p class="text-gray-700">jane.doe@example.com</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Gender:</p>
        <p class="text-gray-700">Female</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Age:</p>
        <p class="text-gray-700">34</p>
      </div>
    </div>
  </div>

  <!-- Medical Information Section -->
  <div class="container mx-auto my-5 p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Medical Information</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <p class="text-lg font-semibold">Insurance Info:</p>
        <p class="text-gray-700">XYZ Health Insurance</p>
      </div>
      <div>
        <p class="text-lg font-semibold">Medical Reports:</p>
        <p class="text-gray-700">Uploaded on 2024-12-30</p>
      </div>
      <div class="md:col-span-2">
        <p class="text-lg font-semibold">Symptoms:</p>
        <p class="text-gray-700">Frequent headaches and dizziness</p>
      </div>
    </div>
  </div>

    <!-- Send Notification Button Section -->
    <div class="container mx-auto my-5 p-4">
        <button
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                onclick="sendActionToFile()">
            Confirm Appointment
        </button>
    </div>
</div>
</body>
<script>
    function sendActionToFile() {
        // Using fetch to send a POST request to file.php
        fetch('file.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=confirmAppointment', // Data to send
        })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response (Optional)
                alert('Appointment confirmed!'); // Notify the user
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to confirm appointment.'); // Notify the user
            });
    }
</script>
</html>
