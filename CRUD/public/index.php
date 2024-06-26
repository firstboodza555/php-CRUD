<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Noto Sans Thai', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">ระบบจัดการผู้ใช้</h2>
        
        <!-- Form to add new user -->
        <form action="../usercontroller/create.php" method="post" class="mb-6">
            <div class="mb-4">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" placeholder="ชื่อ" required>
            </div>
            <div class="mb-4">
                <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="email" placeholder="อีเมล">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">เพิ่มผู้ใช้</button>
        </form>

        <!-- Table to display users -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">ชื่อ</th>
                        <th scope="col" class="px-6 py-3">อีเมล</th>
                        <th scope="col" class="px-6 py-3">การดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr class='bg-white border-b hover:bg-gray-50'>
                <td class='px-6 py-4'>".$row["id"]."</td>
                <td class='px-6 py-4'>".$row["name"]."</td>
                <td class='px-6 py-4'>".$row["email"]."</td>
                <td class='px-6 py-4'>
                    <a href='../usercontroller/edit.php?id=".$row["id"]."' class='text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800'>แก้ไข</a>
                    <a href='../usercontroller/delete.php?id=".$row["id"]."' class='text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800'>ลบ</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='px-6 py-4 text-center'>ไม่พบข้อมูลผู้ใช้</td></tr>";
}
?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>