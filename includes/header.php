<?php

CONST PATH = "../app/dashboard/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Medical Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

<div class="min-h-screen flex">
    <!-- Left Menu (Header) -->
    <div class="w-64 bg-blue-800 text-white flex flex-col fixed h-screen">
        <!-- Logo -->
        <div class="p-6 text-2xl font-bold text-center">
            <img
                    src="http://localhost/medical-appointment/assets/images/dashboard-logo.png"
                    alt="clinic logo"
                    class="w-60 h-auto mx-auto" />
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1">
            <ul class="space-y-2">
                <li>
                    <a href="<?php PATH ?>analysis.php" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?php PATH ?>appointments-list.php" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-calendar-check mr-2"></i>View Appointments
                    </a>
                </li>
                <li>
                    <a href="<?php PATH ?>patient-management.php" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-users mr-2"></i>Patients
                    </a>
                </li>
                <li>
                    <a href="<?php PATH ?>add-appointment.php" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-calendar-alt mr-2"></i>Add Appointment
                    </a>
                </li>
                <li>
                    <a href="#" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-calendar-alt mr-2"></i>Calendar
                    </a>
                </li>
                <li>
                    <a href="#" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-chart-line mr-2"></i>Reports
                    </a>
                </li>
                <li>
                    <a href="#" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-file-invoice-dollar mr-2"></i>Billing
                    </a>
                </li>
                <li>
                    <a href="<?php PATH ?>profile.php" class="block p-4 hover:bg-blue-700">
                        <i class="fas fa-cog mr-2"></i>Settings
                    </a>
                </li>
            </ul>
        </nav>

        <!-- User Profile -->
        <div class="p-4 border-t border-blue-700">
            <div class="flex items-center">
<!--                <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">-->
                <div class="ml-3">
                    <p class="text-sm font-semibold">John Doe</p>
                    <p class="text-xs text-gray-300">Admin</p>
                </div>
            </div>
        </div>
    </div>