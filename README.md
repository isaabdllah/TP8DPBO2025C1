## Janji
Saya Muhammad Isa Abdullah dengan NIM 2303508 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

# Sistem Informasi Akademik Sederhana (MVC)

## Desain Program
Program ini merupakan aplikasi web sederhana untuk mengelola data Mahasiswa, Dosen, Mata Kuliah, dan Pengambilan Mata Kuliah (KRS) menggunakan pola arsitektur **MVC (Model-View-Controller)**. Tampilan dibuat responsif dan estetik dengan Bootstrap.

### Struktur Data (Database)
- **Tabel `mahasiswa`**: menyimpan data mahasiswa
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `nama` (VARCHAR)
  - `nim` (VARCHAR)
  - `telepon` (VARCHAR)
  - `email` (VARCHAR)
  - `tanggal_masuk` (DATE)
- **Tabel `dosen`**: menyimpan data dosen
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `nama_dosen` (VARCHAR)
  - `nip` (VARCHAR)
  - `email` (VARCHAR)
- **Tabel `mata_kuliah`**: menyimpan data mata kuliah
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `nama_mk` (VARCHAR)
  - `kode_mk` (VARCHAR)
  - `id_dosen` (INT, FOREIGN KEY ke dosen)
- **Tabel `ambil_mk`**: menyimpan data pengambilan mata kuliah oleh mahasiswa
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `id_mahasiswa` (INT, FOREIGN KEY ke mahasiswa)
  - `id_mk` (INT, FOREIGN KEY ke mata_kuliah)
  - `semester` (VARCHAR)

### Konsep MVC pada Program
- **Model**: Berisi logika akses data ke database (file di folder `model/`). Contoh: `Mahasiswa.php`, `Dosen.php`, dll.
- **View**: Berisi file tampilan antarmuka pengguna (folder `view/`). Setiap entitas memiliki halaman index, tambah, dan edit.
- **Controller**: Menjembatani input user dari view ke model, mengatur alur data dan aksi (folder `controller/`).

Dengan konsep ini, kode menjadi lebih terstruktur, mudah dikembangkan, dan dipelihara.

## Penjelasan Alur Program
1. Pengguna membuka halaman utama (`index.php`) yang berisi navigasi ke menu Mahasiswa, Dosen, Mata Kuliah, dan Pengambilan MK.
2. Pengguna memilih menu, lalu diarahkan ke halaman data terkait (misal: Mahasiswa).
3. Pada halaman data, pengguna dapat melakukan aksi **Tambah**, **Edit**, dan **Hapus** data.
4. Setiap aksi (tambah/edit/hapus) akan diproses oleh controller, yang kemudian memanggil model untuk berinteraksi dengan database.
5. Setelah aksi berhasil, pengguna akan diarahkan kembali ke halaman data terkait.
6. Terdapat tombol kembali ke beranda di setiap halaman index data.

## Dokumentasi Penggunaan
![alt text](dokumTP8.gif)