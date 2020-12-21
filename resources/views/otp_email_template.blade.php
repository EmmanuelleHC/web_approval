<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  	Email ini dikirim kan kepada :<STRONG>{{$nama}}</STRONG>, jika anda bukan yang dituju atau tidak merasa melakukan request OTP, maka abaikan email berikut.<br><br>
   Berikut adalah data OTP yang dapat anda gunakan untuk 1 (satu) hari transaksi pada program Approval :
   <br>
   <table border='0' align='center' width='100%' style='font-size:13px;font-family:Arial, Helvetica, sans-serif;'>
    <tr>
     <td width='15%'><STRONG>Ref. Num</STRONG></td>
     <td width='1%'><STRONG>:</STRONG></td>
     <td><STRONG>{{$reff_num}}</STRONG></td>
    </tr>
    <tr>
     <td width='15%'><STRONG>OTP. Num</STRONG></td>
     <td width='1%'><STRONG>:</STRONG></td>
     <td><STRONG>{{$otp_num}}</STRONG></td>
    </tr>
    <tr>
     <td width='15%'><STRONG>Berlaku Hingga</STRONG></td>
     <td width='1%'><STRONG>:</STRONG></td>
     <td><STRONG>{{$expired_date}}</STRONG></td>
    </tr>
  
   </table>
    <br>Program dapat diakses di {{$link_program}}
    <br><br><br>
    <br>Atas perhatiannya kami ucapkan terimakasih.
    <br><br><br>
    Supported by IT Support SD6<br>
    PT.Indomarco Prismatama<br>
    Phone: 021-6909400 Ext (306,316)<br>

  </body>
</html>
