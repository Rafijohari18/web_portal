@extends('layouts.backend')

@section('title', $data['title'])

@section('content')
<!-- Content -->

<section class="section">
    <div class="section-header">
        <h1>Users Manager / {{ ucfirst(Request::segment(2)) }} /</span> {{ $data['title'] }} <span class="text-muted">{{ $data['type'] == 'edit' ? '#'.$data['users']['id'] : '' }}</h1>
    </div>


    <div class="card mb-4">
      <h6 class="card-header">
        <i class="fas fa-{{ $data['type'] == 'create' ? 'plus' : 'edit' }}"></i> {{ $data['type'] == 'create' ? 'Create User' : 'User / '.$data['users']['name'].'' }} 
      </h6>
      <div class="card-body">
        <form action="{{ $data['type'] == 'create' ? route('users.store') : route('users.update', ['id' => $data['users']['id']]) }}" method="POST">
            @csrf
            @if ($data['type'] == 'edit')
            @method('PUT')
            @endif
          <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['type'] == 'create' ? old('name') : old('name', $data['users']['name']) }}" placeholder="enter name...">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>


        

          <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Roles</label>
            <div class="col-sm-10">
                <select class="form-control selectpicker show-tick @error('status') is-invalid @enderror" id="roles" name="roles" data-style="btn-default">
                    <option value="">Select Role</option>
                    @foreach ($data['roles'] as $item)
                        <option value="{{ $item['name'] }}" {{ $data['type'] == 'create' ? old('roles') == $item['name'] ? 'selected' : ''  : old('roles', $data['users']['roles'][0]['name']) == $item['name'] ? 'selected' : '' }}> {{ ucfirst($item['name']) }}</option>
                    @endforeach
                </select>  
                @error('level')
                <div style="color:red;">{{ $message }}</div>
                @enderror
              </div>
          </div>

          
         
          <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['type'] == 'create' ? old('email') : old('email', $data['users']['email']) }}" placeholder="enter email...">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>



         
         
         

          <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="enter password...">
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Password Confirmation</label>
            <div class="col-sm-10">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="enter password confirmation...">
              @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10 ml-sm-auto">
              <button type="submit" class="btn btn-primary">{{ $data['type'] == 'create' ? 'Simpan' : 'Simpan Perubahan' }}</button>
              <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>

</section>
<!-- / Content -->
@endsection

@section('jsfoot')
<script>
  


</script>
@endsection
