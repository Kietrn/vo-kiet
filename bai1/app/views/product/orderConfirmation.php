<?php include 'app/views/shares/header.php'; ?>

<!-- Confirmation Message -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for Order Confirmation -->
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <!-- Success Icon -->
                    <div class="mb-3">
                        <i class="fas fa-check-circle fa-4x text-success"></i>
                    </div>

                    <!-- Confirmation Message -->
                    <h2 class="card-title">Cảm ơn bạn đã đặt hàng!</h2>
                    <p class="card-text">Đơn hàng của bạn đã được xử lý thành công. Bạn sẽ nhận được thông báo khi đơn hàng được vận chuyển.</p>

                    <!-- Continue Shopping Button -->
                    <a href="/webbanhang/Product" class="btn btn-primary btn-lg mt-3">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
