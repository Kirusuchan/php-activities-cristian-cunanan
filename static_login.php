<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// Define users
$users = [
    ['type' => 'Admin', 'username' => 'admin', 'password' => 'Pass1234'],
    ['type' => 'Admin', 'username' => 'renmark', 'password' => 'Pogi1234'],
    ['type' => 'Content Manager', 'username' => 'pepito', 'password' => 'manaloto'],
    ['type' => 'Content Manager', 'username' => 'juan', 'password' => 'delacruz'],
    ['type' => 'System User', 'username' => 'pedro', 'password' => 'penduko']
];

// Initialize variables
$message = '';
$alertClass = 'd-none';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $userFound = false;
    foreach ($users as $user) {
        if ($user['type'] === $userType && $user['username'] === $username && $user['password'] === $password) {
            $message = "Welcome to the System: {$userType} - {$username}";
            $alertClass = 'alert-success';
            $userFound = true;
            break;
        }
    }

    // If user not found, show error message
    if (!$userFound) {
        $message = "Invalid Username / Password";
        $alertClass = 'alert-danger';
    }
}
?>

<!-- Alert Message -->
<div class="alert <?php echo $alertClass; ?> text-center" role="alert">
    <?php echo $message; ?>
</div>

<!-- Login Form -->
<div class="card mx-auto">
    <div class="card-body">
        <h3 class="text-center mb-4">Sign In</h3>
        <form method="post" action="">
            <div class="mb-3">
                <label for="userType" class="form-label">User Type</label>
                <select class="form-select" name="userType" id="userType" required>
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn w-100">Sign in</button>
        </form>
    </div>
</div>

<style>
    /* Full-screen background styling */
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background: url('bg.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Card and form container styling */
    .card {
        max-width: 400px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: rgba(255, 255, 255, 0.85); /* Transparent white background */
        margin-top: 80px; /* Offset for alert */
    }
    
    .card-body {
        padding: 2rem;
    }

    /* Custom button styling */
    button {
        --color: #560bad;
        font-family: inherit;
        display: inline-block;
        width: 100%;
        height: 3em;
        line-height: 2.5em;
        position: relative;
        cursor: pointer;
        overflow: hidden;
        border: 2px solid var(--color);
        transition: color 0.5s;
        z-index: 1;
        font-size: 17px;
        border-radius: 6px;
        font-weight: 500;
        color: var(--color);
        text-align: center;
    }
    button:before {
        content: "";
        position: absolute;
        z-index: -1;
        background: var(--color);
        height: 150px;
        width: 200px;
        border-radius: 50%;
    }
    button:hover {
        color: #fff;
    }
    button:before {
        top: 100%;
        left: 100%;
        transition: all 0.7s;
    }
    button:hover:before {
        top: -30px;
        left: -30px;
    }
    button:active:before {
        background: #3a0ca3;
        transition: background 0s;
    }

    /* Center alert and form */
    .alert {
        position: fixed;
        top: 30px;
        width: 100%;
        max-width: 400px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
