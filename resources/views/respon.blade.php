<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respon Pertanyaan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px 15px;
        }

        /* Label Badge Respon */
        .respon-header {
            background-color: #e8f3ec;
            color: #2b543a;
            padding: 8px 18px;
            border-radius: 8px;
            display: inline-block;
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 25px;
        }

        /* Card Utama */
        .thankyou-card {
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .thankyou-card h2 {
            color: #3E97FF;
            font-weight: 700;
        }

        /* Kotak Pertanyaan */
        .question-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3E97FF;
            border-radius: 6px;
            padding: 15px 20px;
            margin: 25px 0;
        }

        .email-info {
            color: #6c757d;
            font-style: italic;
            font-size: 0.95rem;
        }

        .btn-primary {
            background-color: #3E97FF;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #2b82eb;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Badge Respon -->
        <div class="respon-header">Respon</div>

        <!-- Card Respon -->
        <div class="thankyou-card">
            <h2>Terima Kasih, {{ $nama }}! 🎉</h2>
            <p class="text-muted">Pertanyaan Anda telah berhasil dikirim.</p>

            <div class="question-box">
                <strong>Pertanyaan Anda:</strong><br>
                "{{ $pertanyaan }}"
            </div>

            <p class="email-info mb-2">
                Pertanyaan Anda akan segera kami tanggapi dan balas melalui email <strong>{{ $email }}</strong>.
            </p>
            <p class="email-info mb-4">
                Mohon cek kotak masuk atau folder spam Anda secara berkala.
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
