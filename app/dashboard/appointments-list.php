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

  <!-- Main Content -->
  <div class="container mx-auto my-5">
    <header class="text-center py-4 mb-5 bg-blue-500 text-white rounded shadow">
      <h1 class="text-2xl font-bold">Appointments List</h1>
    </header>

    <!-- Table Section -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded shadow">
        <thead>
        <tr class="bg-gray-200 text-gray-600 text-sm uppercase text-left">
          <th class="py-3 px-4">Full Name</th>
          <th class="py-3 px-4">Phone Number</th>
          <th class="py-3 px-4">Age</th>
          <th class="py-3 px-4">Status</th>
          <th class="py-3 px-4">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr class="border-b border-gray-200">
          <td class="py-3 px-4">John Doe</td>
          <td class="py-3 px-4">123-456-7890</td>
          <td class="py-3 px-4">35</td>
          <td class="py-3 px-4 text-green-500">Confirmed</td>
          <td class="py-3 px-4">
            <a href="view-appointments.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            <a href="edit-appointment.php" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
          </td>
        </tr>
        <tr class="border-b border-gray-200">
          <td class="py-3 px-4">Jane Smith</td>
          <td class="py-3 px-4">987-654-3210</td>
          <td class="py-3 px-4">29</td>
          <td class="py-3 px-4 text-yellow-500">Pending</td>
          <td class="py-3 px-4">
            <a href="view-appointments.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            <a href="edit-appointment.php" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
          </td>
        </tr>
        <tr class="border-b border-gray-200">
          <td class="py-3 px-4">Alice Johnson</td>
          <td class="py-3 px-4">555-123-4567</td>
          <td class="py-3 px-4">40</td>
          <td class="py-3 px-4 text-red-500">Cancelled</td>
          <td class="py-3 px-4">
            <a href="view-appointment-details.html" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            <a href="edit-appointment.php" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
