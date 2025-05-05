<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Vmush</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2d9f60;
            --secondary: #e8f5ef;
            --text: #333333;
            --light-text: #666666;
            --white: #ffffff;
            --border-color: #e0e0e0;
            --success-light: #d1f5e4;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--text);
            line-height: 1.6;
        }
        
        .payment-container {
            max-width: 1100px;
            margin: 40px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            border: 1px solid var(--border-color);
        }
        
        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .service-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .service-description {
            color: var(--light-text);
            margin-bottom: 20px;
        }
        
        .package-selector {
            margin-top: 20px;
            margin-bottom: 30px;
        }
        
        .price-display {
            margin-top: 25px;
        }
        
        .price-amount {
            font-size: 32px;
            font-weight: bold;
        }
        
        .price-period {
            font-size: 16px;
            color: var(--light-text);
        }
        
        .original-price {
            color: var(--light-text);
            text-decoration: line-through;
            margin-left: 8px;
        }
        
        .promo-alert {
            background-color: var(--success-light);
            border: none;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            color: var(--primary);
        }
        
        .promo-alert i {
            margin-right: 8px;
        }
        
        .order-summary {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 25px;
        }
        
        .order-summary-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .summary-label {
            color: var(--light-text);
        }
        
        .summary-value {
            font-weight: 500;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .total-label {
            font-size: 18px;
            font-weight: 600;
        }
        
        .total-value {
            font-size: 24px;
            font-weight: bold;
        }
        
        /* Coupon section */
        .coupon-section {
            margin: 25px 0;
        }
        
        .coupon-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .coupon-icon {
            margin-right: 8px;
        }
        
        /* Button styles */
        .btn-continue {
            background-color: var(--primary);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .btn-continue:hover {
            background-color: #248a50;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 159, 96, 0.2);
        }
        
        .dropdown-toggle {
            background-color: white;
            border: 1px solid var(--border-color);
            padding: 12px 15px;
            width: 100%;
            text-align: left;
            font-weight: 500;
            border-radius: 5px;
        }
        
        .dropdown-toggle::after {
            float: right;
            margin-top: 10px;
        }
        
        /* Discount styling */
        .discount-value {
            color: var(--primary);
            font-weight: 500;
        }
        
        /* Save tag */
        .save-tag {
            background-color: var(--success-light);
            color: var(--primary);
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            display: inline-block;
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1 class="page-title">Pembayaran</h1>
        
        <div class="row">
            <!-- Left Column - Service Details -->
            <div class="col-lg-7">
                <div class="service-details pb-3">
                    <h2 class="service-title">Penyewaan Alat</h2>
                    <p class="service-description">High-performance tools</p>
                    
                    <div class="package-selector">
                        <label>Pilih Paket</label>
                        <div class="dropdown mt-2">
                            <button class="dropdown-toggle" type="button" id="packageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Paket Rakyat
                                <i class="fas fa-chevron-down float-end"></i>
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="packageDropdown">
                                <li><a class="dropdown-item" href="#">Paket Rakyat</a></li>
                                <li><a class="dropdown-item" href="#">Paket Raden</a></li>
                                <li><a class="dropdown-item" href="#">Paket Sultan</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="price-display">
                        <span class="price-amount">Rp24,900</span>
                        <span class="price-period">/month</span>
                        <span class="original-price">Rp109,900/month</span>
                        <span class="save-tag">SAVE Rp4,080,000</span>
                    </div>
                    
                    <div class="promo-alert">
                        <i class="fas fa-check-circle"></i>
                        Congratulations! You get a FREE domain and 2 months FREE with this plan.
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Order Summary -->
            <div class="col-lg-5">
                <div class="order-summary">
                    <h3 class="order-summary-title">Order Summary</h3>
                    
                    <div class="summary-row">
                        <div class="summary-label">Subtotal</div>
                        <div class="summary-value">Rp5,275,200</div>
                    </div>
                    
                    <div class="summary-row">
                        <div class="summary-label">Discount</div>
                        <div class="summary-value discount-value">-Rp4,080,000</div>
                    </div>
                    
                    <div class="total-row">
                        <div class="total-label">Total</div>
                        <div class="total-value">Rp1,195,200</div>
                    </div>
                    
                    <div class="coupon-section">
                        <a href="#" class="coupon-link">
                            <i class="fas fa-ticket-alt coupon-icon"></i>
                            Have a Coupon Code?
                        </a>
                    </div>
                    
                    <button class="btn-continue">Continue</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>