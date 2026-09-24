# 📋 Personal Task Manager

> **A simple and practical web-based task management system built with Laravel, MariaDB, and SQL.**

[![Laravel](https://img.shields.io/badge/Laravel-Framework-FF2D20?style=for-the-badge\&logo=laravel\&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge\&logo=php\&logoColor=white)](https://www.php.net/)
[![MariaDB](https://img.shields.io/badge/MariaDB-Database-003545?style=for-the-badge\&logo=mariadb\&logoColor=white)](https://mariadb.org/)
[![SQL](https://img.shields.io/badge/SQL-Database%20Language-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)](https://www.mysql.com/)
[![Git](https://img.shields.io/badge/Git-Version%20Control-F05032?style=for-the-badge\&logo=git\&logoColor=white)](https://git-scm.com/)

---

## 👨‍💻 Student Information

| Information         | Details                   |
| ------------------- | ------------------------- |
| **Project Code**    | `WST21-PM-2026-SF`        |
| **Student Name**    | **Vera Cruz, Michael C.** |
| **Course & Year**   | **2nd Year — Section 4**  |
| **Project Type**    | Laravel Mini Project      |
| **Database**        | MariaDB / SQL             |
| **Framework**       | Laravel                   |
| **Language**        | PHP                       |
| **Version Control** | Git / GitHub              |

---

## 📖 About the Project

The **Personal Task Manager** is a web-based task management application developed using the **Laravel PHP framework**.

The system is designed to help users organize, manage, and track their daily tasks through a simple and easy-to-use interface.

Instead of keeping tasks in a notebook or manually managing them, users can create tasks, view existing tasks, edit task information, delete unnecessary tasks, and update their progress.

This project was developed as a practical application of the fundamental Laravel development workflow:

```text
Route → Controller → Model → Database → Blade View
```

The project demonstrates how Laravel can be used to build a complete CRUD-based web application connected to a relational database.

---

# 🎯 Project Objectives

The main objectives of this project are to:

* Learn the fundamentals of the Laravel framework.
* Understand the Laravel MVC architecture.
* Practice creating routes and controllers.
* Connect Laravel to a MariaDB/SQL database.
* Implement CRUD operations.
* Create reusable Blade templates.
* Practice database migrations.
* Learn how to use Eloquent ORM.
* Understand how web applications communicate with databases.
* Apply Git and GitHub for project version control.

---

# ✨ Features

## ➕ Add Task

Users can create a new task by providing the necessary task information.

**Example information:**

* Task title
* Task description
* Task status

---

## 👀 View Tasks

Users can view all available tasks in one organized task list.

The task list allows users to quickly see:

* Task title
* Description
* Status
* Available actions

---

## ✏️ Edit Task

Existing tasks can be modified whenever information needs to be changed.

Users can update task details without creating a new task.

---

## 🗑️ Delete Task

Unnecessary or completed tasks can be permanently removed from the task list.

A delete action is provided for each task.

---

## 🔄 Update Status

Users can update the progress/status of a task.

Example statuses:

```text
Pending
In Progress
Completed
```

This makes it easier to monitor the current state of each task.

---

# 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* Blade Templates

### Backend

* PHP
* Laravel Framework

### Database

* MariaDB
* SQL
* Laravel Migrations
* Eloquent ORM

### Development Tools

* Git
* GitHub
* Visual Studio Code
* Linux Mint
* Terminal

---

# 🏗️ System Architecture

The application follows Laravel's MVC architecture.

```text
                    ┌─────────────────┐
                    │      User       │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │      Routes     │
                    │    web.php      │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │   Controller    │
                    │ TaskController  │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │      Model      │
                    │      Task       │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │    MariaDB      │
                    │    SQL Database │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │  Blade Views    │
                    │    Frontend     │
                    └─────────────────┘
```

---

# 🔄 CRUD Operations

The system implements the four fundamental CRUD operations:

| Operation  | Function      | Description              |
| ---------- | ------------- | ------------------------ |
| **Create** | Add Task      | Creates a new task       |
| **Read**   | View Tasks    | Displays existing tasks  |
| **Update** | Edit / Status | Updates task information |
| **Delete** | Delete Task   | Removes a task           |

### CRUD Flow

```text
CREATE
  ↓
Add Task
  ↓
Database
  ↓
READ
  ↓
View Tasks
  ↓
UPDATE
  ↓
Edit / Update Status
  ↓
DELETE
  ↓
Remove Task
```

---

# 📂 Project Structure

The important Laravel files and folders include:

```text
personal-task-manager/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── TaskController.php
│   │
│   └── Models/
│       └── Task.php
│
├── database/
│   └── migrations/
│       └── xxxx_xx_xx_create_tasks_table.php
│
├── resources/
│   └── views/
│       └── tasks/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
├── public/
│
├── .env
├── artisan
├── composer.json
└── README.md
```

---

# 💾 Database

The project uses **MariaDB** as its relational database.

The Laravel application communicates with the database using:

* Laravel Eloquent ORM
* Database migrations
* SQL
* MariaDB

### Example Task Data

| ID | Title          | Description              | Status      |
| -: | -------------- | ------------------------ | ----------- |
|  1 | Study Laravel  | Review Laravel MVC       | Pending     |
|  2 | Create Project | Build task manager       | In Progress |
|  3 | Submit README  | Upload project to GitHub | Completed   |

---

# 🚀 Installation & Setup

Follow the steps below to run the project locally.

## 1. Clone the Repository

```bash
git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY.git
```

Move into the project folder:

```bash
cd personal-task-manager
```

---

## 2. Install PHP Dependencies

Run:

```bash
composer install
```

---

## 3. Create Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

---

## 4. Generate Application Key

Run:

```bash
php artisan key:generate
```

---

# 🗄️ Database Configuration

Open the `.env` file:

```bash
nano .env
```

Configure the database settings according to your MariaDB installation.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=personal_task_manager
DB_USERNAME=root
DB_PASSWORD=
```

> **Note:** Change the username and password according to your local MariaDB configuration.

---

## 5. Create the Database

Open MariaDB/MySQL:

```bash
mysql -u root -p
```

Then create the database:

```sql
CREATE DATABASE personal_task_manager;
```

Exit:

```sql
exit;
```

---

## 6. Run Database Migrations

Inside the Laravel project folder:

```bash
php artisan migrate
```

This creates the required database tables.

---

## 7. Start the Laravel Development Server

Run:

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

Open the address in your browser.

---

# 🖥️ How to Use the System

### Step 1 — Open the Application

Start Laravel:

```bash
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

### Step 2 — Add a Task

Click:

```text
+ Add Task
```

Enter the task information and save it.

### Step 3 — View Tasks

The task will appear in the task list.

### Step 4 — Edit a Task

Click the **Edit** button to modify the task.

### Step 5 — Update Status

Change the task status according to its progress.

### Step 6 — Delete a Task

Click **Delete** when a task is no longer needed.

---

# 📸 Screenshots

> Add screenshots of your actual application here.

### 🏠 Task Dashboard

```text
[ Add your screenshot here ]
```

### ➕ Add Task

```text
[ Add your screenshot here ]
```

### ✏️ Edit Task

```text
[ Add your screenshot here ]
```

### 🔄 Task Status

```text
[ Add your screenshot here ]
```

---

# 🧪 Testing Checklist

| Feature             | Status |
| ------------------- | :----: |
| Add Task            |    ✅   |
| View Tasks          |    ✅   |
| Edit Task           |    ✅   |
| Delete Task         |    ✅   |
| Update Status       |    ✅   |
| Database Connection |    ✅   |
| Laravel Migration   |    ✅   |
| CRUD Operations     |    ✅   |

---

# 🔐 Basic Validation

The application can validate user input before saving information to the database.

Example:

```text
Task Title
    ↓
Check Input
    ↓
Valid?
 ┌──┴──┐
Yes    No
 ↓      ↓
Save   Show Error
 ↓
Database
```

This helps prevent incomplete or invalid task records.

---

# 🌱 Future Improvements

The current version focuses on the core task-management requirements.

Possible future improvements include:

* 🔐 User authentication
* 👤 Multiple user accounts
* 🔎 Task search
* 🏷️ Task categories
* 📅 Due dates
* 🚦 Priority levels
* 🔔 Task notifications
* 📊 Task statistics
* 📱 Improved mobile responsiveness
* 🌙 Dark mode
* 🔍 Advanced filtering
* ☁️ Online deployment
* 🔒 Improved security and authorization

---

# 📚 What I Learned

Through this project, I gained practical experience with:

* Laravel project structure
* MVC architecture
* Routing
* Controllers
* Models
* Blade templates
* Database migrations
* MariaDB
* SQL
* Eloquent ORM
* CRUD operations
* Form handling
* Git
* GitHub
* Linux development environment

This project helped me understand how the different parts of a web application work together.

---

# 🧑‍💻 Developer

**Michael C. Vera Cruz**

🎓 **2nd Year — Section 4**

💻 **Bachelor of Information Technology**

📌 **Project Code:** `WST21-PM-2026-SF`

---

# 📄 Academic Project

This project was developed as part of an academic requirement and is intended for educational and learning purposes.

The project demonstrates the practical implementation of Laravel, PHP, SQL, MariaDB, MVC architecture, and CRUD operations.

---

# ⭐ Support

If you find this project useful for learning Laravel, consider giving the repository a ⭐ on GitHub.

---

## 📌 Project Summary

```text
Project       : Personal Task Manager
Project Code  : WST21-PM-2026-SF
Developer     : Michael C. Vera Cruz
Year/Section  : 2nd Year — Section 4

Framework     : Laravel
Backend       : PHP
Database      : MariaDB / SQL
Architecture  : MVC
Operations    : CRUD

Features:
✓ Add Task
✓ View Tasks
✓ Edit Task
✓ Delete Task
✓ Update Status
```

---

### 🚀 Built with Laravel • PHP • MariaDB • SQL • GitHub
