5. Fill prompt-log.md

Minimum 8 prompts
What you asked
What AI gave
What YOU changed and why


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
>
> Do not skip explanations. I need to understand this for a code walkthrough.

**What it returned:**
AI provided a `CREATE TABLE guestbook` statement with four columns
(`id`, `name`, `message`, `created_at`) and a detailed explanation
of each data type choice and why it was appropriate.

**What I kept:**
The entire CREATE TABLE statement as-is — the column choices made
sense after reading the explanations. `TEXT` for message instead of
`VARCHAR` was a specific decision I agreed with since comment length
is unpredictable. `DEFAULT CURRENT_TIMESTAMP` on `created_at` was
a good catch — it means I never have to pass the timestamp from PHP.

**What I changed:**
Nothing in the schema itself for now. I noted the suggestion to add
an index on `created_at` but held off — the guestbook won't have
heavy traffic, so the optimization isn't needed yet.

**What I threw away:**
The suggestion to add a `status` column for soft-deletes. That
feature is out of scope for this assignment and would complicate
the PHP logic without adding anything the rubric requires.


## Prompt 2 — Basic Form + Structure

**Prompt given:**
> I am building a guestbook page using PHP, MySQL, HTML, and jQuery.
> I need:
> - A simple HTML form with name and comment fields
> - The form should use POST
> - The form should submit to a PHP file
> Explain:
> - Why POST is used instead of GET
> - How form data is sent to PHP
> Do not just give code. Explain each part clearly.

**What it returned:**
AI provided the HTML form structure with `id`, `name`, `action`, and
`method` attributes explained, plus a breakdown of how POST differs
from GET and how `$_POST` receives data in PHP.

**What I kept:**
The full form structure — `action="submit.php"` and `method="POST"`
match my project layout. I kept both `id` and `name` attributes on
the inputs after understanding they serve different purposes (id for
JS, name for PHP). The `required` and `maxlength="100"` attributes
matched my schema constraint on the name column.

**What I changed:**
I updated the label text and added a placeholder attribute to both
inputs to match the visual style of my site. The AI gave bare-bones
HTML; I adjusted it to fit my actual page layout.

**What I threw away:**
A suggested `<fieldset>` wrapper the AI included in one version —
unnecessary for a two-field form and adds markup without benefit for
this assignment.

**Why POST over GET (my understanding):**
POST sends data in the request body, not the URL. Since I'm writing
to a database, POST is semantically correct and avoids exposing
visitor messages in the browser address bar.