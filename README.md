# Tugas-Akhir

Requirement
1. PHP 7.2
2. Laravel >= 5.8
3. Python 3

Kodingan paling baru terdapat pada branch new

Dokumen buku, poster dll ada di folder dokumen
File dump database ada di folder dokumen


Script-script Python:
1. audit.py --> script verifikasi file, dijalankan pada server aplikasi secara crontab
2. recovery.py --> script recovery file yang hilang, dijalankan pada server backup secara crontab
3. send-sql.py --> script backup database, dijalankan pada server database secara crontab


Hal-hal yang perlu diperhatikan:
1. Setting scp agar tidak perlu login (dijalankan dari web). tutorial --> https://alvinalexander.com/linux-unix/how-use-scp-without-password-backups-copy
2. Pelajari penggunaan library yang digunakan pada script python
