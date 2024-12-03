<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Acara</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
            padding: 20px;
        }

        .countdown-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .countdown-container:hover {
            transform: scale(1.05);
        }

        .countdown-container::before {
            content: "";
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 215, 0, 0.4);
            border-radius: 50%;
            z-index: -1;
            animation: bounce 6s infinite;
        }

        .countdown-container::after {
            content: "";
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255, 105, 180, 0.4);
            border-radius: 50%;
            z-index: -1;
            animation: bounce 8s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(15px);
            }
        }

        .event-title {
            font-size: 2em;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .countdown {
            font-size: 2.5em;
            color: #444;
            margin-top: 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .no-event {
            font-size: 1.5em;
            color: #ff4757;
            margin: 20px 0;
        }

        .cta-button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            font-size: 1.2em;
            color: #fff;
            background: #007bff;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .cta-button:hover {
            background: #0056b3;
            transform: translateY(-5px);
        }

        .acara-history {
            background: #f1f3f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .acara-history h3 {
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .acara-history .event-title {
            font-size: 1.6em;
            color: #28a745;
        }

        .acara-history .no-event {
            color: #ff4757;
            font-size: 1.4em;
        }

        .statistics-card {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
        }

        .statistics-card .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }

        .statistics-card .card h4 {
            font-size: 1.4em;
            margin-bottom: 15px;
            color: #007bff;
        }

        .statistics-card .card p {
            font-size: 1.8em;
            color: #333;
        }

        .social-media-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-media-buttons a {
            font-size: 1.5em;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 15px;
            border-radius: 50%;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .social-media-buttons a:hover {
            background: #0056b3;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="countdown-container">
            <?php if (!empty($acara_terdekat)): ?>
                <div class="event-title">
                    Acara Selanjutnya: <?= $acara_terdekat['nama_acara']; ?>
                </div>
                <div id="countdown" class="countdown"></div>
            <?php else: ?>
                <div class="no-event">Tidak ada acara yang dijadwalkan.</div>
            <?php endif; ?>
        </div>

        <!-- Statistics Section -->
        <div class="statistics-card">
<div class="card">
    <h4>Total Acara</h4>
    <p><?= !empty($total_acara) ? $total_acara : '0'; ?></p>
</div>

            <div class="card">
                <h4>Acara Terdekat</h4>
                <p><?= !empty($acara_terdekat) ? $acara_terdekat['nama_acara'] : 'N/A'; ?></p>
            </div>
<div class="card">
    <h4>Acara Selesai</h4>
    <p><?= !empty($total_history) ? $total_history : '0'; ?></p>
</div>

        </div>

        <!-- Acara Hari Ini -->
        <?php if (!empty($acara_history)): ?>
            <div class="acara-history">
                <h3>Acara Hari Ini:</h3>
                <?php foreach ($acara_history as $acara): ?>
                    <div class="event-title">
                        <?= $acara['nama_acara']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="acara-history">
                <div class="no-event">Tidak ada acara yang terjadi hari ini.</div>
            </div>
        <?php endif; ?>

        <!-- Call to Action Button -->

    </div>

    <script>
        
<?php if (!empty($acara_terdekat)): ?>
    var acaraDateStr = "<?= $acara_terdekat['tanggal_acara']; ?>"; 
    // Ambil tanggal dan waktu dari acara
    var eventDate = new Date(acaraDateStr + " UTC+0700").getTime(); // Tambahkan UTC+0700 untuk memastikan zona waktu Jakarta
    var countdownInterval = setInterval(function() {
        var now = new Date().getTime();
        var distance = eventDate - now;

        if (distance <= 0) {
            clearInterval(countdownInterval);
            document.getElementById('countdown').innerHTML = "Hari " + "<?= $acara_terdekat['nama_acara']; ?>" + " telah tiba!";
        } else {
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('countdown').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        }
    }, 1000);
<?php endif; ?>

    </script>
</body>
</html>
