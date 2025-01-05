<?php

CONST PATH = "../app/dashboard/";

?>
<!-- Header -->
<header class="bg-blue-600 text-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo and Dashboard Title -->
        <div class="flex items-center space-x-4">
            <h1 class="text-2xl font-bold">Doctor Dashboard</h1>
        </div>

        <!-- Navigation Menu -->
        <nav class="hidden md:flex space-x-6">
            <ul class="flex space-x-6">
                <li><a href="<?php PATH; ?>analysis.php" class="hover:underline hover:text-blue-200 transition duration-300">Analysis</a></li>
                <li><a href="<?php PATH; ?>appointments-list.php" class="hover:underline hover:text-blue-200 transition duration-300">Appointments List</a></li>
                <li><a href="<?php PATH; ?>edit-appointment.php" class="hover:underline hover:text-blue-200 transition duration-300">Edit Appointments</a></li>
                <li><a href="<?php PATH; ?>add-appointment.php" class="hover:underline hover:text-blue-200 transition duration-300">Add Appointment</a></li>
                <li><a href="<?php PATH; ?>patient-management.php" class="hover:underline hover:text-blue-200 transition duration-300">Patient Management</a></li>
                <li><a href="<?php PATH; ?>profile.php" class="hover:underline hover:text-blue-200 transition duration-300">Profile</a></li>
            </ul>
        </nav>

        <!-- Right Section: Notifications and Logout -->
        <div class="flex items-center space-x-6">
            <!-- Notification Icon and Dropdown -->
            <div class="relative">
                <button id="notificationButton" class="relative p-2 text-white hover:text-blue-200 focus:outline-none transition duration-300">
                    <i class="fas fa-bell text-xl"></i>
                    <!-- Notification Badge -->
                    <span id="notificationBadge" class="hidden absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">0</span>
                </button>

                <!-- Notification Dropdown -->
                <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg z-50">
                    <div id="notificationContent" class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Notifications</h3>
                        <p class="text-sm text-gray-500 mt-2">Fetching notifications...</p>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <a href="<?php echo PATH; ?>logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Logout</a>
        </div>
    </div>
</header>

<!-- Script for Notification Dropdown -->
<script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const notificationBadge = document.getElementById('notificationBadge');
    const notificationContent = document.getElementById('notificationContent');

    // Toggle notification dropdown
    notificationButton.addEventListener('click', () => {
        notificationDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!notificationButton.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.classList.add('hidden');
        }
    });

    // Fetch notifications dynamically
    async function fetchNotifications() {
        try {
            const response = await fetch('<?php echo PATH; ?>get-notifications.php');
            const notifications = await response.json();

            if (notifications.unreadCount > 0) {
                notificationBadge.classList.remove('hidden');
                notificationBadge.textContent = notifications.unreadCount;
            }

            if (notifications.items.length > 0) {
                notificationContent.innerHTML = `
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Notifications</h3>
                    <ul class="mt-4 space-y-2">
                        ${notifications.items.map(notification => `
                            <li class="text-sm text-gray-700 dark:text-gray-300 flex items-start">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mt-2 mr-2"></span>
                                <span>${notification.message}</span>
                            </li>
                        `).join('')}
                    </ul>
                    <div class="mt-4 text-center">
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-400">View All Notifications</a>
                    </div>
                `;
            } else {
                notificationContent.innerHTML = `
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Notifications</h3>
                    <p class="text-sm text-gray-500 mt-2">No new notifications.</p>
                `;
            }
        } catch (error) {
            notificationContent.innerHTML = `
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Notifications</h3>
                <p class="text-sm text-red-500 mt-2">Error fetching notifications.</p>
            `;
            console.error('Error fetching notifications:', error);
        }
    }

    // Fetch notifications on page load
    document.addEventListener('DOMContentLoaded', fetchNotifications);
</script>