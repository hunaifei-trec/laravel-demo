@extends('layouts.app')

@section('content')
    @include('layouts.message')

    <div class="row">
      <form class="form-inline" role="form">
          <div class="form-group">
              <label class="sr-only" for="student-name">name</label>
              <input name="Student[name]" value="{{ empty(Request('Student')['name']) ? '' : Request('Student')['name'] }}" type="text"
                    class="form-control" id="student-name" placeholder="please input name">
          </div>
          <div class="form-group">
              <label class="sr-only" for="student-age">age</label>
              <input name="Student[age]" value="{{ empty(Request('Student')['age']) ? '' : Request('Student')['age'] }}"  type="text"
                    class="form-control" id="student-age" placeholder="please input age">
          </div>
          <div style="margin-top:10px">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
      </form>
    </div>
    <div class="row" style="margin-top:20px">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Student List</h3>
        </div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>age</th>
                <th>sex</th>
                <th>created date</th>
                <th width="180">Operate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->sex($student->sex) }}</td>
                    <td>{{ date('Y-m-d', strtotime($student->created_at)) }}</td>
                    <td>
                        <a href="{{ url('student/detail', ['id' => $student->id]) }}">detail</a>
                        <a href="{{ url('student/update', ['id' => $student->id]) }}">update</a>
                        <a href="{{ url('student/delete', ['id' => $student->id]) }}"
                                onclick="if (confirm('You sure you want to delete it？') == false) return false;">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div style="float:right">
            {{ $students->appends(Request::input())->render() }}
        </div>
    </div>
</div>
@endsection
