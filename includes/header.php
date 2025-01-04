<?php

CONST path = "../app/dashboard/";

?>
<!-- Header -->
<header class="bg-blue-600 text-white p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">Doctor Dashboard</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="<?php path ?>analysis.php" class="hover:underline">Analysis</a></li>
                <li><a href="<?php path ?>appointments-list.php" class="hover:underline">Appointments List</a></li>
                <li><a href="<?php path ?>edit-appointment.php" class="hover:underline">Edit Appointments</a></li>
                <li><a href="<?php path ?>add-appointment.php" class="hover:underline">Add Appointment</a></li>
                <li><a href="<?php path ?>patient-management.php" class="hover:underline">Patient Management</a></li>
                <li><a href="<?php path ?>profile.php" class="hover:underline">Profile</a></li>
            </ul>
        </nav>
    </div>
</header>