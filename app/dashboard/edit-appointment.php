<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Appointment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex flex-col">
  <!-- Header -->
  <?php require ('../../includes/header.php') ?>

  <!-- Main Content -->
  <div class="container mx-auto my-5">
    <header class="text-center py-4 mb-5 bg-blue-500 text-white rounded shadow">
      <h1 class="text-2xl font-bold">Edit Appointment</h1>
    </header>

    <!-- Form Section -->
    <div class="bg-white p-6 rounded shadow">
      <form>
        <!-- Patient ID -->
        <div class="mb-4">
          <label for="patient-id" class="block text-sm font-medium text-gray-700">Patient ID</label>
          <input type="text" id="patient-id" name="patient-id" class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Patient ID">
        </div>

        <!-- Preferred Date & Time -->
        <div class="mb-4">
          <label for="preferred-datetime" class="block text-sm font-medium text-gray-700">Preferred Date & Time</label>
          <input type="datetime-local" id="preferred-datetime" name="preferred-datetime" class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Reason for Visit -->
        <div class="mb-4">
          <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Visit</label>
          <textarea id="reason" name="reason" rows="4" class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter reason for visit"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
