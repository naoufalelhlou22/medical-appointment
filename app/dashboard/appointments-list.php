<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

    <?php require_once '../../includes/header.php'?>

    <!-- Main Content -->
    <div class="flex-1 ml-64 relative">
        <!-- Top Bar -->
        <div class="bg-white p-4 shadow-md fixed w-full z-10">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">Appointments List</h1>
                <div class="flex items-center space-x-4">
                    <!-- Notification Button -->
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 relative">
                        <i class="fas fa-bell"></i>
                        <!-- Notification Badge -->
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                    </button>
                    <!-- User Profile Button -->
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="container mx-auto p-4 mt-20 items-center">
            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full items-center">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 text-sm uppercase items-center">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Full Name</th>
                        <th class="py-3 px-4">Phone Number</th>
                        <th class="py-3 px-4">Date of Birth</th>
                        <th class="py-3 px-4">Reason for Visit</th>
                        <th class="py-3 px-4">Doctor</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="appointments-table-body" class="text-gray-700">
                    <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Buttons -->
        <div class="flex justify-center items-center space-x-4 fixed bottom-0 left-64 w-[calc(100%-16rem)] bg-white py-4 shadow-md">
            <button id="back-button" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                Back
            </button>
            <div id="pagination-buttons" class="flex space-x-2"></div>
            <button id="next-button" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Next
            </button>
        </div>
    </div>
    <script>
        let currentPage = 1; // Track the current page
        const rowsPerPage = 13; // Number of rows per page

        // Function to fetch appointment data from the server for the current page
        function fetchAppointmentData() {
            fetch(`http://localhost/medical-appointment/handler/fetch_all_appointments.php`)
                .then(response => response.json())
                .then(data => {
                    const appointmentsTableBody = document.getElementById('appointments-table-body');
                    appointmentsTableBody.innerHTML = ''; // Clear existing rows
                    const start = (currentPage - 1) * rowsPerPage;
                    const end = start + rowsPerPage;
                    const currentAppointments = data.appointments.slice(start, end); // Paginate data

                    if (currentAppointments.length > 0) {
                        currentAppointments.forEach(appointment => {
                            const row = document.createElement('tr');
                            row.classList.add('border-b', 'border-gray-200', 'hover:bg-gray-50');
                            let statusColor = 'gray';
                            if (appointment.status === 'Confirmed') statusColor = 'green';
                            else if (appointment.status === 'Pending') statusColor = 'yellow';
                            else if (appointment.status === 'Cancelled') statusColor = 'red';

                            row.innerHTML = `
                            <td class="py-3 px-4">${appointment.id}</td>
                            <td class="py-3 px-4">${appointment.full_name}</td>
                            <td class="py-3 px-4">${appointment.phone}</td>
                            <td class="py-3 px-4">${appointment.date_of_birth}</td>
                            <td class="py-3 px-4">${appointment.reason_for_visit}</td>
                            <td class="py-3 px-4">${appointment.doctor}</td>
                            <td class="py-3 px-4">
                                <span class="bg-${statusColor}-100 text-${statusColor}-800 text-sm px-2 py-1 rounded">${appointment.status}</span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="view-appointments.php?id=${appointment.id}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a onclick="sendIdToBackend(${appointment.id})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 ml-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        `;
                            appointmentsTableBody.appendChild(row);
                        });
                    } else {
                        appointmentsTableBody.innerHTML = `
                        <tr>
                            <td colspan="8" class="py-4 px-4 text-center text-gray-500">No appointments found.</td>
                        </tr>
                    `;
                    }
                    updatePageNumber(data.appointments.length); // Update page number and buttons
                })
                .catch(error => console.error('Error fetching appointment data:', error));
        }

        // Function to update page number display and enable/disable buttons
        function updatePageNumber(totalRows) {
            const paginationButtons = document.getElementById('pagination-buttons');
            const backButton = document.getElementById('back-button');
            const nextButton = document.getElementById('next-button');
            const totalPages = Math.ceil(totalRows / rowsPerPage);

            // Update Back and Next button states
            backButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;

            // Clear existing page numbers
            paginationButtons.innerHTML = '';

            // Helper to create ellipsis
            const createEllipsis = () => {
                const ellipsis = document.createElement('span');
                ellipsis.textContent = '...';
                ellipsis.classList.add('px-2', 'text-gray-600');
                paginationButtons.appendChild(ellipsis);
            };

            // Helper to create a page button
            const createPageButton = (pageNumber, isActive) => {
                const pageButton = document.createElement('button');
                pageButton.textContent = pageNumber;
                pageButton.classList.add(
                    'px-3',
                    'py-1',
                    'rounded',
                    isActive ? 'bg-blue-600' : 'bg-gray-300',
                    isActive ? 'text-white' : 'text-gray-800',
                    'hover:bg-blue-500',
                    'transition',
                    'duration-300'
                );
                if (!isActive) {
                    pageButton.addEventListener('click', () => {
                        currentPage = pageNumber;
                        fetchAppointmentData();
                    });
                }
                paginationButtons.appendChild(pageButton);
            };

            // Always show the first page
            createPageButton(1, currentPage === 1);

            // Add ellipsis after the first page if needed
            if (currentPage > 3) {
                createEllipsis();
            }

            // Show pages around the current page
            const startPage = Math.max(2, currentPage - 1);
            const endPage = Math.min(totalPages - 1, currentPage + 1);

            for (let i = startPage; i <= endPage; i++) {
                createPageButton(i, currentPage === i);
            }

            // Add ellipsis before the last page if needed
            if (currentPage < totalPages - 2) {
                createEllipsis();
            }

            // Always show the last page
            if (totalPages > 1) {
                createPageButton(totalPages, currentPage === totalPages);
            }
        }

        // Event listeners for Back and Next buttons
        document.getElementById('next-button').addEventListener('click', () => {
            currentPage++;
            fetchAppointmentData();
        });

        document.getElementById('back-button').addEventListener('click', () => {
            currentPage--;
            fetchAppointmentData();
        });

        // Initial call to fetch data and update pagination
        fetchAppointmentData();


        // Helper function to create a page button
        function createPageButton(pageNumber, isActive) {
            const pageButton = document.createElement('button');
            pageButton.textContent = pageNumber;
            pageButton.classList.add(
                'px-3',
                'py-1',
                'rounded',
                isActive ? 'bg-blue-600' : 'bg-gray-300',
                isActive ? 'text-white' : 'text-gray-800',
                'hover:bg-blue-500',
                'transition',
                'duration-300'
            );
            pageButton.addEventListener('click', () => {
                currentPage = pageNumber;
                fetchAppointmentData();
            });
            document.getElementById('pagination-buttons').appendChild(pageButton);
        }


        // Event listeners for Back and Next buttons
        document.getElementById('next-button').addEventListener('click', () => {
            currentPage++;
            fetchAppointmentData();
        });

        document.getElementById('back-button').addEventListener('click', () => {
            currentPage--;
            fetchAppointmentData();
        });

        // Call the fetch function on page load
        fetchAppointmentData();

        // Function to send ID to backend (for edit functionality)
        function sendIdToBackend(id) {
            console.log("Edit appointment with ID:", id);
        }
    </script>

</body>
</html>