<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengajuanStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, string $status)
    {
        $this->data = $data;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subjects = [
            'pending' => 'Pengajuan Surat Anda Sedang Direview - Desa Sungai Meranti',
            'processing' => 'Pengajuan Surat Anda Sedang Diproses - Desa Sungai Meranti',
            'approved' => 'Selamat! Pengajuan Surat Anda Disetujui - Desa Sungai Meranti',
            'rejected' => 'Informasi Status Pengajuan Surat - Desa Sungai Meranti',
            'completed' => 'Surat Anda Sudah Selesai - Desa Sungai Meranti',
            'status_update' => 'Update Status Pengajuan Surat - Desa Sungai Meranti'
        ];

        return new Envelope(
            subject: $subjects[$this->status] ?? 'Update Status Pengajuan Surat - Desa Sungai Meranti',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pengajuan-status',
            with: [
                'data' => $this->data,
                'status' => $this->status
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}