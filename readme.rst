###################
SIPUSKOM
###################

SIPUSKOM adalah sistem informasi dari UPT Puskom yang menyediakan fitur pendaftaran pelatihan baik yang ada di jadwal maupun yang direquest sendiri melalui pelatihan custom.
Proses bisnis yang terjadi adalah:
1.&nbsp;User melakukan pendaftaran melalui menu pendaftaran
2.&nbsp;Bila user memiliki Telegram harap lakukan add friend dengan @uptpuskom_bot kemudian kirim /start untuk mendapatkan CHAT ID Telegram
3.&nbsp;Setelah user mengisi data maka user akan menerima notifikasi baik berupa email dan telegram, demikian juga link akun yang didaftarkan di admin di tabel akun_sosial. Semua akun email dan telegram yang ada di tabel tersebut mendapat CC atau notifikasi bila ada user yang mendaftar pelatihan.
4.&nbsp;Email atau telegram berisi ID Pembayaran yang bisa digunakan user untuk melakukan konfirmasi pembayaran.
5.&nbsp;Setelah user mentransfer sejumlah biaya yang ada di email maupun telegram maka user bisa melakukan konfirmasi pembayaran dengan memasukkan ID Pembayaran dan Kode Transaksi pembayaran.
6.&nbsp;Setelah user melakukan konfirmasi maka data tersebut akan diproses lebih lanjut oleh admin sistem.
7.&nbsp;Setelah admin sistem mengecek transaksi dan memastikan pembayaran maka admin bisa melakukan konfirmasi untuk mengirim email notifikasi atau telegram bahwa Peserta sudah bisa login ke sistem melalui menu cek pembayaran.
8.&nbsp;User akan mendapat email notifikasi bahwa sudah bisa login ke sistem.
9.&nbsp;User bisa melakukan login melalui menu login menggunakan username berupa email.
10.&nbsp;Pelatihan yang sudah dikonfirmasi tidak bisa diedit atau didelete.
11.&nbsp;Bila user ingin menambah pelatihan baru dan kemudian ingin mengganti maka setiap perubahan akan diemail ke admin juga user.
12.&nbsp;User bisa melakukan penambahan pelatihan kemudian pilih jadwal tersedia atau pelatihan custom (sedang dikembangkan).

###################
Catatan
###################
1. Untuk masuk ke menu admin bisa diakses ke localhost/sipuskom/Sadmin dengan username dan password admin