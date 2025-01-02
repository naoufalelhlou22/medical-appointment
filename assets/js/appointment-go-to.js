function goToStep(step) {
    const sections = document.querySelectorAll('.form-section');
    sections.forEach(section => section.classList.add('hidden'));
    const currentSection = document.getElementById(`step-${step}`);
    currentSection.classList.remove('hidden');
}
goToStep(1);
