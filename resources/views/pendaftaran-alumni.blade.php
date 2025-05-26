<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Alumni</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .header-section {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 30px;
        }
        .form-section {
            padding: 30px;
        }
        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .upload-area:hover {
            border-color: #4e73df;
            background-color: #f8f9fc;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-primary:hover {
            background-color: #224abe;
            border-color: #224abe;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <div class="header-section">
                        <h1 class="display-6 fw-bold mb-2"><i class="bi bi-mortarboard-fill me-2"></i>Pendaftaran Alumni</h1>
                        <p class="lead mb-0">Silakan lengkapi formulir berikut untuk mendaftar sebagai alumni</p>
                    </div>
                    
                    <div class="form-section">
                        <form>
                            <!-- Biodata Section -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="bi bi-person-lines-fill me-2"></i>Biodata Lulusan</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fullName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nim" class="form-label">NISN</label>
                                        <input type="text" class="form-control" id="nim" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="faculty" class="form-label">Jurusan</label>
                                        <select class="form-select" id="faculty" required>
                                            <option value="" selected disabled>Pilih Jurusan</option>
                                            <option>RPL</option>
                                            <option>DKV</option>
                                            <option>Manajemen Perkantoran</option>
                                            <option>Akuntansi</option>
                                            <option>KKBT</option>
                                            <option>Bisnis Digital</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="graduationYear" class="form-label">Tahun Lulus</label>
                                        <select class="form-select" id="graduationYear" required>
                                            <option value="" selected disabled>Pilih Tahun</option>
                                            <option>2025</option>
                                            <option>2024</option>
                                            <option>2023</option>
                                            <option>2022</option>
                                            <option>2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="address" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CV Upload Section -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="bi bi-file-earmark-text me-2"></i>Upload CV</h4>
                                <div class="upload-area" id="uploadArea">
                                    <i class="bi bi-cloud-arrow-up fs-1 text-primary"></i>
                                    <h5 class="mt-3">Unggah CV Anda</h5>
                                    <p class="text-muted">Format yang diterima: PDF, DOC, DOCX (Maks. 5MB)</p>
                                    <input type="file" id="cvFile" class="d-none" accept=".pdf,.doc,.docx">
                                    <button type="button" class="btn btn-outline-primary px-4" onclick="document.getElementById('cvFile').click()">
                                        <i class="bi bi-upload me-2"></i>Pilih File
                                    </button>
                                    <p class="mt-2 mb-0 small text-muted" id="selectedFile">Belum ada file yang dipilih</p>
                                </div>
                            </div>
                            
                            <!-- Job Interest Section -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="bi bi-briefcase me-2"></i>Minat Pekerjaan</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="jobField" class="form-label">Bidang Pekerjaan</label>
                                        <select class="form-select" id="jobField" required>
                                            <option value="" selected disabled>Pilih Bidang</option>
                                            <option>Teknologi Informasi</option>
                                            <option>Keuangan</option>
                                            <option>Kesehatan</option>
                                            <option>Pendidikan</option>
                                            <option>Manufaktur</option>
                                            <option>Jasa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jobPosition" class="form-label">Posisi yang Diminati</label>
                                        <input type="text" class="form-control" id="jobPosition" placeholder="Contoh: Software Engineer" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="skills" class="form-label">Keahlian</label>
                                        <input type="text" class="form-control" id="skills" placeholder="Contoh: Java, Python, Leadership, Public Speaking" required>
                                        <div class="form-text">Pisahkan setiap keahlian dengan koma</div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label d-block">Preferensi Lokasi Kerja</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="localCheck" value="local">
                                            <label class="form-check-label" for="localCheck">Dalam Negeri</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="internationalCheck" value="international">
                                            <label class="form-check-label" for="internationalCheck">Luar Negeri</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="remoteCheck" value="remote">
                                            <label class="form-check-label" for="remoteCheck">Remote</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-light px-4">Reset</button>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-send me-2"></i>Kirim Pendaftaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-muted small">© 2025 Sistem Pendaftaran Alumni. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk menampilkan nama file yang dipilih
        document.getElementById('cvFile').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Belum ada file yang dipilih';
            document.getElementById('selectedFile').textContent = fileName;
        });
        
        // Script untuk klik area upload
        document.getElementById('uploadArea').addEventListener('click', function(e) {
            if (e.target.tagName !== 'BUTTON') {
                document.getElementById('cvFile').click();
            }
        });
    </script>
</body>
</html>