<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering - Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(./images/background7.jpg) no-repeat;
            background-size: cover;
        }

        .signup-form {
            background-color: white;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signup-form h2 {
            margin-bottom: 20px;
        }

        .signup-form label {
            display: block;
            margin-bottom: 5px;
        }

        .signup-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        #message {
            margin-top: 10px;
            color: red;
        }
    </style>

</head>

<body>
    <div class="signup-form">
        <h2>Create Account</h2>
        <form id="signupForm" method="post" action="./includes/signup.inc.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="con_password">Confirm Password</label>
            <input type="password" id="con_password" name="con_password" required>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <p id="message"></p>
    </div>
</body>

</html>