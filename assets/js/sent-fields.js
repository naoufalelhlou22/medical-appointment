// Function to send appointment data, including medical information and file upload
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
            medical_reports: null, // Initialize with null, it will be updated after file upload
            insurance_info: insuranceInfo
        }
    };

    // Send the medical info, including the file, asynchronously before sending the full appointment data
    submitMedicalInfo().then(fileName => {
        appointmentData.medical_info.medical_reports = fileName; // Assign the file name after upload

        // Send the final appointment data to the PHP backend using Fetch API
        fetch('http://localhost/medical-appointment/handler/set-appointment-data.php', {
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

    }).catch(error => {
        console.error('File upload error:', error);
        alert('File upload failed. Please try again.');
    });
}

// Function to handle the file upload for medical reports and return the file name
async function submitMedicalInfo() {
    const medicalReports = document.getElementById('medical-reports').files[0];

    let fileName = medicalReports ? medicalReports.name : null;  // Default to the file name if no upload happens

    // If a file is selected, upload it and get the file name
    if (medicalReports) {
        const fileFormData = new FormData();
        fileFormData.append('medical_reports', medicalReports);

        try {
            const fileResponse = await fetch('http://localhost/medical-appointment/handler/file-upload.php', {
                method: 'POST',
                body: fileFormData
            });

            // Parse the JSON response
            const fileResult = await fileResponse.json();

            // Extract the value of 'file_name' (not the key)
            fileName = fileResult['file_name'];  // Using bracket notation
            console.log("File uploaded successfully, File Name:", fileName);
        } catch (error) {
            alert('File upload failed. Please try again.');
            throw new Error('File upload failed');
        }
    }

    // Return the file name for later use
    return fileName;
}

// Attach to the submit button
document.getElementById('submitButton').addEventListener('click', sendAppointmentData);
