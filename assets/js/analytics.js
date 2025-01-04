// Function to generate sample charts
function createChart(canvasId, type, labels, data, colors) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
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

// Function to fetch data from the backend
function chartTotalPatients() {
    fetch('http://localhost/medical-appointment/handler/active_patients.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Extract data from the response
            const activePatients = data['Active patients'];
            const inactivePatients = data['In active patients'];

            // Store the array in localStorage as a JSON string
            localStorage.setItem('patientData', JSON.stringify([activePatients, inactivePatients]));

            // Update the HTML content dynamically
            document.getElementById('totalActivePatients').textContent = activePatients + inactivePatients;

            // Create the chart with the fetched data
            createChart(
                'chartActivePatients',
                'pie',
                ['Active', 'In Active'],
                [activePatients, inactivePatients],
                ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)']
            );
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

// Function to fetch data from the backend
function chartTotalLastMonthAppointments() {
    fetch('http://localhost/medical-appointment/handler/last_month_appointments.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Extract data from the response
            const totalAppointmentLastMonth = data['Total appointments last Month'];
            const weekOne = data['Week 1'];
            const weekTwo = data['Week 2'];
            const weekThree = data['Week 3'];
            const weekFour = data['Week 4'];


            // Store the array in localStorage as a JSON string
            localStorage.setItem('patientData', JSON.stringify([totalAppointmentLastMonth]));

            // Update the HTML content dynamically
            document.getElementById('totalAppointmentsLastMonth').textContent = totalAppointmentLastMonth;

            // Create the chart with the fetched data
            createChart(
                'chartLastMonth',
                'pie',
                ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                [weekOne, weekTwo, weekThree, weekFour],
                 ['rgba(39,177,182,0.5)', 'rgba(92,183,163,0.5)', 'rgba(78,155,87,0.5)', 'rgba(187,80,199,0.5)']
            );
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

chartTotalPatients();
chartTotalLastMonthAppointments();

// Sample charts for other cards
// createChart('chartLastMonth', 'bar', ['Week 1', 'Week 2', 'Week 3', 'Week 4'], [300, 400, 320, 200], ['rgba(75, 192, 192, 0.5)']);
createChart('chartLastYear', 'line', ['Q1', 'Q2', 'Q3', 'Q4'], [3500, 4000, 3700, 4360], ['rgba(255, 206, 86, 0.5)']);
createChart('chartToday', 'doughnut', ['Morning', 'Afternoon', 'Evening'], [25, 30, 20], ['rgba(153, 102, 255, 0.5)', 'rgba(255, 159, 64, 0.5)', 'rgba(54, 162, 235, 0.5)']);
createChart('chartTotalPatients', 'bar', ['Jan', 'Feb', 'Mar', 'Apr'], [800, 900, 700, 750], ['rgba(255, 99, 132, 0.5)']);
createChart('chartWaitingTime', 'radar', ['Reception', 'Consultation', 'Pharmacy'], [5, 8, 2], ['rgba(54, 162, 235, 0.5)']);
