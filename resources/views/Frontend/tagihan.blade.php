<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #0078d7;
        }
        
        .order-container {
            display: flex;
            flex-wrap: wrap;
        }
        
        .customer-info {
            flex: 1;
            padding: 24px;
            border-right: 1px solid #eee;
            min-width: 300px;
        }
        
        .order-summary {
            flex: 1;
            padding: 24px;
            background-color: #fff;
            min-width: 300px;
        }
        
        .customer-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .customer-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
            background-color: #0b8043;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .customer-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .customer-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        
        .billing-address {
            color: #666;
            font-size: 14px;
        }
        
        .contact-info {
            margin: 15px 0;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }
        
        .contact-item i {
            margin-right: 10px;
            color: #0b8043;
            width: 16px;
            text-align: center;
        }
        
        .address-icon {
            color: #0b8043;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: 600;
            margin: 25px 0 15px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 8px;
            color: #0b8043;
        }
        
        .payment-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        
        .upload-section {
            margin-top: 15px;
        }
        
        .upload-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .required {
            color: red;
        }
        
        .file-input-container {
            display: flex;
            margin-bottom: 15px;
        }
        
        .file-input-wrapper {
            flex: 1;
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            height: 36px;
            display: flex;
            align-items: center;
            padding: 0 10px;
            font-size: 14px;
            color: #888;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        
        .btn-primary {
            background-color: #0b8043;
            color: white;
            margin-left: 10px;
        }
        
        .btn-secondary {
            background-color: #f1f3f4;
            color: #333;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-secondary i {
            margin-right: 5px;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .summary-title {
            font-size: 18px;
            font-weight: 600;
            color: #0b8043;
            display: flex;
            align-items: center;
        }
        
        .summary-title i {
            margin-right: 8px;
        }
        
        .package-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .package-name {
            font-weight: 600;
        }
        
        .package-duration {
            color: #666;
        }
        
        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .discount {
            color: #0b8043;
            font-weight: 500;
        }
        
        .subtotal {
            padding-top: 10px;
            border-top: 1px dashed #eee;
            font-weight: 600;
            margin-top: 10px;
        }
        
        .features-list {
            margin: 20px 0;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 14px;
        }
        
        .feature-item i {
            color: #0b8043;
            margin-right: 10px;
            font-size: 16px;
        }
        
        .total-section {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }
        
        .tax-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 16px;
            color: #0b8043;
        }
        
        .guarantee-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding: 15px;
            background-color: #f5f7fa;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
        }
        
        .guarantee-section i {
            margin-right: 8px;
            color: #0b8043;
        }
        
        .footer {
            text-align: center;
            padding: 15px;
            background-color: #f9f9f9;
            color: #777;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }
        
        .logo span {
            margin-left: 6px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .order-container {
                flex-direction: column;
            }
            
            .customer-info {
                border-right: none;
                border-bottom: 1px solid #eee;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="order-container">
            <div class="customer-info" style="border-right: none; width: 100%;">
                <div class="customer-header">
                    <div class="customer-avatar">
                        <img src="/api/placeholder/48/48" alt="Customer Avatar">
                    </div>
                    <div>
                        <div class="customer-name">Ragiel Faqih Nabilal Ramadhan</div>
                        <div class="billing-address">Billing Address</div>
                    </div>
                </div>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-user"></i>
                        Nama Rekening: Yuwandana
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-university"></i>
                        Bank: BRI
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-credit-card address-icon"></i>
                        No Rekening: 756482913045
                    </div>
                </div>
                
                <div class="total-payment">
                    <div class="section-title" style="margin-top: 15px;">
                        <i class="fas fa-money-bill-wave"></i> Total Pembayaran
                    </div>
                    <div style="font-size: 24px; font-weight: bold; color: #0b8043; margin-bottom: 20px;">
                        Rp1.326.672
                    </div>
                </div>
                
                <div class="section-title">
                    <i class="fas fa-credit-card"></i> Payment
                </div>
                
                <div class="payment-info">
                Silakan transfer total pembayaran ke rekening yang telah disediakan. Kemudian, unggah bukti pembayaran Anda di sini untuk menyelesaikan pesanan Anda.
                </div>
                
                <div class="upload-section">
                    <label class="upload-label">Unggah bukti pembayaran<span class="required">*</span></label>
                    <div class="file-input-container">
                        <div class="file-input-wrapper">
                            Choose file... No file chosen
                        </div>
                    </div>
                    <div class="file-input-container">
                        <button class="btn btn-secondary">
                            <i class="fas fa-paperclip"></i> Select File
                        </button>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            © 2025 Vmush. All rights reserved.
            <div class="logo">
                <i class="fas fa-server"></i> <span>Vmush</span>
            </div>
        </div>
    </div>
</body>
</html>