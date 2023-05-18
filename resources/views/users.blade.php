<!DOCTYPE html>
<html>
   <head>
      <title>Registered Users</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <style>
         tr.status-sent td:nth-child(4) {
         color: green;
         }
         tr.status-processing td:nth-child(4) {
         color: yellow;
         }
         tr.status-queued td:nth-child(4) {
         color: lightgrey;
         }
         tr.status-failed td:nth-child(4) {
         color: red;
         }
      </style>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $(document).ready(function () {
             var datatable = $('#users-table').DataTable({
                 processing: true,
                 serverSide: true,
                 pagination: true,
                 ajax: {
                     url: "{{ route('live-status') }}",
                     type: "GET",
                     data: function(d) {
                         d.length = $('#users-table').DataTable().page.len();
                         d.start = $('#users-table').DataTable().page.info().start;
                     }
                 },
                 columns: [
                     { data: 'name', name: 'name' },
                     { data: 'email', name: 'email' },
                     { data: 'address', name: 'address' },
                     { data: 'status', name: 'status'},
                 ],
                 lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                 createdRow: function(row, data, dataIndex) {
                        var status = data.status;
                        if (status === 'sent') {
                           $(row).addClass('status-sent');
                        } else if (status === 'processing') {
                           $(row).addClass('status-processing');
                        } else if (status === 'queued') {
                           $(row).addClass('status-queued');
                        } else if (status === 'failed') {
                           $(row).addClass('status-failed');
                        }
                  }
             });
         
             function updateDatatable() {
                  datatable.ajax.reload(null, false);
               }
         
               var intervalId = setInterval(updateDatatable, 3000);
               var stopChecking = false;

               function checkEmailStatus() {
                  $.ajax({
                     url: "{{ route('check-email-status') }}",
                     method: "GET",
                     success: function (response) {
                           if (response.allSent) {
                              stopChecking = true;
                              clearInterval(intervalId);
                           }
                     },
                     error: function (xhr, status, error) {
                           console.error(error);
                     }
                  });
               }

               setInterval(function () {
                  if (!stopChecking) {
                     checkEmailStatus();
                  }
               }, 5000);
         
               $('#exportForm').on('submit', function(e) {
                  e.preventDefault();
                  var columns = $(this).serializeArray().filter(item => item.name === 'columns[]').map(item => item.value);
                  var fileFormat = $(this).find('input[name="fileFormat"]:checked').val();
                  var fileName = $(this).find('input[name="fileName"]').val();
                  var url = "{{ route('export-data') }}";
                  url += '?columns=' + encodeURIComponent(columns.join(','));
                  url += '&fileFormat=' + encodeURIComponent(fileFormat);
                  url += "&fileName=" + encodeURIComponent(fileName);
                  window.open(url, '_blank');
               });
         });
      </script>
   </head>
   <body>
      <div class="container">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportModal">
         Export Data
         </button>
         <a href="{{url('/logout')}}" class="btn btn-danger" >
         Logout
         </a>
         <h1>Registered Users</h1>
         <table id="users-table" class="table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Status</th>
               </tr>
            </thead>
         </table>
      </div>
      <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exportModalLabel">Export Options</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="exportForm">
                     <div class="mb-3">
                        <label class="form-label">Select Columns:</label>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="columns[]" value="name" id="nameCheckbox">
                           <label class="form-check-label" for="nameCheckbox">
                           Name
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="columns[]" value="email" id="emailCheckbox">
                           <label class="form-check-label" for="emailCheckbox">
                           Email
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="columns[]" value="address" id="addressCheckbox">
                           <label class="form-check-label" for="addressCheckbox">
                           Address
                           </label>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">File Name:</label>
                        <input type="text" name="fileName" class="form-control" placeholder="Enter file name">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Select File Format:</label>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="fileFormat" value="xls" id="xlsRadio" checked>
                           <label class="form-check-label" for="xlsRadio">
                           .xls (Excel)
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="fileFormat" value="csv" id="csvRadio">
                           <label class="form-check-label" for="csvRadio">
                           .csv (CSV)
                           </label>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Export</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>