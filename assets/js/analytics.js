// Global object to store chart instances
const chartInstances = {};

function createChart(canvasId, type, labels, label = '', data, colors, borderColors = null) {
    // Destroy existing chart instance if it exists
    if (chartInstances[canvasId]) {
        chartInstances[canvasId].destroy();
    }

    const canvas = document.getElementById(canvasId);
    // Reset canvas dimensions to prevent height increments
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    const ctx = canvas.getContext('2d');
    chartInstances[canvasId] = new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: colors,
                borderColor: borderColors || colors.map(color => color.replace('0.5', '1')),
                borderWidth: type === 'line' ? 2 : 1,
                tension: 0.4 // Smooth curves for line charts
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 15,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFont: { size: 14 },
                    bodyFont: { size: 12 },
                    bodySpacing: 5,
                    padding: 10,
                    cornerRadius: 5
                },
                title: {
                    display: false,
                    text: `${label} Overview`,
                    font: {
                        size: 16,
                        weight: 'bold'
                    },
                    color: '#333',
                    padding: { top: 10, bottom: 10 }
                }
            },
            elements: {
                bar: {
                    borderRadius: 5
                }
            },
            scales: type === 'line' || type === 'bar' ? {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 12 }, color: '#555' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { font: { size: 12 }, color: '#555' },
                    grid: { color: 'rgba(200, 200, 200, 0.3)' }
                }
            } : undefined
        }
    });
}


// Utility function to fetch data from the backend
async function fetchData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Error fetching data: ${response.statusText}`);
        }
        return await response.json();
    } catch (error) {
        console.error(error);
        return null; // Return null if an error occurs
    }
}

// Function to handle Total Patients chart
async function handleTotalPatientsChart() {
    const data = await fetchData('http://localhost/medical-appointment/handler/active_patients.php');
    if (!data) return;

    const activePatients = data['Active patients'];
    const inactivePatients = data['In active patients'];

    document.getElementById('totalActivePatients').textContent = activePatients + inactivePatients;

    createChart(
        'chartActivePatients',
        'doughnut',
        ['Active', 'Inactive'],
        'Patients',
        [activePatients, inactivePatients],
        [
            'rgba(54, 162, 235, 0.8)', // Active
            'rgba(255, 99, 132, 0.8)'  // Inactive
        ]
    );
}

// Function to handle Last Month Appointments chart
async function handleLastMonthAppointmentsChart() {
    const data = await fetchData('http://localhost/medical-appointment/handler/last_month_appointments.php');
    if (!data) return;

    const totalAppointments = data['Total appointments last Month'];
    const weeks = [data['Week 1'], data['Week 2'], data['Week 3'], data['Week 4']];

    document.getElementById('totalAppointmentsLastMonth').textContent = totalAppointments;

    createChart(
        'chartLastMonth',
        'line',
        ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        'Appointments',
        weeks,
        ['rgba(39, 177, 182, 0.7)']
    );
}

// Function to handle Last Year Appointments chart
async function handleLastYearAppointmentsChart() {
    const data = await fetchData('http://localhost/medical-appointment/handler/last_year_appointments.php');
    if (!data) return;

    const totalAppointments = data['Total appointments last year'];
    const quarters = [data['Q1'], data['Q2'], data['Q3'], data['Q4']];

    document.getElementById('totalAppointmentsLastYear').textContent = totalAppointments;

    createChart(
        'chartLastYear',
        'bar',
        ['Q1', 'Q2', 'Q3', 'Q4'],
        'Appointments',
        quarters,
        [
            'rgba(31, 77, 241, 0.7)',
            'rgba(34, 139, 34, 0.7)',
            'rgba(255, 165, 0, 0.7)',
            'rgba(255, 69, 0, 0.7)'
        ]
    );
}

// Function to handle today's Appointments chart
async function handleAppointmentsTodayChart() {
    const data = await fetchData('http://localhost/medical-appointment/handler/appointments_today.php');
    if (!data) return;

    const totalAppointments = data['Total appointments today'];
    const sessions = [data['Morning'], data['Afternoon'], data['Evening'], data['Night']];

    document.getElementById('totalAppointmentsToday').textContent = totalAppointments;

    createChart(
        'chartToday',
        'polarArea',
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
}

// Initialize static charts
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
    handleAppointmentsTodayChart();
    initializeStaticCharts();
}

// Call the initializer
initializeCharts();