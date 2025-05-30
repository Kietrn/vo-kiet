<?php include 'app/views/shares/header.php'; ?>

<!-- Checkout Form -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for Checkout -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Thông tin thanh toán</h2>
                    
                    <form method="POST" action="/webbanhang/Product/processCheckout">
                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-user"></i> Họ tên:
                            </label>
                            <input type="text" id="name" name="name" class="form-control" required placeholder="Nhập họ tên của bạn">
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group">
                            <label for="phone">
                                <i class="fas fa-phone-alt"></i> Số điện thoại:
                            </label>
                            <input type="text" id="phone" name="phone" class="form-control" required placeholder="Nhập số điện thoại">
                        </div>

                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address">
                                <i class="fas fa-map-marker-alt"></i> Địa chỉ:
                            </label>
                            <textarea id="address" name="address" class="form-control" required placeholder="Nhập địa chỉ giao hàng"></textarea>
                        </div>

                        <!-- Payment Method Selection -->
                        <div class="form-group">
                            <label for="payment-method">
                                <i class="fas fa-credit-card"></i> Phương thức thanh toán:
                            </label><br>
                            <!-- Radio buttons for payment methods -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_cod" value="cod" required>
                                <label class="form-check-label" for="payment_cod">
                                    Thanh toán khi nhận hàng (COD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_credit_card" value="credit_card">
                                <label class="form-check-label" for="payment_credit_card">
                                    Thẻ tín dụng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_wallet" value="wallet">
                                <label class="form-check-label" for="payment_wallet">
                                    Ví điện tử
                                </label>
                            </div>
                        </div>

                        <!-- Credit Card Information (show only if credit card is selected) -->
                        <div id="credit-card-info" class="payment-info" style="display:none;">
                            <div class="form-group">
                                <label for="card_number">Số thẻ tín dụng:</label>
                                <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Nhập số thẻ tín dụng">
                            </div>
                            <div class="form-group">
                                <label for="expiry_date">Ngày hết hạn:</label>
                                <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YY">
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" placeholder="Nhập mã CVV">
                            </div>
                        </div>

                        <!-- Wallet Information (show only if wallet is selected) -->
                        <div id="wallet-info" class="payment-info" style="display:none;">
                            <div class="form-group">
                                <label for="wallet_id">Mã ví điện tử:</label>
                                <input type="text" id="wallet_id" name="wallet_id" class="form-control" placeholder="Nhập mã ví điện tử">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg mt-3">Thanh toán</button>
                        </div>
                    </form>
                    
                    <!-- Back to Cart Button -->
                    <div class="text-center mt-3">
                        <a href="/webbanhang/Product/cart" class="btn btn-secondary">Quay lại giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show/hide payment info based on selected payment method
    document.querySelectorAll('input[name="payment_method"]').forEach(function(element) {
        element.addEventListener('change', function() {
            // Hide all payment info
            document.querySelectorAll('.payment-info').forEach(function(info) {
                info.style.display = 'none';
            });

            // Show the corresponding payment info based on selected method
            if (this.value === 'credit_card') {
                document.getElementById('credit-card-info').style.display = 'block';
            } else if (this.value === 'wallet') {
                document.getElementById('wallet-info').style.display = 'block';
            }
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>
