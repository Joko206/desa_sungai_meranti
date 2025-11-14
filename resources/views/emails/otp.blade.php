<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode OTP Reset Password - Desa Sungai Meranti</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 25px;
            border-radius: 15px 15px 0 0;
            margin: -30px -30px 30px -30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 15px;
        }
        .message {
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 20px;
        }
        .otp-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 2px solid #0ea5e9;
            padding: 25px;
            text-align: center;
            margin: 25px 0;
            border-radius: 12px;
            position: relative;
        }
        .otp-section::before {
            content: "🔐";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 8px;
            font-size: 18px;
        }
        .otp-label {
            font-size: 14px;
            color: #0c4a6e;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .otp-code {
            font-size: 36px;
            font-weight: bold;
            color: #0ea5e9;
            letter-spacing: 8px;
            font-family: 'Courier New', 'Monaco', monospace;
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            border: 1px solid #bae6fd;
            margin: 10px 0;
        }
        .otp-expiry {
            font-size: 12px;
            color: #0369a1;
            margin-top: 10px;
        }
        .warning-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 1px solid #f59e0b;
            color: #92400e;
            padding: 20px;
            border-radius: 10px;
            margin: 25px 0;
        }
        .warning-title {
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .warning-list {
            margin: 0;
            padding-left: 20px;
        }
        .warning-list li {
            margin-bottom: 5px;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 2px solid #e5e7eb;
            color: #6b7280;
            font-size: 13px;
        }
        .footer p {
            margin: 5px 0;
        }
        .signature {
            color: #374151;
            font-weight: 600;
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 20px;
            }
            .header {
                margin: -20px -20px 20px -20px;
                padding: 20px;
            }
            .otp-code {
                font-size: 28px;
                letter-spacing: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏛️ Desa Sungai Meranti</h1>
            <p>Sistem Administrasi Desa Digital</p>
        </div>

        <div class="greeting">
            Halo, <strong>{{ $userName }}</strong>!
        </div>
        
        <div class="message">
            Kami menerima permintaan untuk mereset password akun Anda di Sistem Administrasi Desa Sungai Meranti.
        </div>
        
        <div class="otp-section">
            <div class="otp-label">KODE OTP ANDA</div>
            <div class="otp-code">{{ $otp }}</div>
            <div class="otp-expiry">⏰ Kode ini berlaku selama 5 menit</div>
        </div>

        <div class="warning-box">
            <div class="warning-title">
                <span>⚠️</span>
                <strong>PENTING - Keamanan Akun</strong>
            </div>
            <ul class="warning-list">
                <li>Jangan bagikan kode ini kepada <strong>siapa pun</strong></li>
                <li>Jika Anda <em>tidak</em> meminta reset password, abaikan email ini</li>
                <li>Kode ini hanya dapat digunakan <strong>sekali</strong></li>
                <li>Jangan masukkan kode ini di situs web selain Sistem Desa Sungai Meranti</li>
            </ul>
        </div>

        <div class="message">
            Silakan masukkan kode OTP di halaman verifikasi untuk melanjutkan proses reset password akun Anda.
        </div>

        <div class="signature">
            Terima kasih,<br>
            <strong>Tim Admin Desa Sungai Meranti</strong>
        </div>

        <div class="footer">
            <p><strong>Email Otomatis Sistem</strong></p>
            <p>Desa Sungai Meranti, Kecamatan Pinggir, Kabupaten Bengkalis</p>
            <p>Email: <a href="mailto:sungaimeranti@simadesa.id" style="color: #2563eb;">sungaimeranti@simadesa.id</a></p>
            <p>Website: www.desasungaimeranti.id</p>
        </div>
    </div>
</body>
</html>