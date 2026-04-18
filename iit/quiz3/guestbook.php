<form id="guestbook-form" action="submit.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required maxlength="100">

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Sign Guestbook</button>
</form>
