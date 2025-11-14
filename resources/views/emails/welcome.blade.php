@extends('emails.layout')

@section('title')
    Selamat Datang di Sistem Digital Desa Sungai Meranti
@endsection

@section('content')
    <div style="padding: 20px 0;">
        <h1 style="color: #1f2937; font-size: 24px; margin-bottom: 20px;">
            Selamat Datang, {{ $user->nama }}!
        </h1>
        
        <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Terima kasih telah mendaftar di sistem digital Desa Sungai Meranti. Akun Anda telah berhasil dibuat dan siap digunakan.
        </p>

        <!-- Account Information -->
        <div style="background: #f0f9ff; border-radius: 8px; padding: 24px; margin: 24px 0; border-left: 4px solid #3b82f6;">
            <h3 style="color: #1e40af; font-size: 18px; margin: 0 0 16px 0;">Informasi Akun</h3>
            <div style="color: #1e40af; font-size: 14px;">
                <p style="margin: 8px 0;"><strong>NIK:</strong> {{ $user->nik }}</p>
                <p style="margin: 8px 0;"><strong>Nama Lengkap:</strong> {{ $user->nama }}</p>
                <p style="margin: 8px 0;"><strong>Email:</strong> {{ $user->email }}</p>
                <p style="margin: 8px 0;"><strong>Nomor HP:</strong> {{ $user->no_hp }}</p>
                <p style="margin: 8px 0;"><strong>Tanggal Registrasi:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <!-- Features -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 24px 0;">
            <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 16px 0;">Layanan yang Dapat Anda Gunakan:</h3>
            <ul style="color: #4b5563; font-size: 14px; line-height: 1.6; margin: 0; padding-left: 20px;">
                <li style="margin: 8px 0;">📋 Mengajukan surat administrasi secara online</li>
                <li style="margin: 8px 0;">📊 Melacak status pengajuan secara real-time</li>
                <li style="margin: 8px 0;">📱 Notifikasi otomatis via email dan SMS</li>
                <li style="margin: 8px 0;">💾 Akses 24/7 tanpa terbatas waktu</li>
                <li style="margin: 8px 0;">🏛️ Semua layanan administrasi desa dalam satu sistem</li>
            </ul>
        </div>

        <!-- Next Steps -->
        <div style="background: #ecfdf5; border-radius: 8px; padding: 20px; margin: 24px 0; border-left: 4px solid #10b981;">
            <h3 style="color: #166534; font-size: 16px; margin: 0 0 12px 0;">Langkah Selanjutnya:</h3>
            <ol style="color: #166534; font-size: 14px; line-height: 1.6; margin: 0; padding-left: 20px;">
                <li style="margin: 8px 0;">Login ke akun Anda menggunakan NIK dan password</li>
                <li style="margin: 8px 0;">Lihat jenis surat yang tersedia di menu "Jenis Surat"</li>
                <li style="margin: 8px 0;">Baca persyaratan untuk setiap jenis surat</li>
                <li style="margin: 8px 0;">Ajukan surat pertama Anda!</li>
            </ol>
        </div>

        <!-- Contact Information -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 24px 0; text-align: center;">
            <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 16px 0;">Butuh Bantuan?</h3>
            <div style="color: #6b7280; font-size: 14px; line-height: 1.8;">
                <p style="margin: 8px 0;">📞 <strong>Telepon:</strong> 0822-8523-3869</p>
                <p style="margin: 8px 0;">📧 <strong>Email:</strong> sungaimeranti.pinggir@gmail.com</p>
                <p style="margin: 8px 0;">🕒 <strong>Jam Kerja:</strong> Senin - Jumat, 08:00 - 16:00 WIB</p>
                <p style="margin: 8px 0;">📍 <strong>Kantor Desa:</strong> Desa Sungai Meranti, Kecamatan Pinggir, Kabupaten Bengkalis</p>
            </div>
        </div>

        <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin: 24px 0;">
            Kami berkomitmen untuk memberikan layanan terbaik bagi warga Desa Sungai Meranti. Jika Anda memiliki pertanyaan atau kendala, jangan hesitate untuk menghubungi kami.
        </p>

        <div style="text-align: center; margin: 32px 0;">
            <a href="{{ url('/login') }}" style="display: inline-block; background: #3b82f6; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: 500;">
                🚀 Mulai Mengakses Sistem
            </a>
        </div>

        <p style="color: #6b7280; font-size: 14px; margin: 32px 0 0 0; padding-top: 24px; border-top: 1px solid #e5e7eb;">
            Terima kasih telah mempercayai sistem digital Desa Sungai Meranti.<br>
            Sistem Digital Desa Sungai Meranti © 2025
        </p>
    </div>
@endsection