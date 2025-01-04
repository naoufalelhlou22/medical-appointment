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
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <?php require ('../../includes/header.php') ?>

    <!-- Main Content -->
    <div class="container mx-auto my-10">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Doctor Profile</h2>

        <!-- Profile Information -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold text-blue-500 mb-3">Profile Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p><strong>Doctor ID:</strong> <?php echo $doctorProfile['id']; ?></p>
                <p><strong>First Name:</strong> <?php echo $doctorProfile['firstName']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $doctorProfile['lastName']; ?></p>
                <p><strong>Email:</strong> <?php echo $doctorProfile['email']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $doctorProfile['phone']; ?></p>
                <p><strong>Gender:</strong> <?php echo $doctorProfile['gender']; ?></p>
            </div>
        </div>

        <!-- Update Profile and Password -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold text-blue-500 mb-3">Update Information</h3>
            <form method="POST" action="update-profile.php">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-medium">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="w-full p-2 border rounded mt-1" placeholder="Enter new first name">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="w-full p-2 border rounded mt-1" placeholder="Enter new last name">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded mt-1" placeholder="Enter new email">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded mt-1" placeholder="Enter new phone number">
                    </div>
                    <div>
                        <label for="oldPassword" class="block text-sm font-medium">Old Password</label>
                        <input type="password" id="oldPassword" name="oldPassword" class="w-full p-2 border rounded mt-1" placeholder="Enter old password">
                    </div>
                    <div>
                        <label for="newPassword" class="block text-sm font-medium">New Password</label>
                        <input type="password" id="newPassword" name="newPassword" class="w-full p-2 border rounded mt-1" placeholder="Enter new password">
                    </div>
                </div>
                <div class="flex justify-end space-x-4 mt-4">
                    <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Reset</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Online/Offline Status -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-blue-500 mb-3">Current Status</h3>
            <p class="text-lg"><strong>Status:</strong> <?php echo $doctorProfile['status']; ?></p>
            <form method="POST" action="update-status.php" class="mt-4">
                <input type="hidden" name="currentStatus" value="<?php echo $doctorProfile['status']; ?>">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Change to <?php echo $doctorProfile['status'] === 'Online' ? 'Offline' : 'Online'; ?>
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>