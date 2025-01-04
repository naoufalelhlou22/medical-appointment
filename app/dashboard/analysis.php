<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <?php require ('../../includes/header.php') ?>

    <div class="container mx-auto my-5">
        <header class="text-center py-4 mb-5 bg-blue-500 text-white rounded shadow">
            <h1 class="text-2xl font-bold">Medical Dashboard</h1>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Total Patients</h2>
                <p id="totalActivePatients" class="text-3xl font-bold text-blue-500"></p>
                <canvas id="chartActivePatients" class="mt-4"></canvas>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Total Appointments Last Month</h2>
                <p id="totalAppointmentsLastMonth" class="text-3xl font-bold text-blue-500"></p>
                <canvas id="chartLastMonth" class="mt-4"></canvas>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Total Appointments Last Year</h2>
                <p id="totalAppointmentsLastYear" class="text-3xl font-bold text-blue-500"></p>
                <canvas id="chartLastYear" class="mt-4"></canvas>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Total Appointments Today</h2>
                <p id="totalAppointmentsToday" class="text-3xl font-bold text-blue-500"></p>
                <canvas id="chartToday" class="mt-4"></canvas>
            </div>

            <!-- Card 5 -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Total Patients Come to Hospital</h2>
                <p class="text-3xl font-bold text-purple-500">3,150</p>
                <canvas id="chartTotalPatients" class="mt-4"></canvas>
            </div>

            <!-- More Cards -->
            <div class="bg-white p-4 rounded shadow text-center">
                <h2 class="text-lg font-semibold">Average Waiting Time</h2>
                <p class="text-3xl font-bold text-gray-700">15 mins</p>
                <canvas id="chartWaitingTime" class="mt-4"></canvas>
            </div>
        </section>
    </div>
</div>

<script src="../../assets/js/analytics.js" type="text/javascript"></script>
</body>
</html>
