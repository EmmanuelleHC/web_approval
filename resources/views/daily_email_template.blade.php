
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border='0' align='center' width='100%' style='font-size:12px;font-family:Arial, Helvetica, sans-serif;'>
          <tr>
           <td colspan='7'>Email ini dikirim kan kepada :<STRONG>{{$emp_name}}</STRONG></td>
          </tr>
          <tr>
            <td colspan='7'> Dengan email ini diberitahukan bahwa ada permohonan P3AT yang harus saudara/i approve/reject di web approval dengan detail sebagai berikut </td>
          </tr>
          <tr>
            <td colspan='7'></td>
          </tr>
          <tr>
            <td colspan='7'>
              <table border='1' width='35%' cellpadding='5' style='font-size:12'>
                <tr>
                  <td align='center' style='background: #CCC'><strong>P3AT Number</strong></td>
                </tr>
                @foreach($p3at_arr as $key => $data)
                    <tr>
                      
                      <td>{{$data}}</td> 
                     
                    </tr>
                  @endforeach            
              </table>
            </td>
          </tr>
          <tr>
            <td colspan='7'></td>
          </tr>
          <tr>
            <td colspan='7'></td>
          </tr>
            <tr>
            <td colspan='7'>Program dapat diakses di {{$link_program}}</td>
          </tr>
          <tr>
            <td colspan='7'>Atas perhatiannya kami ucapkan terimakasih.</td>
          </tr>
        </table>
        <br><br>
        Supported by IT Support SD6<br>
        PT.Indomarco Prismatama<br>
        Phone: 021-6909400 Ext (306,316)<br>
        

  </body>
</html>
