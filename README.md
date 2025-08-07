# InternshipReportHub# Internship Report Management Web Application

This is a web-based application designed to manage internship reports. It provides functionalities for students and administrators to manage, submit, and view internship reports. 

---

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS  
- **Backend**: PHP  
- **Database**: MySQL  
- **Server**: Apache (via XAMPP or online hosting)

---

## 🚀 Installation

1. **Clone the repository:**  
   `git clone https://github.com/yourusername/InternshipReport.git`

2. **Import the database:**  
   Use phpMyAdmin or a MySQL client to import the provided SQL file into a new database.

3. **Configure the database:**  
   Edit `CONFIGURATION/database.php` and set your database credentials accordingly.

4. **Run the project:**

### 💻 Run the project locally

#### Option 1: Copy the project folder into `htdocs` (simple method)

1. Place the project folder inside `C:\xampp\htdocs\`.  
2. Start Apache (and MySQL if needed) from the XAMPP control panel.  
3. Access the site at: [http://localhost/internship-reports](http://localhost/internship-reports)

---

#### Option 2: Change the default Apache path (advanced)

> Use this if you prefer working from another folder (e.g., `D:\Projects\`)

1. Open the file `C:\xampp\apache\conf\httpd.conf`.

2. Replace the following lines:  
   `DocumentRoot "C:/xampp/htdocs"`  
   `<Directory "C:/xampp/htdocs">`  

   with:  
   `DocumentRoot "D:/Projects/internship-reports"`  
   `<Directory "D:/Projects/internship-reports">`

3. Restart Apache from the XAMPP control panel.

4. Access your project directly via: [http://localhost/](http://localhost/)
