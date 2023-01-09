@extends('layouts.app')

@section('content')
   <div class="">
        <div class="row">
            <div class="col-lg-6 m-auto">
              @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
               @endif
              <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Student Information
                        <a href="{{ url('/student') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('public/uploads/images/'.$student->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                       <div class="form-group mb-3">
                            <label for="">Candidate Name</label>
                            <input type="text" name="candidate_name" value="{{$student->candidate_name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Roll</label>
                            <input type="number" name="roll" value="{{$student->roll}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{$student->address}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Student List</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection