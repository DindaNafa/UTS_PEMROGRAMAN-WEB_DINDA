<?php
//input nilai akhir

/*prosesnya
Jika Range Nilai :
00,00 - 34,50, maka nilai huruf : E
34,51 - 50,50, maka nilai huruf : D
50,51 - 60,50, maka nilai huruf : C
60,51 - 80,50, maka nilai huruf : B
80,51 - 100,00, maka nilai huruf : A

Jika Nilai atau >= 100 maka invalid
*/
/*Outputnya
nilai_huruf (pilihannya : A,B,C,D,atau E)
predikit pilihan :
A : Sangat memuaskan
B : memuaskan
C : cukup
D : kurang
E : tidak lulus
*/

// Function untuk menghitung nilai huruf dan predikat
function hitungNilai($nilai_akhir)
{
    $hasil = array('nilaihuruf' => '', 'predikat' => '');

    if ((00.00 <= $nilai_akhir) AND ($nilai_akhir <= 34.50)) {
        $hasil['nilaihuruf'] = 'E';
        $hasil['predikat'] = 'Tidak Lulus';
    } elseif ((34.51 <= $nilai_akhir) AND ($nilai_akhir <= 50.50)) {
        $hasil['nilaihuruf'] = 'D';
        $hasil['predikat'] = 'Kurang';
    } elseif ((50.51 <= $nilai_akhir) AND ($nilai_akhir <= 60.50)) {
        $hasil['nilaihuruf'] = 'C';
        $hasil['predikat'] = 'Cukup';
    } elseif ((60.51 <= $nilai_akhir) AND ($nilai_akhir <= 80.50)) {
        $hasil['nilaihuruf'] = 'B';
        $hasil['predikat'] = 'Memuaskan';
    } elseif ((80.51 <= $nilai_akhir) AND ($nilai_akhir <= 100.00)) {
        $hasil['nilaihuruf'] = 'A';
        $hasil['predikat'] = 'Sangat Memuaskan';
    } else {
        $hasil['nilaihuruf'] = 'Invalid';
        $hasil['predikat'] = 'Invalid';
    }

    return $hasil;
}
?>