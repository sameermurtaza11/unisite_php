# Security Assessment Report for Unisite PHP

## 1. Introduction

This report details the security assessment performed on the Unisite PHP website, a project hosted on GitHub (https://github.com/sameermurtaza11/unisite_php.git). The assessment aimed to identify potential vulnerabilities and provide recommendations for remediation. The testing involved static code analysis, dynamic security testing, and automated vulnerability scanning.

## 2. Methodology

The security assessment was conducted in several phases:

1.  **Code Analysis**: The codebase was cloned and examined to understand its structure, key components, and technologies used.
2.  **Static Code Analysis**: Tools like PHPStan were used to analyze the source code for common security flaws.
3.  **Local Environment Setup**: A local Apache web server with PHP was configured to host the application for dynamic testing.
4.  **Dynamic Security Testing**: Manual testing was performed to identify vulnerabilities such as Local File Inclusion (LFI), Cross-Site Scripting (XSS), and SQL Injection.
5.  **Automated Vulnerability Scanning**: Automated tools like Nikto were used to scan for additional vulnerabilities and misconfigurations.

## 3. Findings

### 3.1. Local File Inclusion (LFI)

**Description**: The `index.php` file uses the `$_GET['content_file']` parameter directly in an `include` statement without proper sanitization or validation. This allows an attacker to include arbitrary files from the server's file system by manipulating the `content_file` parameter with directory traversal sequences (e.g., `../../../../etc/passwd`).

**Impact**: High. An attacker can read sensitive files, potentially leading to information disclosure (e.g., configuration files, password files), or even remote code execution if combined with other vulnerabilities (e.g., file upload).

**Proof of Concept (PoC)**:

Navigating to `https://80-igfbu8k1mw56enkrhcc02-6a70b2d6.manusvm.computer/?content_file=../../../../etc/passwd` successfully displayed the contents of the `/etc/passwd` file.

**Recommendation**: Implement a whitelist approach for allowed files or directories. Ensure that user-supplied input for file inclusion is strictly validated against a predefined list of safe files. Alternatively, use `basename()` to strip directory information from the input, or map user-friendly names to actual file paths.

### 3.2. Weak Database Credentials

**Description**: The `pages/application-status.php` file contains hardcoded database credentials (`root`, empty password) for connecting to the `kinpoe_db` database. This is a severe security risk as it exposes sensitive information directly in the source code.

**Impact**: Critical. If an attacker gains access to the source code (e.g., via LFI), they can obtain the database credentials, leading to full compromise of the database. This could result in data theft, modification, or deletion.

**Proof of Concept (PoC)**:

The credentials `localhost`, `root`, `''` (empty password), and `kinpoe_db` were found directly in `pages/application-status.php`:

```php
$conn = @new mysqli(\'localhost\', \'root\', \'\', \'kinpoe_db\');
```

**Recommendation**: Store database credentials in a secure configuration file outside the web root, and use environment variables or a secrets management solution to access them. Never hardcode sensitive information directly in the source code. Ensure appropriate file permissions are set for the configuration file to restrict unauthorized access.

### 3.3. SQL Injection (Not Exploitable)

**Description**: The `pages/application-status.php` file processes user input for CNIC to query the database. While user input is taken, the application uses prepared statements (`$stmt->prepare`) with parameterized queries. This effectively prevents SQL injection attacks.

**Impact**: Low (not exploitable). The use of prepared statements mitigates the risk of SQL injection.

**Proof of Concept (PoC)**:

Attempts to inject malicious SQL payloads (e.g., `\' OR 1=1 --`) into the CNIC input field did not result in successful SQL injection, as the prepared statements correctly handled the input as literal string values.

**Recommendation**: Continue using prepared statements for all database interactions involving user input. This is a good security practice and effectively prevents SQL injection vulnerabilities.

### 3.4. Missing X-Frame-Options Header

**Description**: The web server does not send the `X-Frame-Options` HTTP header. This header prevents clickjacking attacks by controlling whether a browser can render a page in a `<frame>`, `<iframe>`, `<embed>`, or `<object>`.

**Impact**: Medium. An attacker could embed the website within an `<iframe>` on a malicious site and overlay transparent elements to trick users into clicking on hidden UI elements, leading to unintended actions.

**Recommendation**: Configure the web server (Apache) to include the `X-Frame-Options` header in all responses. Set it to `DENY` to prevent any framing, or `SAMEORIGIN` if framing is allowed only from the same origin.

### 3.5. DEBUG HTTP Verb Enabled

**Description**: The web server appears to have the `DEBUG` HTTP verb enabled. This verb can expose sensitive server debugging information, which could aid an attacker in understanding the server's configuration and identifying further vulnerabilities.

**Impact**: Medium. Information disclosure that could facilitate further attacks.

**Recommendation**: Disable the `DEBUG` HTTP verb on the production server. This is typically done by configuring the web server to disallow or ignore this verb.

### 3.6. /server-status Exposed

**Description**: The Apache `server-status` page is accessible. This page provides detailed information about the Apache server's performance and current activity, including client IP addresses, requested URLs, and CPU usage. This information can be valuable to an attacker.

**Impact**: Medium. Information disclosure that could facilitate further attacks.

**Recommendation**: Restrict access to the `server-status` page to only trusted IP addresses or disable it entirely on production servers. This can be configured in the Apache configuration files.

### 3.7. Directory Indexing in /pages/

**Description**: Directory indexing is enabled for the `/pages/` directory, allowing anyone to view a list of all files within that directory. While the `index.php` handles routing, exposing the directory listing can provide an attacker with a clear overview of the application's internal structure and file names, which can be useful for exploiting other vulnerabilities like LFI.

**Impact**: Low. Information disclosure that can assist in reconnaissance.

**Recommendation**: Disable directory indexing for all directories that do not explicitly require it. This can be done by adding `Options -Indexes` to the Apache configuration for the relevant directories or globally.

### 3.8. .git/index Exposed

**Description**: The `.git/index` file is exposed, which is part of the Git version control system. This file can contain sensitive information about the repository's structure, file changes, and potentially even parts of the source code. Its exposure indicates that the `.git` directory might be publicly accessible.

**Impact**: Medium. Information disclosure that could lead to full source code disclosure or identification of sensitive files.

**Recommendation**: Ensure that the `.git` directory and its contents are not accessible from the web. This can be achieved by configuring the web server to deny access to hidden directories (those starting with a dot) or by placing the `.git` directory outside the web root.

## 4. Conclusion

The Unisite PHP website exhibits several security vulnerabilities, with Local File Inclusion and hardcoded database credentials being the most critical. While SQL injection was mitigated by prepared statements, other misconfigurations and information disclosures were identified through automated scanning. Addressing these vulnerabilities is crucial to enhance the overall security posture of the application and protect sensitive data.

## 5. References

[1] Local File Inclusion (LFI): https://owasp.org/www-community/attacks/Local_File_Inclusion
[2] Hardcoded Credentials: https://owasp.org/www-community/vulnerabilities/Hardcoded_credentials
[3] SQL Injection: https://owasp.org/www-community/attacks/SQL_Injection
[4] Clickjacking (X-Frame-Options): https://owasp.org/www-community/attacks/Clickjacking
[5] Apache HTTP Server Documentation: https://httpd.apache.org/docs/

