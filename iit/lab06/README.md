Lab 06:

This lab helped me understand how jQuery handles events, especially with dynamic elements. I learned how to use methods like fadeIn, fadeOut, and fadeToggle to control how elements appear and disappear on the page.

One important issue came up in Problem 5. When I added a new list item using append(), the new item did not respond to clicks like the original list items. The reason for this is because the click event was only attached to the list items that existed when the page first loaded. Any new elements added later do not automatically inherit those event listeners.

To fix this, I used event delegation with the .on() method. Instead of attaching the click event directly to each <li>, I attached it to the parent element (#labList) and specified that it should listen for clicks on its child <li> elements. This allows both existing and newly added list items to respond to clicks correctly.

Overall, this lab showed me the difference between static and dynamic elements, and how to properly handle events when elements are created after the page loads.

Azure link: http://collid7rpi.eastus.cloudapp.azure.com/lab06/lab6.html

