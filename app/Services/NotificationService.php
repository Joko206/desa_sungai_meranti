<?php

namespace App\Services;

use App\Models\PengajuanSurat;
use App\Models\UserDesa;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Send email notification for pengajuan status change
     */
    public function sendPengajuanStatusNotification(PengajuanSurat $pengajuan, string $status, ?string $adminNotes = null): void
    {
        try {
            $user = $pengajuan->pemohon;
            
            if (!$user || !$user->email) {
                Log::warning('Cannot send email notification - no user email found', [
                    'pengajuan_id' => $pengajuan->id,
                    'user_id' => $user ? $user->id : null
                ]);
                return;
            }

            $emailData = $this->getStatusEmailData($pengajuan, $status, $adminNotes);
            
            // Send email based on status
            switch ($status) {
                case 'approved':
                    $this->sendApprovalEmail($user, $emailData);
                    break;
                case 'rejected':
                    $this->sendRejectionEmail($user, $emailData);
                    break;
                case 'pending':
                    $this->sendPendingEmail($user, $emailData);
                    break;
                case 'processing':
                    $this->sendProcessingEmail($user, $emailData);
                    break;
                case 'completed':
                    $this->sendCompletedEmail($user, $emailData);
                    break;
                default:
                    $this->sendStatusUpdateEmail($user, $emailData);
                    break;
            }

            // Log the notification
            Log::info('Email notification sent', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'pengajuan_id' => $pengajuan->id,
                'status' => $status
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send email notification', [
                'error' => $e->getMessage(),
                'pengajuan_id' => $pengajuan->id,
                'status' => $status
            ]);
        }
    }

    /**
     * Get email data based on status
     */
    private function getStatusEmailData(PengajuanSurat $pengajuan, string $status, ?string $adminNotes = null): array
    {
        $jenisSurat = $pengajuan->jenis;
        $user = $pengajuan->pemohon;
        
        if (!$user) {
            Log::warning('Cannot get user data for email notification', [
                'pengajuan_id' => $pengajuan->id
            ]);
            return [
                'user_name' => 'User Tidak Dikenal',
                'user_nik' => 'N/A',
                'pengajuan_id' => $pengajuan->id,
                'jenis_surat' => $jenisSurat->nama_surat ?? 'Surat',
                'submitted_date' => $pengajuan->created_at->format('d/m/Y H:i'),
                'status' => $this->getStatusText($status),
                'status_color' => $this->getStatusColor($status),
                'admin_notes' => $adminNotes,
                'estimated_completion' => $this->getEstimatedCompletion($status),
                'next_steps' => $this->getNextSteps($status),
                'contact_info' => [
                    'phone' => '(0761) 123-456',
                    'email' => 'info@desasungaimeranti.com',
                    'office_hours' => 'Senin - Jumat, 08:00 - 16:00 WIB'
                ]
            ];
        }
        
        return [
            'user_name' => $user->nama,
            'user_nik' => $user->nik,
            'pengajuan_id' => $pengajuan->id,
            'jenis_surat' => $jenisSurat->nama_surat ?? 'Surat',
            'submitted_date' => $pengajuan->created_at->format('d/m/Y H:i'),
            'status' => $this->getStatusText($status),
            'status_color' => $this->getStatusColor($status),
            'admin_notes' => $adminNotes,
            'estimated_completion' => $this->getEstimatedCompletion($status),
            'next_steps' => $this->getNextSteps($status),
            'contact_info' => [
                'phone' => '(0761) 123-456',
                'email' => 'info@desasungaimeranti.com',
                'office_hours' => 'Senin - Jumat, 08:00 - 16:00 WIB'
            ]
        ];
    }

    /**
     * Get status text in Indonesian
     */
    private function getStatusText(string $status): string
    {
        $statusMap = [
            'pending' => 'Menunggu Review',
            'processing' => 'Sedang Diproses',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan'
        ];

        return $statusMap[$status] ?? ucfirst($status);
    }

    /**
     * Get status color for email template
     */
    private function getStatusColor(string $status): string
    {
        $colorMap = [
            'pending' => 'orange',
            'processing' => 'blue',
            'approved' => 'green',
            'rejected' => 'red',
            'completed' => 'green',
            'cancelled' => 'gray'
        ];

        return $colorMap[$status] ?? 'gray';
    }

    /**
     * Get estimated completion time
     */
    private function getEstimatedCompletion(string $status): ?string
    {
        $estimates = [
            'pending' => '1-2 hari kerja',
            'processing' => '3-5 hari kerja',
            'approved' => 'Surat akan segera selesai',
            'rejected' => null,
            'completed' => 'Selesai',
            'cancelled' => null
        ];

        return $estimates[$status] ?? null;
    }

    /**
     * Get next steps for user
     */
    private function getNextSteps(string $status): array
    {
        $steps = [
            'pending' => [
                'Tim kami sedang melakukan review awal',
                'Anda akan mendapat notifikasi setelah review selesai',
                'Pastikan dokumen persyaratan sudah lengkap'
            ],
            'processing' => [
                'Pengajuan Anda sedang diproses',
                'Mohon bersabar, proses biasanya memakan waktu 3-5 hari kerja',
                'Anda akan mendapat notifikasi ketika selesai'
            ],
            'approved' => [
                'Selamat! Pengajuan Anda telah disetujui',
                'Surat akan segera dibuat oleh tim kami',
                'Anda akan mendapat notifikasi ketika surat siap'
            ],
            'rejected' => [
                'Maaf, pengajuan Anda tidak dapat diproses',
                'Silakan baca alasan penolakan di bawah',
                'Anda dapat mengajukan kembali dengan melengkapi persyaratan'
            ],
            'completed' => [
                'Surat Anda telah selesai',
                'Silakan datang ke kantor desa untuk mengambil surat',
                'Bawa identitas diri saat mengambil surat'
            ]
        ];

        return $steps[$status] ?? [];
    }

    /**
     * Send approval email
     */
    private function sendApprovalEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'approved'));
    }

    /**
     * Send rejection email
     */
    private function sendRejectionEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'rejected'));
    }

    /**
     * Send pending email
     */
    private function sendPendingEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'pending'));
    }

    /**
     * Send processing email
     */
    private function sendProcessingEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'processing'));
    }

    /**
     * Send completed email
     */
    private function sendCompletedEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'completed'));
    }

    /**
     * Send general status update email
     */
    private function sendStatusUpdateEmail(UserDesa $user, array $data): void
    {
        Mail::to($user->email)->send(new \App\Mail\PengajuanStatusMail($data, 'status_update'));
    }

    /**
     * Send welcome email for new registrations
     */
    public function sendWelcomeEmail(UserDesa $user): void
    {
        try {
            Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));
            
            Log::info('Welcome email sent', [
                'user_id' => $user->id,
                'user_email' => $user->email
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send welcome email', [
                'error' => $e->getMessage(),
                'user_id' => $user->id
            ]);
        }
    }

    /**
     * Send password reset email
     */
    public function sendPasswordResetEmail(UserDesa $user, string $token): void
    {
        try {
            Mail::to($user->email)->send(new \App\Mail\PasswordResetMail($user, $token));
            
            Log::info('Password reset email sent', [
                'user_id' => $user->id,
                'user_email' => $user->email
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send password reset email', [
                'error' => $e->getMessage(),
                'user_id' => $user->id
            ]);
        }
    }
}