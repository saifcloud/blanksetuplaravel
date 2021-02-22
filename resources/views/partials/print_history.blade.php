<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
        <link href="{{ url('public/assets/css/main.css')}}" rel="stylesheet" />
        <title>Print History</title>
    </head>
    <body>
        <div class="print-history-pdf" id="sample">

          <table>
            <tbody>
              <tr>
                <td style="width: 300px;">
                  <img
                class="email-temp-ate-logo-1"
                src="{{ url('public/assets/images/history_image/v1_3.png')}}"
              />
                </td>
                <td style="width: 200px;">

                </td>
              </tr>
            </tbody>
          </table>

          <table>
            <tbody>
              <tr>
                <td style="width: 350px;"></td>
                <td>
                  <h1 class="investment-history valign-text-middle border-class-1 roboto-regular-normal-black-24px">
                    Investment History
                  </h1>
                </td>
              </tr>
            </tbody>
          </table>

          <table style="height: 50px;">
            <tr>
              <td style="width: 350px; vertical-align: middle;">
                <div class="first-name-last-name valign-text-middle border-class-1 roboto-regular-normal-black-16px">
                  {{ Auth::user()->name}}  {{ Auth::user()->lastname}} 
                </div>
              </td>

              <td style="width: 300px; vertical-align: middle;">
                <p class="text-7 valign-text-middle border-class-1 roboto-regular-normal-black-12px">
                  From: {{  Carbon\Carbon::parse($start_date)->format('d M Y') }} - {{  Carbon\Carbon::parse($end_date)->format('d M Y') }}  
                </p>
              </td>
            </tr>
          </table>


          <table style="height: 35px;">
            <tr>
              <td style="width: 350px; vertical-align: middle;">
                <div class="investor-id valign-text-middle border-class-1 roboto-regular-normal-black-14px">Investor ID:{{ Auth::id()}}</div>
              </td>

              <td style="width: 300px; vertical-align: middle;">
                <div class="text- valign-text-middle border-class-1 roboto-regular-normal-black-13px">
                  Total Amount Invested: N{{number_format($investmentHistory->sum('pack_price'),2,'.',',')}}
                </div>
              </td>
            </tr>
          </table>


          <table style="height: 50px;">
            <tr>
              <td style="width: 350px; vertical-align: middle;">
                <div class="investor-id valign-text-middle border-class-1 roboto-regular-normal-black-14px">Closing Balance: N{{ number_format(Auth::user()->wallet->balance,2,'.',',')}}</div>
              </td>

              <td style="width: 300px; vertical-align: middle;">
                <div class="text- valign-text-middle border-class-1 roboto-regular-normal-black-13px">
                  Total ROI: N{{number_format($investmentHistory->sum('roi_amount'),2,'.',',')}}
                </div>
              </td>
            </tr>
          </table>

                
             <table class="frame-13" style="height: 100px;">
                 <thead style="background: #f2f2f2;">
                     <th>Item</th>
                     <th>Investment Date</th>
                     <th>Due Date</th>
                     <th>ROI (%)</th>
                     <th>Packs</th>
                     <th>ROI Amount</th>
                 </thead>

                 <tbody>
                     @if(count($investmentHistory) > 0 )
                     @foreach($investmentHistory as $row)
                     <tr>
                         <td>{{ $row->subcategory->subcategory_name}}</td>
                         <td>{{  Carbon\Carbon::parse($row->start_date)->format('d M Y') }}</td>
                         <td>{{  Carbon\Carbon::parse($row->end_date)->format('d M Y') }}</td>
                         <td>{{ $row->roi }}%</td>
                         <td>{{ $row->pack->pack_name }}</td>
                         <td>₦{{ number_format($row->roi_amount,2,'.',',') }}</td>
                     </tr>
                     @endforeach

                   @endif
                 </tbody>
             </table>
         


           
              <table style="height: 100px;">
                <tr>
                  <td style="width: 200px;">
                  </td>
    
                  <td style="width: 400px; vertical-align: middle;">
                   
                    <p class="address valign-text-middle border-class-1 roboto-regular-normal-black-11px">
                      Phresh Farms is a product of Phresh Farms Limited. <br />(Registration number RC 1603626)<br />All rights reserved.
                      <br />15A, Adebajo street, Kongi, Bodija, Ibadan, Nigeria.
                    </p>
                    
                  </td>
  
                  <td style="width: 200px;">
                  </td>
  
                </tr>
              </table>
          

            

            
          </div>

          
          <input type="button" value="Print" onclick="javascript:printDiv('sample')" /> 

          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script> -->
          
          <script>
           function printDiv(divID) 
            {
                  var divElements = document.getElementById(divID).innerHTML;
                  var oldPage = document.body.innerHTML;
                  document.body.innerHTML = 
                    "<html><head><title></title></head><body><div style='padding: 30px;'>" + 
                    divElements + "</div></body>";
                  window.print();
                  document.body.innerHTML = oldPage;
              }
          </script>
        </body>
        </html>