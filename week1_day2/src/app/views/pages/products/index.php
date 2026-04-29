<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title">Demo MVC load danh sách</h1>

        <div class="product-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php
                            $imgPath = !empty($product['img_path']) ? str_replace('./src/public', '', $product['img_path']) : '/assets/images/default.png';
                            ?>
                            <img src="<?php echo htmlspecialchars($imgPath); ?>"
                                alt="<?php echo htmlspecialchars($product['name'] ?? 'Sản phẩm'); ?>">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo htmlspecialchars($product['name'] ?? 'Không có tên'); ?></h3>
                            <p class="product-price">
                                <?php echo isset($product['price']) ? number_format($product['price'], 0, ',', '.') . ' đ' : 'Liên hệ'; ?>
                            </p>
                            <button class="btn add-to-cart">Thêm vào giỏ</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <p>Hiện không có sản phẩm nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>