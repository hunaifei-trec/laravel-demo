@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">Student Detail</div>

      <table class="table table-bordered table-striped table-hover ">
          <tbody>
          <tr>
              <td width="50%">ID</td>
              <td>{{ $student->id }}</td>
          </tr>
          <tr>
              <td>Name</td>
              <td>{{ $student->name }}</td>
          </tr>
          <tr>
              <td>Age</td>
              <td>{{ $student->age }}</td>
          </tr>
          <tr>
              <td>Sex</td>
              <td>{{ $student->sex($student->sex) }}</td>
          </tr>
          <tr>
              <td>created date</td>
              <td>{{ date('Y-m-d', strtotime($student->created_at)) }}</td>
          </tr>
          <tr>
              <td>modified date</td>
              <td>{{ date('Y-m-d', strtotime($student->updated_at)) }}</td>
          </tr>
          </tbody>
      </table>
      <div class="panel-footer" style="text-align:right">
        <a href="/student/lists">back</a>
      </div>
  </div>
@endsection