<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Create Product</h2>
        <form class="space-y-4" method="POST" action=<?= !isset($product) ? "/products" : "/products/".$product['id'] ?>>
            <input type="text" name="name" value="<?=isset($product) ? $product['name'] : '' ?>" placeholder="Name" class="w-full p-2 border rounded-md" required>
            <textarea name="description" placeholder="Description" class="w-full p-2 border rounded-md" required></textarea>
            <input type="number" value="<?=isset($product) ? $product['price'] : '' ?>"   name="price" step="0.01" placeholder="Price" class="w-full p-2 border rounded-md" required>
            <input type="text" value="<?=isset($product) ? $product['brand'] : '' ?>"  name="brand" placeholder="Brand" class="w-full p-2 border rounded-md" required>

            <div class="flex justify-between">
                <a href="/products" class="text-gray-600 hover:underline">← Back</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    <?= !isset($product) ? 'Create Product' : 'Update Product' ?>
                </button>
            </div>
        </form>
    </div>

</body>
</html>