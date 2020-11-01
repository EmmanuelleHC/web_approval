
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  	<table border='0' align='center' width='100%' style='font-size:12px;font-family:Arial, Helvetica, sans-serif;'>
          <tr>
            <td colspan='7'> Dengan email ini diberitahukan bahwa ada permintaan permohonan Approval P3AT dengan detail sebagai berikut </td>
          </tr>
          <tr>
            <td colspan='7'></td>
          </tr>
          <tr>
            <td width='20%'>No. P3AT</td>
            <td width='5%'>:</td>
            <td>{{$p3at_num}}</td>
            <td width='10%'></td>
            <td width='20%'>NIK Pemohon</td>
            <td width='5%'>:</td>
            <td>{{$emp_num}}</td>
          </tr>
          <tr>
            <td width='20%'>Nama Pemohon</td>
            <td width='5%'>:</td>
            <td>{{$emp_name}}</td>
          </tr>
          <tr>
            <td colspan='7'></td>
          </tr>
          <tr>
            <td colspan='7'>
              <table border='1' width='100%' cellpadding='5' style='font-size:12'>
                <tr>
                  <td align='center' style='background: #CCC'><strong>Asset Number</strong></td>
                  <td align='center' style='background: #CCC'><strong>Asset Name</strong></td>
                  <td align='center' style='background: #CCC'><strong>Asset Location</strong></td>
                  <td align='center' style='background: #CCC'><strong>Asset Price</strong></td>
                  <td align='center' style='background: #CCC'><strong>Qty Asset</strong></td>
                  <td align='center' style='background: #CCC'><strong>Books Price</strong></td>
                  <td align='center' style='background: #CCC'><strong>Cost Of Removal</strong></td>
                  <td align='center' style='background: #CCC'><strong>Status</strong></td>
                </tr>
                @foreach($detail_p3at as $key => $data)
                    <tr>
                      
                      <td>{{$data->ASSET_NUMBER}}</td> 
                       <td>{{$data->ASSET_NAME}}</td>
                       <td>{{$data->ASSET_LOCATION}}</td>
                       <td>{{ number_format($data->ASSET_PRICE, 2) }}</td>
                        <td>{{$data->QTY_ASSET}}</td>
                        <td>{{ number_format($data->BOOKS_PRICE, 2) }}</td>
                        <td>{{ number_format($data->COST_OF_REMOVAL, 2) }}</td>
                         <td>{{$data->STATUS}}</td>
                    </tr>
                  @endforeach            
              </table>
            </td>
          </tr>
          <tr>
            <td colspan='7'></td>
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
