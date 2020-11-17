@extends('layouts.backend')

@section('title', $data['title'])

@section('content')
<!-- Content -->

<div class="container-fluid flex-grow-1 container-p-y">
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
  

  <h4 class="font-weight-bold py-3 mb-4">
    <span class="text-muted font-weight-light">Pengaturan Akun /</span> {{ Auth::user()['name'] }} 
  </h4>

  <div class="card overflow-hidden">
    <div class="row no-gutters row-bordered row-border-light">
      <div class="col-md-3 pt-0">
        <div class="list-group list-group-flush account-settings-links">
          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Umum</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Ganti Kata Sandi</a>
     
        </div>
      </div>
      <div class="col-md-9">
        <form action="{{ route('users.update-profile', ['id' => Auth::user()['id']]) }}" method="POST">
          @csrf
          @method('PUT')
        <div class="tab-content">
          <div class="tab-pane fade show active" id="account-general">
          
            <div class="card-body media align-items-center">

                <img src="{{ Auth::user()['profile_photo_path'] != null ? asset('public/userfile/photo/'.Auth::user()['profile_photo_path']) : asset('asset/temp_backend/images/people.jpg')  }}" alt class="d-block ui-w-80" style="width:100px;height:auto;"> 

              <div class="media-body ml-4 mb-1">
                <label class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#modals-default">
                  Ganti Foto Profil
                </label> &nbsp; <br>
                <small>*Foto ini juga digunakan pada Kartu Peserta</small>
                @if (Auth::user()['profile_photo_path'] != null)
                <a href="javascript:void(0);" class="btn btn-outline-danger md-btn-flat delete"> Hapus
                <form action="{{ route('users.remove-photo', ['id' => Auth::user()['id']]) }}" method="POST">
                  @csrf
                  @method('PUT')                                            
                </form>
                </a>
                @endif
                <div class="text-light small mt-1">Type File( {{ strtoupper(Config::get('addon.validation_upload.format_photo')) }}), {{ Config::get('addon.validation_upload.pixel_photo_profile') }}. Max. ukuran file {{ Config::get('addon.validation_upload.upload_size') }}</div>
              </div>
            </div>
            <hr class="border-light m-0">
            </form>
            
           
            <form action="{{ route('users.update-profile', ['id' => Auth::user()['id']]) }}" method="POST">
            @csrf
            <div class="card-body">
             
             
              <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control mb-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()['name']) }}" placeholder="your name...">
                @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              </div>
            
              <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()['email']) }}" placeholder="your email..." readonly>
                @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              
              </div>
              

          

            
            </div>

          </div>

          <div class="tab-pane fade" id="account-change-password">
            <div class="card-body pb-2">

              <div class="form-group">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="your password...">
                @error('password')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label">Ulangi Kata Sandi Baru</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="your password confirmation...">
                @error('password_confirmation')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              </div>

            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br>
      
      </div>
      </form>
 
    
   

   
    
    </div>
  </div>


</div>
<!-- / Content -->

<div class="modal fade" id="modals-default">
  <div class="modal-dialog">
      <form class="modal-content" action="{{ route('users.change-photo', ['id' => Auth::user()['id']]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-header">
          <h5 class="modal-title">
          Change Your
          <span class="font-weight-light">Photo</span>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body">
          <div class="form-row">
          <div class="form-group col">
              <label class="form-label">Browse Photo :</label><br>
              <input type="hidden" name="oldphoto" value="{{ Auth::user()['avatar'] }}">
              <input type="file" name="photo" required>
          </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/temp_backend/vendor/css/pages/account.css') }}">
@endsection

@section('jsbody')
<script src="{{ asset('assets/temp_backend/js/ui_modals.js') }}"></script>
<script>
    $('.delete').click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
        title: 'Apa anda yakin ingin menghapus foto profil ?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
        if (result.value) {
            $(this).find('form').submit();
        }
        })
    });
    
   
</script>
@endsection