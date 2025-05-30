<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
class ProductController
{
    private $productModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }
    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }
    public function add()
    {
        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = "";
            }
            $result = $this->productModel->addProduct(
                $name,
                $description,
                $price,
                $category_id,
                $image
            );
            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /webbanhang/Product');
            }
        }
    }
    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = $_POST['existing_image'];
            }
            $edit = $this->productModel->updateProduct(
                $id,
                $name,
                $description,
                $price,
                $category_id,
                $image
            );
            if ($edit) {
                header('Location: /webbanhang/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }
    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /webbanhang/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
    private function uploadImage($file)
    {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // ⚠️ Debug lỗi upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Upload lỗi mã: " . $file['error']);
        }

        if (!is_uploaded_file($file['tmp_name'])) {
            throw new Exception("File không phải file upload hợp lệ.");
        }

        if (!file_exists($file['tmp_name'])) {
            throw new Exception("File tạm không tồn tại: " . $file['tmp_name']);
        }

        // ✅ Kiểm tra ảnh
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh hợp lệ.");
        }

        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
        }

        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }

        $target_file = $target_dir . basename($file["name"]);
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Không thể lưu file ảnh.");
        }

        return $target_file;
    }

    public function addToCart($id)
    {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }
        header('Location: /webbanhang/Product/cart');
        
    }
    public function cart()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }
    public function checkout()
    {
        include 'app/views/product/checkout.php';
    }
    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            // Kiểm tra giỏ hàng
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }
            // Bắt đầu giao dịch
            $this->db->beginTransaction();
            try {
                // Lưu thông tin đơn hàng vào bảng orders
                $query = "INSERT INTO orders (name, phone, address) VALUES (:name,
:phone, :address)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->execute();
                $order_id = $this->db->lastInsertId();
                // Lưu chi tiết đơn hàng vào bảng order_details
                $cart = $_SESSION['cart'];
                foreach ($cart as $product_id => $item) {
                    $query = "INSERT INTO order_details (order_id, product_id,
quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }
                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
                // Commit giao dịch
                $this->db->commit();
                // Chuyển hướng đến trang xác nhận đơn hàng
                header('Location: /webbanhang/Product/orderConfirmation');
            } catch (Exception $e) {
                // Rollback giao dịch nếu có lỗi
                $this->db->rollBack();
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }
    // Controller method to remove item from the cart
    public function removeFromCart($id) {
        // Check if cart exists in session
        if (isset($_SESSION['cart'])) {
            // If product exists in cart, remove it
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]); // Remove product from cart
            }
        }

        // Redirect to the cart page after removal
        header('Location: /webbanhang/Product/cart');
        exit;
    // Redirect to the cart page after removal
    header('Location: /webbanhang/Product/cart');
    exit;

    // Redirect back to the cart page
    header('Location: /webbanhang/Product/cart');
    exit();
}

    public function orderConfirmation()
    {
        include 'app/views/product/orderConfirmation.php';
    }
}
