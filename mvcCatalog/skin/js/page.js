const footerSections = document.querySelectorAll('.footer-section');

footerSections.forEach(section => {
  const sectionTitle = section.querySelector('h2');
  const sectionContent = section.querySelector('.section-content'); // Adjust selector as needed

  sectionTitle.addEventListener('click', () => {
    sectionContent.classList.toggle('hidden'); // Use your desired hidden class
  });
});