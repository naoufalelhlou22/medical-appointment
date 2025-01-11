<?php

require '../auth.php';
// Get the appointment ID from the URL parameter
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">
<div>
    <div class="min-h-screen flex">
        <?php require_once '../../includes/header.php'?>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Top Bar -->
        <div class="bg-white p-4 shadow-md fixed w-full z-10">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">View Appointment</h1>
                <div class="flex items-center space-x-4">
                    <!-- Notification Button -->
                    <button class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 relative transition duration-300">
                        <i class="fas fa-bell"></i>
                        <!-- Notification Badge -->
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                    </button>
                    <!-- User Profile Button -->
                    <button class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Appointment Details Section -->
        <div class="container mx-auto p-4 mt-16">
            <div id="appointment-details" class="bg-white p-6 rounded-lg shadow-lg border border-gray-100 mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Appointment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-base font-semibold text-gray-800">Doctor:</p>
                        <p id="doctor" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Preferred Date & Time:</p>
                        <p id="preferred-date-time" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-base font-semibold text-gray-800">Reason for Visit:</p>
                        <p id="reason-for-visit" class="text-base text-gray-700">Loading...</p>
                    </div>
                </div>
            </div>

            <!-- Patient Information Section -->
            <div id="patient-info" class="bg-white p-6 rounded-lg shadow-lg border border-gray-100 mb-8">
                <h2 class="text-xl font-semibold mb-4 text-gray-900">Patient Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-base font-semibold text-gray-800">Full Name:</p>
                        <p id="full-name" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Phone Number:</p>
                        <p id="phone-number" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Email:</p>
                        <p id="email" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Gender:</p>
                        <p id="gender" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Age:</p>
                        <p id="age" class="text-base text-gray-700">Loading...</p>
                    </div>
                </div>
            </div>

            <!-- Medical Information Section -->
            <div id="medical-info" class="bg-white p-6 rounded-lg shadow-lg border border-gray-100 mb-8">
                <h2 class="text-xl font-semibold mb-4 text-gray-900">Medical Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-base font-semibold text-gray-800">Insurance Info:</p>
                        <p id="insurance-info" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Medical Reports:</p>
                        <p id="medical-reports" class="text-base text-gray-700">Loading...</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-base font-semibold text-gray-800">Symptoms:</p>
                        <p id="symptoms" class="text-base text-gray-700">Loading...</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center space-x-4">
                <!-- Confirm Appointment Button -->
                <form action="../../handler/confirm_appointment.php" method="post">
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg text-base shadow-md transition duration-300">
                        Confirm Appointment
                    </button>
                </form>

                <!-- Cancel Appointment Button -->
                <form action="../../handler/cancel_appointment.php" method="post">
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg text-base shadow-md transition duration-300">
                        Cancel Appointment
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const appointmentId = <?php echo json_encode($id); ?>;

        fetch(`http://localhost/medical-appointment/handler/fetch_spec_patient.php?id=${appointmentId}`)
            .then(response => response.json())
            .then(data => {
                const appointment = data.appointments.find(app => app.id === appointmentId.toString());

                if (appointment) {
                    document.getElementById("doctor").textContent = appointment.doctor;
                    document.getElementById("preferred-date-time").textContent = appointment.preferred_date_time;
                    document.getElementById("reason-for-visit").textContent = appointment.reason_for_visit;
                    document.getElementById("full-name").textContent = appointment.full_name;
                    document.getElementById("phone-number").textContent = appointment.phone;
                    document.getElementById("email").textContent = appointment.email;
                    document.getElementById("gender").textContent = appointment.gender;
                    document.getElementById("age").textContent = calculateAge(appointment.date_of_birth);
                    document.getElementById("insurance-info").textContent = appointment.insurance_info;
                    document.getElementById("medical-reports").textContent = appointment.medical_reports || "None";
                    document.getElementById("symptoms").textContent = appointment.symptoms;
                } else {
                    console.error("Appointment not found.");
                }
            })
            .catch(error => console.error("Error fetching appointment data:", error));
    });

    function calculateAge(dob) {
        const birthDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

</script>

</html>
