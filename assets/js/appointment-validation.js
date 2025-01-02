function goToStep(step) {
    // Validate the current step's fields before moving to the next step
    if (step === 2) {
        // Step 1 validation
        const fullName = document.getElementById("full-name").value;
        const dob = document.getElementById("dob").value;
        const gender = document.getElementById("gender").value;
        const phone = document.getElementById("phone").value;
        const email = document.getElementById("email").value;

        if (!fullName || !dob || !gender || !phone || !email) {
            alert("Please fill out all required fields.");
            return; // Stop and prevent moving to the next step
        }
    } else if (step === 3) {
        // Step 2 validation
        const reason = document.getElementById("reason").value;
        const preferredDateTime = document.getElementById("preferred-date-time").value;
        const doctor = document.getElementById("doctor").value;

        if (!reason || !preferredDateTime || !doctor) {
            alert("Please fill out all required fields.");
            return; // Stop and prevent moving to the next step
        }
    } else if (step === 4) {
        // Step 3 validation
        const symptoms = document.getElementById("symptoms").value;
        const medicalReports = document.getElementById("medical-reports").value;
        const insuranceInfo = document.getElementById("insurance-info").value;

        if (!symptoms || !insuranceInfo) {  // medicalReports is optional
            alert("Please fill out all required fields.");
            return; // Stop and prevent moving to the next step
        }
    }

    // Hide all steps
    const allSteps = document.querySelectorAll('.form-section');
    allSteps.forEach(step => step.classList.add('hidden'));

    // Show the requested step
    const stepToShow = document.getElementById(`step-${step}`);
    stepToShow.classList.remove('hidden');
}