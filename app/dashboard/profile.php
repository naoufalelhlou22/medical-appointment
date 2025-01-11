<?php
// Simulate doctor profile data for demonstration purposes
$doctorProfile = [
    'id' => 'D12345',
    'firstName' => 'John',
    'lastName' => 'Doe',
    'email' => 'johndoe@example.com',
    'phone' => '+1234567890',
    'gender' => 'Male',
    'status' => 'Online' // or 'Offline'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-blue-50 to-purple-50 text-gray-800">

    <div class="min-h-screen flex">
    <!-- Left Menu (Header) -->
        <?php require_once '../../includes/header.php'?>
    </div>
    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Top Bar -->
        <div class="bg-white p-4 shadow-md fixed w-full z-10">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Doctor Profile</h1>
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

        <!-- Profile Information -->
        <div class="container mx-auto p-4 mt-16">
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100 mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-6">Profile Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <p class="text-gray-700"><strong>Doctor ID:</strong> <?php echo $doctorProfile['id']; ?></p>
                    <p class="text-gray-700"><strong>First Name:</strong> <?php echo $doctorProfile['firstName']; ?></p>
                    <p class="text-gray-700"><strong>Last Name:</strong> <?php echo $doctorProfile['lastName']; ?></p>
                    <p class="text-gray-700"><strong>Email:</strong> <?php echo $doctorProfile['email']; ?></p>
                    <p class="text-gray-700"><strong>Phone Number:</strong> <?php echo $doctorProfile['phone']; ?></p>
                    <p class="text-gray-700"><strong>Gender:</strong> <?php echo $doctorProfile['gender']; ?></p>
                </div>
            </div>

            <!-- Update Profile and Password -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100 mb-8">
                <h3 class="text-xl font-semibold text-blue-600 mb-6">Update Information</h3>
                <form method="POST" action="update-profile.php">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter new first name">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter new last name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter new email">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter new phone number">
                        </div>
                        <div>
                            <label for="oldPassword" class="block text-sm font-medium text-gray-700">Old Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter old password">
                        </div>
                        <div>
                            <label for="newPassword" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" class="w-full p-3 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" placeholder="Enter new password">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="reset" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300">Reset</button>
                        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Online/Offline Status -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-blue-600 mb-6">Current Status</h3>
                <p class="text-lg text-gray-700"><strong>Status:</strong> <?php echo $doctorProfile['status']; ?></p>
                <form method="POST" action="update-status.php" class="mt-6">
                    <input type="hidden" name="currentStatus" value="<?php echo $doctorProfile['status']; ?>">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300">
                        Change to <?php echo $doctorProfile['status'] === 'Online' ? 'Offline' : 'Online'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>