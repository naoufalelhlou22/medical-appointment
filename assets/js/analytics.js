// Utility function to create a chart
function createChart(canvasId, type, labels, label = '', data, colors) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: colors,
                borderColor: colors.map(color => color.replace('0.5', '1')),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });
}

// Utility function to fetch data from the backend
function fetchData(url) {
    return fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            return null; // Return null if an error occurs
        });
}

// Function to handle Total Patients chart
function handleTotalPatientsChart() {
    fetchData('http://localhost/medical-appointment/handler/active_patients.php')
        .then(data => {
            if (!data) return; // Exit if data fetch failed

            const activePatients = data['Active patients'];
            const inactivePatients = data['In active patients'];
            const totalPatients = activePatients + inactivePatients;

            // Update UI
            document.getElementById('totalActivePatients').textContent = totalPatients;

            // Create chart
            createChart(
                'chartActivePatients',
                'pie',
                ['Active', 'Inactive'],
                'Patients',
                [activePatients, inactivePatients],
                ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)']
            );
        });
}

// Function to handle Last Month Appointments chart
function handleLastMonthAppointmentsChart() {
    fetchData('http://localhost/medical-appointment/handler/last_month_appointments.php')
        .then(data => {
            if (!data) return; // Exit if data fetch failed

            const totalAppointments = data['Total appointments last Month'];
            const weeks = [data['Week 1'], data['Week 2'], data['Week 3'], data['Week 4']];

            // Update UI
            document.getElementById('totalAppointmentsLastMonth').textContent = totalAppointments;

            // Create chart
            createChart(
                'chartLastMonth',
                'bar',
                ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                'Appointments',
                weeks,
                ['rgba(39, 177, 182, 0.5)']
            );
        });
}

// Function to handle Last Year Appointments chart
function handleLastYearAppointmentsChart() {
    fetchData('http://localhost/medical-appointment/handler/last_year_appointments.php')
        .then(data => {
            if (!data) return; // Exit if data fetch failed

            const totalAppointments = data['Total appointments last year'];
            const quarters = [data['Q1'], data['Q2'], data['Q3'], data['Q4']];

            // Update UI
            document.getElementById('totalAppointmentsLastYear').textContent = totalAppointments;

            // Create chart
            createChart(
                'chartLastYear',
                'line',
                ['Q1', 'Q2', 'Q3', 'Q4'],
                'Appointments',
                quarters,
                ['rgba(31,77,241,0.5)']
            );
        });
}

// Function to handle today Appointments chart
function handleAppointmentsTodayChart() {
    fetchData('http://localhost/medical-appointment/handler/appointments_today.php')
        .then(data => {
            if (!data) return; // Exit if data fetch failed

            const totalAppointments = data['Total appointments today'];
            const sessions = [data['Morning'], data['Afternoon'], data['Evening'], data['Night']];

            // Update UI
            document.getElementById('totalAppointmentsToday').textContent = totalAppointments;

            // Create chart
            createChart(
                'chartToday',
                'doughnut',
                ['Morning', 'Afternoon', 'Evening', 'Night'],
                'Appointments',
                sessions,
                [
                    'rgba(255, 223, 186, 0.7)', // Morning
                    'rgba(255, 159, 64, 0.7)',  // Afternoon
                    'rgba(153, 102, 255, 0.7)', // Evening
                    'rgba(54, 54, 235, 0.7)'    // Night
                ]
            );
        });
}

// Function to initialize static charts
function initializeStaticCharts() {
    createChart(
        'chartTotalPatients',
        'bar',
        ['Jan', 'Feb', 'Mar', 'Apr'],
        'Monthly Patients',
        [800, 900, 700, 750],
        ['rgba(255, 99, 132, 0.5)']
    );

    createChart(
        'chartWaitingTime',
        'radar',
        ['Reception', 'Consultation', 'Pharmacy'],
        'Waiting Time (mins)',
        [5, 8, 2],
        ['rgba(54, 162, 235, 0.5)']
    );
}

// Initialize all charts
function initializeCharts() {
    handleTotalPatientsChart();
    handleLastMonthAppointmentsChart();
    handleLastYearAppointmentsChart();
    handleAppointmentsTodayChart()
    initializeStaticCharts();
}

// Call the initializer
initializeCharts();
