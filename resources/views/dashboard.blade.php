<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WEBSiTE-EAT</title>
    <link rel="shortcut icon" href="img/cat-solid.svg">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 80%;
        }

        .dashboard-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .actions button {
            padding: 5px 10px;
            margin-right: 5px;
        }

        .actions button.edit {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .actions button.delete {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .back-to-login {
            margin-top: 20px;
            text-align: center;
        }

        .back-to-login a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>User Dashboard</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th> <!-- Kolom untuk tombol Edit dan Delete -->
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td class="actions">
                            <button class="edit">Edit</button>
                            <button class="delete">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="back-to-login">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>
</body>
</html>
