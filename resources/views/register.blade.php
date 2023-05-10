<!DOCTYPE html>
<html>
   <head>
      <title>Test</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <style>
         .error{
         color:red;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <form method="POST" action="" id="myForm">
            @csrf
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" class="form-control" id="name" name="name" required>
               <div class="invalid-feedback">Please enter your name</div>
            </div>
            <div class="form-group">
               <label for="email">Email address</label>
               <input type="email" class="form-control" id="email" name="email" required>
               <div class="invalid-feedback">Please enter a valid email address</div>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" required>
               <div class="invalid-feedback">Please enter a password</div>
            </div>
            <div class="form-group">
               <label for="password_confirmation">Confirm Password</label>
               <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
               <div class="invalid-feedback">Please confirm your password</div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
         </form>
         <a href="{{url('getUsers')}}" class="btn btn-primary">See all users</button>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $(document).ready(function() {
             jQuery.validator.addMethod("emailCustomFormat", function (value, element) {
             return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
         },"Please enter valid email address");
         $("#myForm").validate(
         {
         rules: { 
             name: {
                  required : true
              },
             "email": {
         required: true,
                     emailCustomFormat:true,
                     remote:"{{url('emailCheck')}}",
         },	
                 'password':{
                     required:true,
                     minlength:8,
                     maxlength:25,
                 },
                 'password_confirmation':{
                     required:true,
                     equalTo:"#password",
                 },
         },
         messages:
             {
                 "email": {
                     remote:"Looks like this email is already present with us!",
                  },
              }
          });
         });
      </script>