// Lab 8: JSON & AJAX
// Loads project data dynamically and displays it

$(document).ready(function () {

  fetch('projects.json')
    .then(response => response.json())
    .then(data => {

      const container = $('#projects-container');

      data.projects.forEach(project => {

        const item = `
          <h3>${project.title}</h3>
          <div>
            <p>${project.description}</p>
            <a href="../${project.link}">View Project</a>
          </div>
        `;

        container.append(item);
      });

      // jQuery UI accordion
      $('#projects-container').accordion();

      // jQuery effect
      $('h3').hide().fadeIn(1000);

      // BONUS: generate RSS
      generateRSS(data);

    })
    .catch(error => {
      console.error('Error loading JSON:', error);
      $('#projects-container').html('<p>Error loading projects.</p>');
    });

});


// BONUS: RSS generator
function generateRSS(data) {

  let rss = `<?xml version="1.0"?>
  <rss version="2.0">
  <channel>
    <title>My ITWS Labs</title>
    <description>My lab projects</description>`;

  data.projects.forEach(project => {
    rss += `
      <item>
        <title>${project.title}</title>
        <description>${project.description}</description>
        <link>${project.link}</link>
      </item>`;
  });

  rss += `
    </channel>
  </rss>`;

  console.log(rss);
}