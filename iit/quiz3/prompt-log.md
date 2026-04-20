# Prompt Log — Quiz 3: Guestbook Feature

---

## Prompt 1 — Database Schema Design

**Prompt given:**
> I am building a guestbook feature for a website using PHP and MySQL.
> I need help designing the database table.
> Requirements:
> - Store visitor name
> - Store comment message
> - Store timestamp
> - Each entry should have a unique ID
>
> Give me:
> 1. A CREATE TABLE statement
> 2. Explanation of each column and why the data type was chosen
> 3. Any improvements or best practices I should consider

**What it returned:**
A CREATE TABLE statement with columns `id`, `name`, `message`, and `created_at`, along with explanations for each data type.

**What I kept:**
The full table structure. Using `TEXT` for the message made sense since comments can vary in length. `AUTO_INCREMENT` for the id and `DEFAULT CURRENT_TIMESTAMP` for created_at removed the need to manually manage those values in PHP.

**What I changed:**
Nothing in the schema. It already matched what I needed.

**What I threw away:**
A suggestion to add extra columns like status. That was not required for this assignment and would add unnecessary complexity.

---

## Prompt 2 — Basic Form + Structure

**Prompt given:**
> I need a simple HTML form for a guestbook using POST that submits to PHP. Explain how it works.

**What it returned:**
A basic form with `name` and `message` fields, using `method="POST"` and `action="submit.php"`.

**What I kept:**
The full form structure. I kept both `id` and `name` attributes since they serve different purposes. I also kept `required` and `maxlength` to match the database constraints.

**What I changed:**
Adjusted minor layout and structure to match my page.

**What I threw away:**
Extra HTML elements that were not needed for a simple form.

**Why POST:**
POST sends data in the request body instead of the URL. Since this form writes to a database, POST is the correct method and avoids exposing user input in the address bar.

---

## Prompt 3 — PHP Write Logic

**Prompt given:**
> Help me write PHP to receive form data, validate it, and insert it into MySQL using prepared statements.

**What it returned:**
A full `submit.php` file using `mysqli`, prepared statements, validation, and redirect logic.

**What I kept:**
The prepared statement pattern using `mysqli_prepare`, `bind_param`, and `execute`. I also kept `trim()` and validation checks to prevent empty input.

**What I changed:**
Moved the database connection into a separate `config.php` file instead of keeping it inside `submit.php`.

**What I threw away:**
The example that used direct string concatenation for SQL. That was only shown as an unsafe example and was never used.

**Key understanding:**
Prepared statements prevent SQL injection by separating SQL structure from user data. The database treats user input as data only, not executable SQL.

---

## Prompt 4 — Display Entries (Read Path)

**Prompt given:**
> Help me display guestbook entries using PHP and MySQL.

**What it returned:**
A SELECT query with `ORDER BY created_at DESC`, a loop using `mysqli_fetch_assoc`, and output using `htmlspecialchars()`.

**What I kept:**
The full query and loop structure. I also kept `htmlspecialchars()` to prevent XSS when displaying user input.

**What I changed:**
Adjusted the HTML structure slightly to match my layout and CSS classes like `.entry`.

**What I threw away:**
An earlier version using `SELECT *`. I switched to selecting only the needed columns.

**Key understanding:**
No prepared statement is needed here because the query does not use user input. `htmlspecialchars()` is critical to prevent script injection when displaying stored data.

---

## Prompt 5 — Client-side Enhancement (jQuery)

**Prompt given:**
> Add jQuery interactivity to improve the guestbook experience.

**What it returned:**
AJAX form submission, client-side validation, form clearing, and animation using `slideDown()`.

**What I kept:**
The AJAX submission using `$.ajax()`. It allows the form to submit without reloading the page. I also kept the animation and validation logic.

**What I changed:**
Adjusted error handling and integrated it with my page structure.

**What I threw away:**
Unsafe HTML string concatenation. I used safe methods to prevent XSS on the client side.

**Key understanding:**
AJAX improves user experience by avoiding page reloads. The backend still receives data the same way through `$_POST`.

---

## Prompt 6 — File Structure

**Prompt given:**
> Suggest a clean file structure for my guestbook project.

**What it returned:**
A structured layout separating PHP, JS, CSS, and config files.

**What I kept:**
The full structure. Each file has one responsibility:
- `guestbook.php` handles display
- `submit.php` handles inserts
- `config.php` handles database connection

**What I changed:**
Nothing structural. I organized everything inside the `quiz3/` folder.

**Key understanding:**
Separating responsibilities makes debugging easier and keeps the code organized.

---

## Prompt 7 — Deployment Awareness

**Prompt given:**
> What should I check when deploying PHP and MySQL to Azure?

**What it returned:**
A checklist including database setup, file paths, permissions, and common mistakes.

**What I kept:**
The use of `__DIR__` for includes and the permission commands for Apache.

**What I changed:**
Nothing major. I verified my database and table already existed.

**What I threw away:**
Suggestion to switch to PDO. I kept mysqli for consistency.

**Key understanding:**
Local and server environments are separate. The database and files must be set up manually on the server.

---

## Prompt 8 — Prep for break-it.md

**Prompt given:**
> Show examples of SQL injection and XSS vulnerabilities.

**What it returned:**
Examples of unsafe SQL queries and unsafe output, along with attack inputs and explanations.

**What I kept:**
Both SQL injection and XSS examples for my `break-it.md`.

**What I threw away:**
Extra examples not required by the assignment.

**Key understanding:**
SQL injection affects the write path. XSS affects the read path. Both must be handled correctly.

---

## Prompt 9 — Styling the Guestbook

**Prompt given:**
> Give me simple CSS to improve the look of my guestbook.

**What it returned:**
CSS for layout, form styling, and entry cards.

**What I kept:**
The container layout, form styling, and entry card design.

**What I changed:**
Adjusted spacing and matched class names with my HTML.

**Why:**
The goal was a clean and readable layout, not over-design.

---

## Prompt 10 — Debugging a Deployment Error

**Prompt given:**
> My page works locally but shows "Not Found" on Azure. How do I fix it?

**What it returned:**
Explanation that files were not uploaded, along with SCP instructions.

**What I used:**
The SCP command to upload my project to `/var/www/html/iit/`.

**What I changed:**
Ran SCP from the correct local directory. Initially I got a "No such file or directory" error because I was in the wrong path.

**Why:**
The issue was not code. The server simply did not have the files.

**Key understanding:**
Always verify files exist on the server before debugging code. Apache cannot serve files that are not there.