<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penetapan Hari Sidang - {{ $perkara->no_reg_pta }}</title>
    <style>
        @page {
            size: A4;
            margin: 2.5cm;
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.8;
            color: #000;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30pt;
            font-weight: bold;
            font-size: 14pt;
            letter-spacing: 3px;
        }
        
        .nomor {
            text-align: center;
            margin-bottom: 25pt;
            font-weight: bold;
        }
        
        .content {
            text-align: justify;
            margin-bottom: 20pt;
        }
        
        .indent {
            text-indent: 1.5cm;
        }
        
        .mark {
            text-decoration: underline;
        }
        
        .signature {
            text-align: right;
            margin-top: 50pt;
        }
        
        .signature-name {
            margin-top: 60pt;
            text-decoration: underline;
            font-weight: bold;
        }
        
        .align-right {
            text-align: right;
        }
        
        .mb-15 {
            margin-bottom: 15pt;
        }
        
        .mt-30 {
            margin-top: 30pt;
        }
        
        /* Print styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            
            .container {
                width: 100%;
                margin: 0;
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Print Button (only visible on screen) -->
        <div class="no-print" style="text-align: center; margin-bottom: 20px;">
            <button onclick="window.print()" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                🖨️ Cetak Dokumen
            </button>
            <button onclick="window.history.back()" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
                ← Kembali
            </button>
        </div>

        <!-- Header -->
        <div class="header">P E N E T A P A N</div>
        
        <!-- Nomor -->
        <div class="nomor">
            Nomor: <span class="mark">{{ $perkara->no_reg_pta }}</span>
        </div>
        
        <!-- Content -->
        <div class="content">
            <p class="indent">
                Ketua Majelis Hakim <span class="mark">Pengadilan Tinggi Agama Bandung</span>;
            </p>
            
            <p class="indent">
                Membaca Penetapan Ketua <span class="mark">Pengadilan Tinggi Agama Bandung</span>,
                tanggal <span class="mark">{{ $perkara->tgl_pmh ? $perkara->tgl_pmh->format('d F Y') : '23 September 2025' }}</span>, 
                Nomor <span class="mark">{{ $perkara->no_reg_pta }}</span>, 
                tentang Penunjukan Majelis Hakim perkara banding Nomor 
                <span class="mark">{{ $perkara->no_reg_pta }}</span>, 
                tanggal <span class="mark">{{ $perkara->tgl_pmh ? $perkara->tgl_pmh->format('d F Y') : '23 September 2025' }}</span> 
                yang diajukan oleh :
            </p>
            
            <p style="margin-left: 1.5cm; margin-bottom: 10pt;">
                <span class="mark">
                    @if($perkara->pembanding)
                        {{ $perkara->pembanding }}
                    @else
                        Deni Irawan bin Nono Suarno, agama Islam, pekerjaan Karyawan Swasta, Pendidikan Sekolah Lanjutan Tingkat Atas, alamat Kampung Sawargi, RT 046 RW 003, Purwarahayu, Taraju, Kabupaten Tasikmalaya, Jawa Barat sebagai Pembanding I;
                    @endif
                </span>,
            </p>
            
            <p class="indent">melawan</p>
            
            <p style="margin-left: 1.5cm; margin-bottom: 15pt;">
                <span class="mark">
                    @if($perkara->terbanding)
                        {{ $perkara->terbanding }}
                    @else
                        Dede Nunik binti Ecep, agama Islam, pekerjaan mengurus rumah tangga, Pendidikan Sekolah Lanjutan Tingkat Pertama, alamat Kampung Sawargi, RT 046 RW 003, Purwarahayu, Taraju, Kabupaten Tasikmalaya, Jawa Barat sebagai Terbanding I;
                    @endif
                </span>,
            </p>
            
            <p class="indent mb-15">
                Menimbang, bahwa hari sidang dalam perkara tersebut telah dapat ditentukan.
            </p>
            
            <p class="indent mb-15">
                Memperhatikan Pasal 145 R.bg serta ketentuan hukum lain yang bersangkutan;
            </p>
            
            <div class="header" style="margin-top: 30pt; margin-bottom: 20pt;">M E N E T A P K A N</div>
            
            <p class="indent">
                Menetapkan bahwa pemeriksaan perkara tersebut akan dilaksanakan pada hari 
                <span class="mark">
                    @if($perkara->tgl_sidang)
                        {{ \Carbon\Carbon::parse($perkara->tgl_sidang)->locale('id')->dayName }}
                    @else
                        Selasa
                    @endif
                </span>, 
                tanggal <span class="mark">
                    @if($perkara->tgl_sidang)
                        {{ \Carbon\Carbon::parse($perkara->tgl_sidang)->format('d F Y') }}
                    @else
                        30 September 2025
                    @endif
                </span>, 
                di ruang sidang <span class="mark">Pengadilan Tinggi Agama Bandung</span>
            </p>
            
            <p class="indent mt-30 align-right">
                Ditetapkan di : <span class="mark">Bandung</span>
            </p>
            
            <p class="indent align-right">
                Pada tanggal : <span class="mark">
                    @if($perkara->tgl_phs)
                        {{ $perkara->tgl_phs->format('d F Y') }}
                    @else
                        23 September 2025
                    @endif
                </span>
            </p>
            
            <div class="signature">
                <div class="signature-name">
                    Ketua Majelis,
                </div>
                <div class="signature-name" style="margin-top: 80pt;">
                    <span class="mark">
                        @if($perkara->hakim_ketua)
                            {{ $perkara->hakim_ketua }}
                        @else
                            Drs. H. NURHAFIZAL, S.H., M.H.
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto focus on print button
        window.onload = function() {
            // Optional: Auto print
            // window.print();
        };
    </script>
</body>
</html>