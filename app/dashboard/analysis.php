<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Medical Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        canvas {
            max-height: 250px; /* Adjust as necessary */
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<?php require_once '../../includes/header.php'?>

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Top Bar -->
        <div class="bg-white p-4 shadow-md fixed w-full z-10">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Dashboard</h1>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="container mx-auto p-4 mt-16">
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card Template -->
                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Total Patients</h2>
                    <p id="totalActivePatients" class="text-2xl font-extrabold text-blue-600">0</p>
                    <canvas id="chartActivePatients" class="mt-2 h-20"></canvas>
                </div>

                <!-- Additional Cards -->
                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Last Month</h2>
                    <p id="totalAppointmentsLastMonth" class="text-2xl font-extrabold text-blue-600">0</p>
                    <canvas id="chartLastMonth" class="mt-2 h-20"></canvas>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Last Year</h2>
                    <p id="totalAppointmentsLastYear" class="text-2xl font-extrabold text-blue-600">0</p>
                    <canvas id="chartLastYear" class="mt-2 h-20"></canvas>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Appointments Today</h2>
                    <p id="totalAppointmentsToday" class="text-2xl font-extrabold text-blue-600">0</p>
                    <canvas id="chartToday" class="mt-2 h-20"></canvas>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Patients at Hospital</h2>
                    <p class="text-2xl font-extrabold text-purple-600">3,150</p>
                    <canvas id="chartTotalPatients" class="mt-2 h-20"></canvas>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <h2 class="text-lg font-semibold text-gray-600 mb-2">Average Waiting Time</h2>
                    <p class="text-2xl font-extrabold text-gray-700">15 mins</p>
                    <canvas id="chartWaitingTime" class="mt-2 h-20"></canvas>
                </div>
            </section>

            <!-- Actions Section -->
            <div class="mt-8">
                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <i class="fa fa-question-circle mr-2"></i>Help
                    </button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fa fa-file-pdf mr-2"></i>Export as PDF
                    </button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fa fa-file-excel mr-2"></i>Export as Excel
                    </button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fa fa-file-csv mr-2"></i>Export as CSV
                    </button>
                </div>
            </div>
        </div>
    </div>

<script src="../../assets/js/analytics.js" type="text/javascript"></script>

</body>
</html>