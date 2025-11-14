@extends('emails.layout')

@section('title')
    Reset Password - Desa Sungai Meranti
@endsection

@section('content')
    <div style="padding: 20px 0;">
        <h1 style="color: #1f2937; font-size: 24px; margin-bottom: 20px;">
            Halo {{ $user->nama }},
        </h1>
        
        <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Kami menerima permintaan untuk mereset password akun Anda di sistem digital Desa Sungai Meranti.
        </p>

        <!-- Reset Instructions -->
        <div style="background: #fef3c7; border-radius: 8px; padding: 24px; margin: 24px 0; border-left: 4px solid #f59e0b;">
            <h3 style="color: #92400e; font-size: 18px; margin: 0 0 16px 0;">🔒 Petunjuk Reset Password</h3>
            <p style="color: #92400e; font-size: 14px; line-height: 1.6; margin-bottom: 16px;">
                Klik tombol di bawah ini untuk mereset password Anda. Tautan ini akan kadaluarsa dalam <strong>1 jam</strong>.
            </p>
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ url('/password/reset/' . $token) }}" style="display: inline-block; background: #f59e0b; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: 500;">
                    🔐 Reset Password Saya
                </a>
            </div>
        </div>

        <!-- Security Information -->
        <div style="background: #fee2e2; border-radius: 8px; padding: 20px; margin: 24px 0; border-left: 4px solid #ef4444;">
            <h3 style="color: #991b1b; font-size: 16px; margin: 0 0 12px 0;">⚠️ Informasi Keamanan</h3>
            <ul style="color: #991b1b; font-size: 14px; line-height: 1.6; margin: 0; padding-left: 20px;">
                <li style="margin: 8px 0;">Tautan reset password ini hanya berlaku selama 1 jam</li>
                <li style="margin: 8px 0;">Jika Anda tidak meminta reset password, abaikan email ini</li>
                <li style="margin: 8px 0;">Jangan bagikan tautan ini kepada siapa pun</li>
                <li style="margin: 8px 0;">Pastikan password baru Anda kuat dan mudah diingat</li>
            </ul>
        </div>

        <!-- Account Information -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 24px 0;">
            <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 16px 0;">Informasi Akun</h3>
            <div style="color: #4b5563; font-size: 14px;">
                <p style="margin: 8px 0;"><strong>NIK:</strong> {{ $user->nik }}</p>
                <p style="margin: 8px 0;"><strong>Nama:</strong> {{ $user->nama }}</p>
                <p style="margin: 8px 0;"><strong>Email:</strong> {{ $user->email }}</p>
                <p style="margin: 8px 0;"><strong>Waktu Permintaan:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} WIB</p>
            </div>
        </div>

        <!-- Alternative Reset Method -->
        <div style="background: #f0f9ff; border-radius: 8px; padding: 20px; margin: 24px 0;">
            <h3 style="color: #1e40af; font-size: 16px; margin: 0 0 12px 0;">Cara Alternatif</h3>
            <p style="color: #1e40af; font-size: 14px; line-height: 1.6; margin: 0;">
                Jika tombol di atas tidak berfungsi, salin dan tempel URL ini ke browser Anda:<br>
                <code style="background: #e0e7ff; padding: 4px 8px; border-radius: 4px; font-size: 12px; word-break: break-all;">
                    {{ url('/password/reset/' . $token) }}
                </code>
            </p>
        </div>

        <!-- Contact Information -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 24px 0; text-align: center;">
            <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 16px 0;">Butuh Bantuan?</h3>
            <div style="color: #6b7280; font-size: 14px; line-height: 1.8;">
                <p style="margin: 8px 0;">📞 <strong>Telepon:</strong> +62 822-8523-3869</p>
                <p style="margin: 8px 0;">📧 <strong>Email:</strong> sungaimeranti.pinggir@gmail.com</p>
                <p style="margin: 8px 0;">🕒 <strong>Jam Kerja:</strong> Senin - Jumat, 08:00 - 16:00 WIB</p>
            </div>
        </div>

        <p style="color: #6b7280; font-size: 14px; margin: 32px 0 0 0; padding-top: 24px; border-top: 1px solid #e5e7eb;">
            Email ini dikirim secara otomatis dan berisi informasi sensitif. Mohon jangan membalas email ini.<br>
            Jika Anda memiliki pertanyaan, silakan hubungi tim support kami.<br><br>
            Sistem Digital Desa Sungai Meranti © 2025
        </p>
    </div>
@endsection