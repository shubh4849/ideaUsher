<!DOCTYPE html>
<html>
   <head>
      <title>Registered Users</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $(document).ready(function () {
             $('#users-table').DataTable({
                 processing: true,
                 serverSide: true,
                 pagination: true,
                 ajax: {
                     url: "{{ route('users.index') }}",
                     type: "GET",
                     data: function(d) {
                         d.length = $('#users-table').DataTable().page.len();
                         d.start = $('#users-table').DataTable().page.info().start;
                     }
                 },
                 columns: [
                     { data: 'name', name: 'name' },
                     { data: 'email', name: 'email' },
                     { data: 'image', name: 'image',
                         render: function(data, type, full, meta) {
                         if (data) {
                             return `<img src="{{asset(userImage.'/${data}')}}" width="50">`;
                         } else {
                             return '<img src="https://www.gravatar.com/avatar/?d=mp" width="50">';
                         }
                         }
                     },
                     { data: 'action', name: 'action'},
                 ],
                 lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
             });
         });
         
         $('#profile_image').change(function() {
         var reader = new FileReader();
         reader.onload = function(e) {
         $('#profileImagePreview').attr('src', e.target.result);
         }
         reader.readAsDataURL(this.files[0]);
         });
         
         $(document).on('click', '.editBtn', function () {
         var id = $(this).data('id');
         $.ajax({
         url: '/userEdit/' + id,
         type: 'GET',
         dataType: 'json',
         success: function (response) {
         $('#name').val(response.name);
         $('#email').val(response.email);
         $('#userId').val(response.id);
         if (response.profile_image) {
         $('#profile-image').attr('src', `{{asset(userImage.'/${response.profile_image}')}}`);
         } else {
         $('#profile-image').attr('src', '"https://www.gravatar.com/avatar/?d=mp');
         }
         $('#editUserModal').modal('show');
         }
         });
         });
         
      </script>
   </head>
   <body>
      <div class="container">
         <h1>Registered Users</h1>
         <table id="users-table" class="table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Profile Image</th>
                  <th>Actions</th>
               </tr>
            </thead>
         </table>
         <div class="modal" id="editUserModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Edit User</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <form id="editUserForm" enctype="multipart/form-data" method="post" action="{{url('updateUser')}}">
                     @csrf
                     <div class="modal-body">
                        <input type="hidden" id="userId" name="id">
                        <div class="form-group">
                           <label for="name">Name:</label>
                           <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                           <label for="email">Email:</label>
                           <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                           <img id="profileImagePreview" src="" class="mt-2" style="max-width: 100px; max-height: 100px;">
                           <label for="profile_image">Profile Image:</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                              <label class="custom-file-label" for="profile_image">Choose file</label>
                           </div>
                        </div>
                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>