<?php include 'app/views/shares/header.php'; ?>

<!-- Heading -->
<h1 class="text-center my-4">Thêm sản phẩm mới</h1>

<!-- Error Messages -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Product Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                
                <!-- Product Name -->
                <div class="form-group mb-4">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <!-- Product Description -->
                <div class="form-group mb-4">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Product Price -->
                <div class="form-group mb-4">
                    <label for="price">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>

                <!-- Category Selection -->
                <div class="form-group mb-4">
                    <label for="category_id">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Product Image -->
                <div class="form-group mb-4">
                    <label for="image">Hình ảnh:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Thêm sản phẩm</button>
                </div>
            </form>

            <!-- Back to Product List -->
            <div class="text-center mt-3">
                <a href="/webbanhang/Product/list" class="btn btn-secondary btn-lg">Quay lại danh sách sản phẩm</a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
