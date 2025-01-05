<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <?php require ('../../includes/header.php') ?>

    <div class="container mx-auto my-8 px-4">
        <!-- Statistics Section -->
        <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card Template -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Total Patients</h2>
                <p id="totalActivePatients" class="text-4xl font-extrabold text-blue-600">22</p>
                <canvas id="chartActivePatients" class="mt-4"></canvas>
            </div>

            <!-- Additional Cards -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Last Month</h2>
                <p id="totalAppointmentsLastMonth" class="text-4xl font-extrabold text-blue-600">0</p>
                <canvas id="chartLastMonth" class="mt-4"></canvas>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Last Year</h2>
                <p id="totalAppointmentsLastYear" class="text-4xl font-extrabold text-blue-600">0</p>
                <canvas id="chartLastYear" class="mt-4"></canvas>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Today</h2>
                <p id="totalAppointmentsToday" class="text-4xl font-extrabold text-blue-600">0</p>
                <canvas id="chartToday" class="mt-4"></canvas>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Patients at Hospital</h2>
                <p class="text-4xl font-extrabold text-purple-600">3,150</p>
                <canvas id="chartTotalPatients" class="mt-4"></canvas>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Average Waiting Time</h2>
                <p class="text-4xl font-extrabold text-gray-700">15 mins</p>
                <canvas id="chartWaitingTime" class="mt-4"></canvas>
            </div>
        </section>

        <!-- Actions Section -->
        <div class="mt-12">
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <i class="fa fa-question-circle mr-2"></i>Help
                </button>
                <button class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                    <i class="fa fa-file-pdf mr-2"></i>Export as PDF
                </button>
                <button class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                    <i class="fa fa-file-excel mr-2"></i>Export as Excel
                </button>
                <button class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                    <i class="fa fa-file-csv mr-2"></i>Export as CSV
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/analytics.js" type="text/javascript"></script>

</body>
</html>
