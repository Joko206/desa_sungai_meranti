@extends('emails.layout')

@section('title')
    Update Status Pengajuan Surat
@endsection

@section('content')
    <div style="padding: 20px 0;">
        <h1 style="color: #1f2937; font-size: 24px; margin-bottom: 20px;">
            Halo {{ $data['user_name'] }},
        </h1>
        
        <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
            Kami ingin menginformasikan bahwa status pengajuan surat Anda telah diperbarui.
        </p>

        <!-- Status Card -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 24px; margin: 24px 0; border-left: 4px solid {{ $data['status_color'] === 'green' ? '#10b981' : ($data['status_color'] === 'red' ? '#ef4444' : ($data['status_color'] === 'blue' ? '#3b82f6' : '#f59e0b')) }};">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <h2 style="color: #1f2937; font-size: 18px; margin: 0;">Status Pengajuan</h2>
                <span style="background: {{ $data['status_color'] === 'green' ? '#dcfce7' : ($data['status_color'] === 'red' ? '#fee2e2' : ($data['status_color'] === 'blue' ? '#dbeafe' : '#fef3c7')) }}; color: {{ $data['status_color'] === 'green' ? '#166534' : ($data['status_color'] === 'red' ? '#991b1b' : ($data['status_color'] === 'blue' ? '#1e40af' : '#92400e')) }}; padding: 4px 12px; border-radius: 20px; font-size: 14px; font-weight: 500;">
                    {{ $data['status'] }}
                </span>
            </div>
            
            <div style="color: #6b7280; font-size: 14px;">
                <p style="margin: 8px 0;"><strong>ID Pengajuan:</strong> #{{ $data['pengajuan_id'] }}</p>
                <p style="margin: 8px 0;"><strong>Jenis Surat:</strong> {{ $data['jenis_surat'] }}</p>
                <p style="margin: 8px 0;"><strong>Diajukan:</strong> {{ $data['submitted_date'] }}</p>
                @if($data['estimated_completion'])
                    <p style="margin: 8px 0;"><strong>Estimasi Selesai:</strong> {{ $data['estimated_completion'] }}</p>
                @endif
            </div>
        </div>

        <!-- Next Steps -->
        @if(count($data['next_steps']) > 0)
            <div style="background: #f0f9ff; border-radius: 8px; padding: 20px; margin: 24px 0;">
                <h3 style="color: #1e40af; font-size: 16px; margin: 0 0 16px 0;">
                    Langkah Selanjutnya:
                </h3>
                <ul style="color: #1e40af; font-size: 14px; line-height: 1.6; margin: 0; padding-left: 20px;">
                    @foreach($data['next_steps'] as $step)
                        <li style="margin: 8px 0;">{{ $step }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Admin Notes -->
        @if($data['admin_notes'])
            <div style="background: #fef2f2; border-radius: 8px; padding: 20px; margin: 24px 0; border: 1px solid #fecaca;">
                <h3 style="color: #991b1b; font-size: 16px; margin: 0 0 12px 0;">
                    Catatan dari Admin:
                </h3>
                <p style="color: #991b1b; font-size: 14px; line-height: 1.6; margin: 0;">
                    {{ $data['admin_notes'] }}
                </p>
            </div>
        @endif

        <!-- Contact Information -->
        <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 24px 0; text-align: center;">
            <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 16px 0;">Hubungi Kami</h3>
            <div style="color: #6b7280; font-size: 14px; line-height: 1.8;">
                <p style="margin: 8px 0;">📞 <strong>Telepon:</strong> {{ $data['contact_info']['phone'] }}</p>
                <p style="margin: 8px 0;">📧 <strong>Email:</strong> {{ $data['contact_info']['email'] }}</p>
                <p style="margin: 8px 0;">🕒 <strong>Jam Kerja:</strong> {{ $data['contact_info']['office_hours'] }}</p>
            </div>
        </div>

        <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin: 24px 0;">
            Terima kasih telah menggunakan layanan sistem digital Desa Sungai Meranti. Jika Anda memiliki pertanyaan, silakan hubungi kami melalui kontak di atas.
        </p>

        <p style="color: #6b7280; font-size: 14px; margin: 32px 0 0 0; padding-top: 24px; border-top: 1px solid #e5e7eb;">
            Email ini dikirim secara otomatis. Mohon jangan membalas email ini.<br>
            Sistem Digital Desa Sungai Meranti © 2025
        </p>
    </div>
@endsection