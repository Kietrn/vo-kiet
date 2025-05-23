<?php include 'app/views/shares/header.php'; ?>
<style>
        /* General form styling */
        form {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header styling */
        h1 {
            color: #007bff;
            font-size: 32px;
            font-weight: 600;
            text-align: center;
            margin-top: 20px;
        }

        /* Input and textarea styling */
        input.form-control, textarea.form-control, select.form-control {
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 16px;
            width: 100%;
        }

        /* Focus effect for input fields */
        input.form-control:focus, textarea.form-control:focus, select.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Button styling */
        button.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            display: block;
            width: 100%;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Alert styling */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            border-radius: 5px;
            padding: 10px;
        }

        /* Footer and back button styling */
        a.btn-secondary {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            display: inline-block;
            margin-top: 10px;
        }

        a.btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>

<h1>Thêm sản phẩm mới</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" action="/webbanhang/Product/save" onsubmit="return
validateForm();">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"
            required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01"
            required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>
<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách
    sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>