<?php

namespace App\Mail;

use App\Models\Report; // <-- Import ini
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    // Siapkan variabel untuk menampung data laporan
    public $report;

    // Terima data laporan saat email dibuat
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    // Judul Email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Laporan EcoTrack - ' . $this->report->created_at->format('d M Y'),
        );
    }

    // Isi Email (Nanti kita buat view-nya)
    public function content(): Content
    {
        return new Content(
            view: 'emails.report_status', // Nama file blade
        );
    }

    public function attachments(): array
    {
        return [];
    }
}