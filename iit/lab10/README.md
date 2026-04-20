# Lab 10 Submission README

## Project Overview

I deployed my ITWS lab website to a live Azure Virtual Machine.
The site is served using Apache and secured with HTTPS.
All labs are accessible through clean URLs at the root domain.

---

## Live Site

* Main site
  https://collid7rpi.eastus.cloudapp.azure.com

* Example lab
  https://collid7rpi.eastus.cloudapp.azure.com/lab10

---

## Technologies Used

* Azure Virtual Machine running Ubuntu
* Apache2 web server
* Certbot for HTTPS
* GitHub for version control
* VS Code and GitHub Desktop for development

---

## Features Implemented

* Live deployment from a remote server
* HTTPS enabled across the entire site
* Basic authentication using `.htaccess`
* Clean URL structure with no `/iit` path
* Git based workflow for updating the site

---

## Deployment Process

I deployed the project by cloning my GitHub repository into the server’s web root:

```bash
sudo git clone https://github.com/dandrecollins07-ctrl/itws-1100.git /var/www/html
```

I then adjusted the directory structure so all labs were accessible directly:

```bash
cd /var/www/html
sudo mv iit/* .
sudo rm -rf iit
```

After updating the structure, I restarted Apache:

```bash
sudo service apache2 restart
```

---

## Issues Encountered and Resolutions

### Git Branch Issues

My main branch did not contain recent labs.
I had been working on separate branches such as `lab8`, `lab9`, and `lab10`.

Fix
I merged all lab branches into `main` and pushed the updated branch to GitHub.

---

### Merge Conflicts

Conflicts occurred in shared files such as `index.html`.

Fix
I resolved conflicts by selecting the most recent versions from the newer lab branches.

---

### Incorrect Deployment Content

The server initially displayed outdated files.

Fix
I recloned the repository after updating the main branch to ensure consistency.

---

### Directory Structure Problems

Labs were nested inside an `iit` folder, causing incorrect URLs.

Fix
I flattened the structure by moving all lab folders into `/var/www/html`.

---

### File Conflicts During Move

Commands such as `mv iit/* .` failed due to existing files.

Fix
I removed conflicting files and reran the move command until the structure was correct.

---

### Apache Configuration Issues

The server initially returned 404 errors for valid paths.

Fix
I updated the Apache configuration to use the correct `DocumentRoot` and restarted the server.

---

### HTTPS Configuration

I configured HTTPS using Certbot and verified that all routes load securely.

---

### Environment Confusion

Some commands were run on the local machine instead of the VM.

Fix
I verified the environment using the terminal prompt and ensured all server commands were executed through SSH.

---

## Final Directory Structure

```plaintext
/var/www/html
  index.html
  lab03
  lab04
  lab05
  lab06
  lab08
  lab09
  lab10
  css
  assets
```

---

## Result

The site is fully deployed and accessible through HTTPS.
All lab pages load correctly from the root domain.
The deployment process now supports updates through GitHub.

This setup meets the requirements for Lab 10.
