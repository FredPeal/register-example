<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-4">Register</h1>
        <form method="POST" class="space-y-4">
            <input type="text" name="name" placeholder="Name" class="w-full p-2 border rounded" required>
            <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</button>
            <p class="text-sm mt-2">Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Login</a></p>
        </form>
    </div>

</body>
</html>