# break-it.md — Security Vulnerability Exercise

---

## Vulnerability 1 — SQL Injection

### Vulnerable Code

```php
$name    = $_POST['name'];
$message = $_POST['message'];

$sql = "INSERT INTO guestbook (name, message) 
        VALUES ('" . $name . "', '" . $message . "')";

mysqli_query($conn, $sql);
```

### Malicious Input

In the **Name** field, a user could type:

```
', ''); DROP TABLE guestbook; --
```

### What Would Happen

The database would receive this as executable SQL:

```sql
INSERT INTO guestbook (name, message) VALUES ('', ''); DROP TABLE guestbook; --', 'hello')
```

The first statement completes the INSERT, the second drops the entire `guestbook` table, and `--` comments out the rest of the query. All stored entries would be permanently deleted, and the application would break entirely since the table no longer exists.

### Safe Code (Original)

```php
$stmt = $conn->prepare("INSERT INTO guestbook (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);
$stmt->execute();
```

### Why This Is Safe

`prepare()` sends the SQL structure to the database before any user data is involved. The `?` placeholders tell MySQL exactly where data will go. When `bind_param()` attaches `$name` and `$message`, the database treats them strictly as string values — not executable SQL. Even if a user types `DROP TABLE guestbook`, it gets stored as a literal string, not run as a command.

---

## Vulnerability 2 — XSS (Cross-Site Scripting)

### Vulnerable Code

```php
echo "<strong>" . $row['name'] . "</strong>";
echo "<p>" . $row['message'] . "</p>";
```

### Malicious Input

In the **Message** field, a user could type:

```
<script>alert('hacked')</script>
```

### What Would Happen

Since the output is not escaped, the browser would interpret the stored text as actual HTML and execute the script. Every visitor who loads `guestbook.php` would trigger the alert. A real attacker would replace `alert()` with something more harmful — like a script that steals session cookies and forwards them to an external server, giving the attacker access to any authenticated user's session.

### Safe Code (Original)

```php
echo "<strong>" . htmlspecialchars($row['name']) . "</strong>";
echo "<p>" . htmlspecialchars($row['message']) . "</p>";
```

### Why This Is Safe

`htmlspecialchars()` converts characters like `<`, `>`, and `"` into their HTML entities (`&lt;`, `&gt;`, `&quot;`). The browser renders them as plain text instead of parsing them as markup. The script tag gets displayed on screen as literal text rather than executed — neutralizing the attack entirely.