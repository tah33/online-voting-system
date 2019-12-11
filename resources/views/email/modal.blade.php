  <div class="modal fade" id="modal-reset" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Reset Password</h4>
             </div>
        
            <form action="{{url('emails')}}" method="post">@csrf
              <div class="modal-body">
              <div class="form-group row">
                           <label for="minimum" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                           <div class="col-md-8">
              <input type="email" name="email" class="form-control" placeholder="Enter Your Email" style="padding: 20px;">
            </div>
          </div>
              <div class="modal-footer">
               <button type="submit" class="btn btn-primary justify-content-center">Reset Password</button>

            </form>
         </div>

             </div>
           </div>
           <!-- /.modal-content -->
         </div>
