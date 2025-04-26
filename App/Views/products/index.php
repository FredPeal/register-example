<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="flex justify-between items-center max-w-5xl mx-auto mb-6">
        <h1 class="text-3xl font-bold">Product List</h1>
        <a href="/products/create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Product</a>
    </div>

    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Description</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Brand</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product["name"]; ?></td>
                        <td><?= $product["description"]; ?></td>
                        <td><?= $product["price"]; ?></td>
                        <td><?= $product["brand"]; ?></td>
                        <td class="p-2 border space-x-2">
                            <a href="/products/<?= $product['id']; ?>/edit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <a class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Más filas aquí -->
            </tbody>
        </table>
    </div>

</body>
</html>