<?php require '../auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

<?php require_once '../../includes/header.php'?>

<!-- Main Content -->
<div class="flex-1 ml-64">
    <!-- Top Bar -->
    <div class="bg-white p-4 shadow-md fixed w-full z-10">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold">Add Appointment</h1>
            <div class="flex items-center space-x-4">
                <!-- Notification Button -->
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 relative transition duration-300">
                    <i class="fas fa-bell"></i>
                    <!-- Notification Badge -->
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                </button>
                <!-- User Profile Button -->
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-user"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container mx-auto p-4 mt-16">
        <form class="bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <!-- Patient Information -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Patient Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter full name">
                    </div>
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender" name="gender" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter phone number">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter email address">
                    </div>
                </div>
            </section>

            <!-- Appointment Details -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Appointment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Visit</label>
                        <input type="text" id="reason" name="reason" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Routine Checkup">
                    </div>
                    <div>
                        <label for="preferredDateTime" class="block text-sm font-medium text-gray-700">Preferred Date & Time</label>
                        <input type="datetime-local" id="preferredDateTime" name="preferredDateTime" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    </div>
                    <div>
                        <label for="doctor" class="block text-sm font-medium text-gray-700">Doctor/Specialist</label>
                        <select id="doctor" name="doctor" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                            <option>Dr. Smith</option>
                            <option>Dr. Johnson</option>
                            <option>Dr. Williams</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Appointment Type</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <label class="flex items-center">
                                <input type="radio" name="appointmentType" value="In-person" class="mr-2">
                                In-person
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="appointmentType" value="Telemedicine" class="mr-2">
                                Telemedicine
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Medical Information -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Medical Information</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="symptoms" class="block text-sm font-medium text-gray-700">Current Symptoms/Concerns</label>
                        <textarea id="symptoms" name="symptoms" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" rows="3" placeholder="Describe symptoms or concerns"></textarea>
                    </div>
                    <div>
                        <label for="medicalReports" class="block text-sm font-medium text-gray-700">Upload Medical Reports</label>
                        <input type="file" id="medicalReports" name="medicalReports" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    </div>
                </div>
            </section>

            <!-- Insurance Information -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Insurance Information</h3>
                <div>
                    <label for="insurance" class="block text-sm font-medium text-gray-700">Provider Name and ID</label>
                    <input type="text" id="insurance" name="insurance" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter provider name and ID">
                </div>
            </section>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <button type="reset" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300">Reset Form</button>
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Confirm Appointment</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>