<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <?php require ('../../includes/header.php') ?>
    <!-- Main Content -->
    <div class="container mx-auto my-10">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Schedule Your Appointment</h2>
        <form class="bg-white p-6 rounded shadow">
            <!-- Patient Information -->
            <section class="mb-6">
                <h3 class="text-lg font-semibold text-blue-500 mb-3">Patient Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fullName" class="block text-sm font-medium">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="w-full p-2 border rounded mt-1" placeholder="Enter full name">
                    </div>
                    <div>
                        <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="w-full p-2 border rounded mt-1">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium">Gender</label>
                        <select id="gender" name="gender" class="w-full p-2 border rounded mt-1">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="w-full p-2 border rounded mt-1" placeholder="Enter phone number">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded mt-1" placeholder="Enter email address">
                    </div>
                </div>
            </section>

            <!-- Appointment Details -->
            <section class="mb-6">
                <h3 class="text-lg font-semibold text-blue-500 mb-3">Appointment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="reason" class="block text-sm font-medium">Reason for Visit</label>
                        <input type="text" id="reason" name="reason" class="w-full p-2 border rounded mt-1" placeholder="Routine Checkup">
                    </div>
                    <div>
                        <label for="preferredDateTime" class="block text-sm font-medium">Preferred Date & Time</label>
                        <input type="datetime-local" id="preferredDateTime" name="preferredDateTime" class="w-full p-2 border rounded mt-1">
                    </div>
                    <div>
                        <label for="doctor" class="block text-sm font-medium">Doctor/Specialist</label>
                        <select id="doctor" name="doctor" class="w-full p-2 border rounded mt-1">
                            <option>Dr. Smith</option>
                            <option>Dr. Johnson</option>
                            <option>Dr. Williams</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Appointment Type</label>
                        <div class="flex items-center space-x-4 mt-1">
                            <label><input type="radio" name="appointmentType" value="In-person" class="mr-1"> In-person</label>
                            <label><input type="radio" name="appointmentType" value="Telemedicine" class="mr-1"> Telemedicine</label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Medical Information -->
            <section class="mb-6">
                <h3 class="text-lg font-semibold text-blue-500 mb-3">Medical Information</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="symptoms" class="block text-sm font-medium">Current Symptoms/Concerns</label>
                        <textarea id="symptoms" name="symptoms" class="w-full p-2 border rounded mt-1" rows="3" placeholder="Describe symptoms or concerns"></textarea>
                    </div>
                    <div>
                        <label for="medicalReports" class="block text-sm font-medium">Upload Medical Reports</label>
                        <input type="file" id="medicalReports" name="medicalReports" class="w-full p-2 border rounded mt-1">
                    </div>
                </div>
            </section>

            <!-- Insurance Information -->
            <section class="mb-6">
                <h3 class="text-lg font-semibold text-blue-500 mb-3">Insurance Information</h3>
                <div>
                    <label for="insurance" class="block text-sm font-medium">Provider Name and ID</label>
                    <input type="text" id="insurance" name="insurance" class="w-full p-2 border rounded mt-1" placeholder="Enter provider name and ID">
                </div>
            </section>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Reset Form</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Confirm Appointment</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
