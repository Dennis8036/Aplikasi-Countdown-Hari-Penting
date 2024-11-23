<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .card {
            margin: 20px; /* Adjust margin as needed */
            padding: 20px; /* Add padding to the card */
            border-radius: 8px; /* Optional: for rounded corners */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional: for shadow effect */
        }
        .table-responsive {
            overflow-x: auto; /* Allow horizontal scroll if needed */
        }
        .table {
            min-width: 1300px; /* Ensure table is wide enough */
        }
    </style>
</head>
<body>
    <!-- Sidebar start -->
    <!-- Your sidebar code here -->
    <!-- Sidebar end -->

    <!-- Content body start -->

        <!-- row -->

       
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                           
                                <table class="table">
                                <!-- General Form Elements -->
                    <form action="<?= base_url('Home/aksi_t_acara') ?>" method="POST">
                        <div class="form-group row">
                            <label for="inputNamaAcara" class="col-sm-2 col-form-label">Nama Acara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Acara" name="nama_acara" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
    <label for="tanggalpeminjaman" class="col-sm-2 col-form-label">Tanggal Hari ini</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="tanggal" id="tanggalpeminjaman" readonly style="background-color: white;">
    </div>
</div>

                        <div class="form-group row">
                            <label for="inputTanggalAcara" class="col-sm-2 col-form-label">Tanggal Acara</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_acara" required>
                            </div>
                        </div>

<div class="form-group row">
    <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="status" value="Aktif" readonly>
    </div>
</div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                            </table>
                        </div>
                    </div>

                    <script>
    var today = new Date();
    today.setHours(24, 0, 0, 0); // Set waktu ke 24:00 (tengah malam)
    var date = today.toISOString().split('T')[0]; // Mengambil hanya bagian tanggal (YYYY-MM-DD)
    document.getElementById('tanggalpeminjaman').value = date; // Menetapkan tanggal ke input
</script>