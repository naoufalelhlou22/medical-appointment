function sendAppointmentData() {
// Step 1: Patient Information
    const fullName = document.getElementById('full-name').value;
    const dob = document.getElementById('dob').value;
    const gender = document.getElementById('gender').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;

    // Step 2: Appointment Details
    const reason = document.getElementById('reason').value;
    const preferredDateTime = document.getElementById('preferred-date-time').value;
    const doctor = document.getElementById('doctor').value;

    // Step 3: Medical Information
    const symptoms = document.getElementById('symptoms').value;
    const medicalReports = document.getElementById('medical-reports').files[0]; // File input
    const insuranceInfo = document.getElementById('insurance-info').value;

    // Prepare the data to send in JSON format
    const appointmentData = {
        patient_info: {
            full_name: fullName,
            date_of_birth: dob,
            gender: gender,
            phone: phone,
            email: email
        },
        appointment_details: {
            reason_for_visit: reason,
            preferred_date_time: preferredDateTime,
            doctor: doctor
        },
        medical_info: {
            symptoms: symptoms,
            medical_reports: medicalReports ? medicalReports.name : null, // Send file name, you might want to handle file uploads separately
            insurance_info: insuranceInfo
        }
    };

    // Send the data to PHP using Fetch API
    fetch('http://localhost/medical-appointment/app/fetch.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(appointmentData)
    })
        .then(response => {
            // Check if the response is successful
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            // Handle success...
        })
        .catch(error => {
            console.error('Error:', error);
            // Log response body to see what is returned
            error.text().then(errorBody => console.log(errorBody));
            alert('There was an error submitting your appointment.');
        });
}
