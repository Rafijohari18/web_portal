@extends('layouts.backend')
@section('title', $data['title'])

@section('content')
<!-- Content -->

<section class="section">
    <div class="section-header">
        <h1>Users Manager /</span> {{ $data['title'] }}</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="text-lighter">Total Record : 
          <div class="badge badge-primary">{{ $data['total'] }}</div>
        </div>
        <div class="float-right">
          <a href="{{ route('permission.create') }}" class="btn btn-info" data-toggle="tooltip" data-original-title="click to add role"><i class="fas fa-plus"></i> Create</a></div>
        </div>
    
    </div>
   
    <!-- Filters -->
    <div class="ui-bordered px-4 pt-4 mb-4">
        <div class="form-row align-items-center">
        <div class="col-md mb-4">
        <form action="" method="GET">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="Search...">
        </div>
        <div class="col-md col-xl-2 mb-4">
            <label class="form-label d-none d-md-block">&nbsp;</label>
            <button type="submit" class="btn btn-secondary btn-block" data-toggle="tooltip" data-original-title="click to search"><i class="fas fa-search"></i></button>
        </form>
        </div>
        </div>
    </div>
    <!-- / Filters -->

    <div class="card">
    <div class="table-responsive">
    <table class="table table-striped table-md">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Guard Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
      </tr>
      @php
          $no = $data['permission']->firstItem();
      @endphp
      @foreach ($data['permission'] as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ ucfirst($item['name']) }}</td>
        <td>{{ $item['guard_name'] }}</td>
        <td>{{ date('d F Y', strtotime($item['created_at'])) }}</td>
        <td>{{ date('d F Y', strtotime($item['updated_at'])) }}</td>
        <td>
            <a href="{{ route('permission.edit', ['id' => $item['id']]) }}" class="btn icon-btn btn-sm btn-warning" data-toggle="tooltip" data-original-title="click to edit permission"><i class="ion-edit"></i></a>
            <a onclick="return confirm('Anda Yakin ? ')" href="{{ route('permission.destroy', ['id' => $item['id']])}}" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete permission">
                <i class="ion-ios-trash"></i>
              
            </a>
        </td>
      </tr>
      @endforeach

      
    </table>

    <hr class="m-0">
    
      @if ($data['total'] == 0)
      <br>
      <div class="d-flex justify-content-center"><strong style="color:red;"><i>!No Record From Permission!</i></strong></div>
      @endif
      <br>
      {{ $data['permission']->links() }}

  </div>

</div>

</section>
<!-- / Content -->
@endsection

@section('jsbody')
<script>
    $('.delete').click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
        title: 'Hapus role ?',
        text: "Anda yakin ingin menghapu!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $(this).find('form').submit();
        }
        })
    });
</script>
@endsection