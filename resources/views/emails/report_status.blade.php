<!DOCTYPE html>
<html>
<head>
    <title>Update Laporan</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        
        <h2 style="color: #1c5132;">Halo, {{ $report->user->name }}!</h2>
        
        <p>Ada pembaruan terkini mengenai laporan sampah yang Anda kirimkan.</p>
        
        <div style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p><strong>Lokasi:</strong> {{ $report->location }}</p>
            <p><strong>Keterangan:</strong> {{ $report->description }}</p>
                @php
                    $statusColor = 'orange'; // Default untuk pending
                    if ($report->status == 'process') {
                        $statusColor = 'blue';
                    } elseif ($report->status == 'completed') {
                        $statusColor = 'green';
                    }
                @endphp
            <p><strong>Status Terbaru:</strong> 
                <span style="font-weight: bold; font-size: 1.2em; color: {{ $statusColor }};">
                    {{ strtoupper($report->status) }}
                </span>
            </p>
        </div>

        @if($report->status == 'completed')
            <p>Terima kasih! Lokasi tersebut telah berhasil kami bersihkan. Anda bisa melihat perubahannya di lokasi langsung.</p>
        @elseif($report->status == 'process')
            <p>Tim kami sedang dalam perjalanan atau sedang bekerja di lokasi saat ini.</p>
        @endif

        <p style="margin-top: 30px; font-size: 0.9em; color: #777;">
            Salam Hijau,<br>
            Tim EcoTrack
        </p>

    </div>

</body>
</html>