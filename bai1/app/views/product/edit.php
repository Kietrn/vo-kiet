<?php include 'app/views/shares/header.php'; ?>
<style>
    /* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #495057;
    margin-top: 20px;
}

/* Container */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 15px;
}

/* Header Styling */
h1 {
    color: #007bff;
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 30px;
}

/* Form Styling */
.product-form {
    background-color: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: 500;
    font-size: 16px;
    color: #333;
}

/* Input and Textarea Styling */
input.form-control, textarea.form-control, select.form-control {
    border-radius: 8px;
    padding: 12px;
    font-size: 16px;
    width: 100%;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Focus Effect */
input.form-control:focus, textarea.form-control:focus, select.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Button Styling */
button.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    font-size: 18px;
    padding: 12px 20px;
    border-radius: 5px;
    width: 100%;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

button.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Alert Styling */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
    border-radius: 5px;
    padding: 15px;
}

/* Back Button Styling */
a.btn-secondary {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    background-color: #6c757d;
    color: white;
    display: inline-block;
    margin-top: 15px;
    text-align: center;
    width: 100%;
}

a.btn-secondary:hover {
    background-color: #5a6268;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 28px;
    }

    button.btn-primary {
        padding: 12px;
    }
}
</style>
<h1>Sửa sản phẩm</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" action="/webbanhang/Product/update" onsubmit="return
validateForm();">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php
                                                                                echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"
            required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8');
                        ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01"
            value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>"
            required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo $category->id  == $product->category_id ? 'selected' : ''; ?>>

                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');

                    ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách
    sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>