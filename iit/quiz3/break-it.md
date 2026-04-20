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