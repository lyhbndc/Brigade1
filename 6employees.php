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

<div class="content" id="content">
    <div class="hamburger" id="hamburger">
        <button class="btn btn-light">☰</button>
    </div>
    <h2 class="text-center">Employees</h2>

    <!-- Container for the table -->
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="employeeTableBody">
                <tr>
                    <td>John Legend</td>
                    <td>jlegend</td>
                    <td>password</td>
                    <td>Admin</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Be Yonce</td>
                    <td>bayot</td>
                    <td>password</td>
                    <td>Admin</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Button below the table -->
        <button class="btn btn-primary mt-3">Add Employee</button>
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