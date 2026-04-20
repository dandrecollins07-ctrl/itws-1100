# ITWS 1100 — Quiz 2 (Spring 2026)

**Name:** _D'Andre Collins_

<span style="color:blue;">

## 1. Technology — Coding

a. Change whatever is necessary to ensure the file adheres to HTML5 syntax.  
The file was originally written in XHTML instead of HTML5. The doctype was changed to <!DOCTYPE html>, the xmlns and xml:lang attributes were removed, and self closing syntax like <meta /> and <link /> was corrected to standard HTML5 format.

b. Connect your HTML file to jQuery via CDN (use the latest 3.x version).  
The HTML file was connected to jQuery using a CDN by adding a script tag that links to the latest 3.x version of jQuery. This script was placed above the quiz2.js file so jQuery loads before any custom JavaScript.

c. Add your full name in an <h4> tag below the existing <h1> tag.  
A new <h4> tag was added directly under the <h1> to display my full name, D’Andre Collins.

d. Add additional tagging that can be used to identify and target your last name specifically.  
A span tag with a class was added around my last name so it can be targeted specifically. This allows JavaScript and CSS to apply effects only to “Collins”.

e. Add a <button> at the bottom of the page with an id of your choosing, labeled “Go”.  
A button was added at the bottom of the page with an id of goButton and labeled “Go” so it can be used for interaction in JavaScript.

---

## 2. Technology — Description

a. Compare vanilla JS and jQuery approaches.  
Selecting elements differs in syntax and efficiency. In JavaScript, you use methods like document.getElementByID(“firstName”). In jQuery, you would use $(“firstName”). jQuery is shorter and consistent, which makes it much more readable. Hiding and showing elements also differs. In JavaScript, you manually change styles such as element.style.display = “none” or “block”. In jQuery, you use built in methods like .hide() and .show(), which are faster to write and easier to read. The $(document).ready() pattern makes sure your code runs after the DOM fully loads. You use it so your script can safely access elements like buttons and text. Without it, your code may fail because the elements do not exist yet when the script runs. The $ symbol in jQuery is used as a shortcut for selecting elements and running jQuery functions. If another library uses $, you switch to jQuery instead or use jQuery.noConflict() to avoid conflicts.

b. Explain what is happening in the code samples.  
The first thing that happens is the block uses $(document).ready() to ensure that the code runs AFTER the page loads. Inside this function, there are two scoring variables being used to determine what is a passing grade versus a failing grade. After that it follows with an if statement that checks if the score was above the passing grade. If it was it would output a text stating “You passed!” along with changing the color to green. However, if the condition was false, it would display “Try again.” in red. A potential issue is that if an element with id result does not exist, nothing will be displayed. After that, the highlight class defines a style. Changing various aspects of the font, and color. This class is not applied by default. The next block attaches a click event to all elements with the class .card. So, when a use clicks a card, $(this) targets the clicked elements and toggleClass(“highlight”) adds the highlight class if it is missing or removes if it is present. The user would see the card visually change on each click. One issue is that if no elements have the class .card, the event does nothing. The final CSS defines the layout. The sidebar grabs the full height, has a fixed width of 250 pixels, floats to the left, and clears other left floats. The .content section adds a left margin of 260 pixels to avoid overlapping the sidebar. The user would see a sidebar on the left and content shifted to the right. A potential issue is that float-based layouts can break if content sizes change or if clear is not handled properly.

c. Debugging process.  
If a classmate says their JavaScript code runs but nothing happens, my first step would be to open Developer Tools and check the Elements tab to confirm that the HTML element I want to change exists and has the correct id or class. If my JavaScript targets #goButton or .last-name and the HTML uses a different name, the code runs but nothing changes. My second step would be to use the Console to test selectors directly, such as $(“#goButton”) or document.getElementByID(“goButton”), to see whether the element is being found. If it returns nothing, the issue is usually the selector, the script timed incorrectly, or incorrect HTML. My third step would be to use the Sources tab and add breaks or simple console.log() statements inside the event handler to verify that the function runs when I click or hover. This tells me whether the problem is with the event trying to bind or with the code inside the function. In my labs, specifically lab 5, I had cases where the page loaded fine, but a click did nothing because the script was linked incorrectly. Checking the script link is usually the first step I proceed with and leads to a solution.

---

## 3. HCI & Case Studies

a. Interface design principles.  
The two main principles of interface design are consistency and feedback. Consistency means that your interface looks and behaves the same across different screens. Users should be able to see the same layouts and colors as they move through. In practice the same header, button styles, and page structure are used across all mockups. Feedback means the system responds to user actions, so they know what happened. In practice, this includes things like highlighting a selected option, showing a confirmation message, or changing a button state after a click.

In Lab 7, we used Canva to give a display of users for our future final project. We kept the same layout and visual style.

b. Kuehchic case applied to project.  
Critical path refers to the sequence of tasks that determines the total time of a project. If any task on this path is delayed, the entire project is delayed. Float refers to extra time a task has before it impacts the overall deadline. Tasks with float can be delayed without affecting the final delivery. In my group project, the critical path includes creating mockups, finalizing design decisions, implementing the frontend, and then integrating functionality. Each step depends on the previous one. If mockups are delayed, development can’t start. If development is delayed, testing and submission are pushed back.

The tightest constraint for our team is time. We have deadlines that we need to get to. To manage this, we have assigned roles on who is going to do what, and via the use of GitHub we can see when something is updated and committed. However, one thing we should start doing is setting our own deadlines to make sure this project comes out cleanly. 

One mistake the Kuechic team made was underestimating how task dependencies would affect their schedule. They planned tasks sequentially without fully accounting for how delays would compound. For example, regulatory compliance and test market evaluation extended the timeline because other tasks could not start until they finished. My team should avoid this by identifying dependencies early and planning around them. If one task blocks another, we need to prioritize it or overlap work when possible, to avoid delaying the whole project.

---

## 4. Development Workflow & AI Reflection

a. Workflow explanation.  
Your workflow has three environments. Your local machine is where you write and test code. You use VS Code, run Live Preview, and make changes to HTML, CSS, and JavaScript. GitHub acts as version control and backup. You commit your changes locally, then push them to GitHub so they are stored and tracked. Azure is your live server. You upload files from your local machine to /var/www/html so your site is accessible online. Changes move from local to GitHub using git add, commit, and push, and then from local to Azure using SCP or a similar transfer method.

If you run git checkout main with uncommitted changes, Git will try to switch branches but may stop you if the changes would be overwritten. If it allows the switch, your uncommitted changes follow you to the main branch. You would still see your files in the file explorer because they exist locally and are not deleted. Git only switches tracked versions, it does not remove uncommitted work unless it conflicts.

If someone pushes to GitHub but Azure still shows the old version, they forgot to redeploy to the server. Pushing to GitHub only updates the repository, it does not automatically update Azure. They need to either pull changes on the VM or reupload files to /var/www/html. Without this step, the live site stays unchanged.

Working on a separate branch like quiz2 keeps your work isolated. It prevents breaking the main version of the project. If everyone commits directly to main, conflicts increase, code can overwrite other work, and bugs can be introduced into the live version. Branching allows safe development and controlled merging.

b. Server root change.  
If the root changes from /var/www/html to /webserver/www, I would first update the Apache configuration file to point the DocumentRoot to the new directory. Then I would restart Apache so the changes take effect. In my deployment process, I would update my SCP commands to upload files to /webserver/www instead of the old path. If I use Git on the VM, I would ensure the repository is located in the new directory and pull updates there. I would also check file permissions using chmod and chown so Apache can read the files in the new location. Finally, I would review my code for any absolute paths that reference /var/www/html and update them to the new directory if needed.

c. AI reflection.  
In Lab 6, I used AI to understand jQuery event handling. I asked how to correctly use .click() and .hover() with $(document).ready(). The response showed clear examples and explained why the code must run after the DOM loads. I tested the code in my lab by clicking elements and confirming the behavior worked as expected. This helped me understand both the syntax and the timing of event binding.

There were times I chose not to use AI. In Lab 5, I worked through form validation logic on my own because I wanted to understand how conditions and input checks worked. It took longer, but I learned how to debug my own logic and fix mistakes without relying on external help.

My rule for using AI has changed. I now use AI when I am stuck on concepts or need clarification, but I avoid using it for full solutions right away. I try to solve the problem first, then use AI to confirm or refine my approach. This balance helps me learn while still being efficient.

</span>