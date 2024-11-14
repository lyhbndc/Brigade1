<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brigade Clothing</title>
    <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <style>
        body {
            font-size: 14px;
            display: flex;
            height: 100vh;
            overflow: hidden;
            background-color: white;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 600px;
            margin: 30px auto; /* Center the form */
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: black;
            font-weight: bold;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="text"],input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 20px;
            background-color: white;
            color: gray;
            font-size: 14px;
            transition: border 0.3s;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border: 1px solid gray;
            outline: none;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            margin-top: 10px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            width: 280px;
            transition: background-color 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #555;
            transform: translateY(-1px);
        }
        .forgot-password {
            margin-top: 10px;
            font-size: 12px;
        }
        .forgot-password a {
            color: #bbb;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 13px;
            color: gray;
            font-size: 20px;
        }
        .sidebar {
            width: 215px;
            background-color: black;
            color: white;
            padding: 15px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }
        .sidebar h2 {
            color: #fff;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 220px; 
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s ease;
            overflow-y: auto; 
        }
        .hamburger {
            cursor: pointer;
            margin: 15px;
            display: none; 
        }
        .footer-logo {
            width: 168px; 
            height: auto; 
            cursor: default;
        }
        
.btn-primary {
    background-color: black;
    border-color: black;
}
.btn-primary:hover{
    background-color: #495057;
}
        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed; 
                transform: translateX(-100%); 
                width: 100%;
                height: 100%; 
            }
            .content {
                margin-left: 0;
            }
            .hamburger {
                display: block; 
            }
        }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <a><img src="assets/Untitled design.png" class="footer-logo"></a>
    <a href="6dashboard.php">Dashboard</a>
    <a href="6inventory.php">Stocks</a>
    <a href="6onprocess.php">On Process</a>
    <a href="6completeorders.php">Complete Orders</a>
    <a href="6cancelorders.php">Cancel Orders</a>
    <a href="6refundorders.php">Refund Orders</a>
    <a href="6refundorders.php">Employees</a>
    <a href="logout.php" class="logout">Log Out</a>
</div>

<div class="login-container">
                <img src="assets/2.png" class="footer-logo">
                <br><br>
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first-name">First Name:</label>
                            <input type="text" id="first-name" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name">Last Name:</label>
                            <input type="text" id="last-name" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div style="position: relative;">
                            <input type="password" id="signup-password" name="password" class="form-control" required>
                            <i id="toggle-signup-password-icon" class="fa fa-eye toggle-password" onclick="toggleSignupPassword()"></i>
                        </div>
                    </div>
                    <!-- Role Selection Dropdown -->
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="owner">Owner</option>
                            <option value="employee">Employee</option>
                        </select>
                    </div>
                    <input type="submit" name="next" value="Sign Up" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>
    </div>
</div>


<script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const hamburger = document.getElementById('hamburger');

    hamburger.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        if (sidebar.classList.contains('active')) {
            sidebar.style.transform = 'translateX(0)';
            sidebar.style.zIndex = '1001'; 
            content.style.marginLeft = '0'; 
        } else {
            sidebar.style.transform = 'translateX(-100%)'; 
            content.style.marginLeft = '0'; 
            sidebar.style.zIndex = ''; 
        }
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#inventoryTableBody tr');

        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 1; i < cells.length; i++) { 
                if (cells[i].textContent.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
<script>
    // JavaScript to make the navbar opaque when scrolling
    window.addEventListener('scroll', function() {
        const mainNav = document.querySelector('.main_nav_container');
        
        if (window.scrollY > 50) { // Adjust the scroll threshold as needed
            mainNav.classList.add('opaque');
        } else {
            mainNav.classList.remove('opaque');
        }
    });
</script>
</body>
</html>