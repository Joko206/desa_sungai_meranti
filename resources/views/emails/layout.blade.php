<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Digital Desa Sungai Meranti')</title>
    <style>
        /* Email styles */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #1f2937;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 24px;
            text-align: center;
        }
        
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .email-content {
            padding: 32px 24px;
            background-color: #ffffff;
        }
        
        .email-footer {
            background-color: #f3f4f6;
            padding: 20px 24px;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
        
        .logo {
            max-height: 60px;
            margin-bottom: 16px;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            
            .email-content {
                padding: 24px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <img src="{{ asset('storage/logo-desa.png') }}" alt="Logo Desa Sungai Meranti" class="logo" onerror="this.style.display='none'">
            <h1>Sistem Digital Desa Sungai Meranti</h1>
        </div>
        
        <!-- Content -->
        <div class="email-content">
            @yield('content')
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <p><strong>Sistem Digital Desa Sungai Meranti</strong></p>
            <p>Desa Sungai Meranti, Kabupaten Pelalawan, Provinsi Riau</p>
            <p>Telepon: (0761) 123-456 | Email: info@desasungaimeranti.com</p>
            <p style="margin-top: 16px; font-size: 12px; color: #9ca3af;">
                © 2025 Desa Sungai Meranti. Semua hak dilindungi.
            </p>
        </div>
    </div>
</body>
</html>