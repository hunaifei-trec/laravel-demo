@extends('layouts.app')

@section('content')
  @include('layouts.validator')

  <div class="panel panel-default">
      <div class="panel-heading col-sm-5">
        <h3 class="panel-title text-center">Add Student</h3>
      </div>
      <div class="panel-body">

          <form class="form-horizontal" method="post" action="">

              {{ csrf_field() }}

              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">name</label>

                  <div class="col-sm-5">
                      <input type="text" name="Student[name]"
                              value="{{ empty(old('Student')['name']) ? '' : old('Student')['name'] }}"
                              class="form-control" id="name" placeholder="please input name">
                  </div>
                  <div class="col-sm-5">
                      <p class="form-control-static text-danger">{{ $errors->first('Student.name') }}</p>
                  </div>
              </div>
              <div class="form-group">
                  <label for="age" class="col-sm-2 control-label">age</label>

                  <div class="col-sm-5">
                      <input type="text" name="Student[age]"
                              value="{{ empty(old('Student')['age']) ? '' : old('Student')['age'] }}"
                              class="form-control" id="age" placeholder="please input age">
                  </div>
                  <div class="col-sm-5">
                      <p class="form-control-static text-danger">{{ $errors->first('Student.age') }}</p>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">sex</label>

                  <div class="col-sm-5">
                      @foreach($student->sex() as $ind=>$val)
                          <label class="radio-inline">
                              <input type="radio" name="Student[sex]"
                                      value="{{ $ind }}"> {{ $val }}
                          </label>
                      @endforeach
                  </div>
                  <div class="col-sm-5">
                      <p class="form-control-static text-danger">{{ $errors->first('Student.sex') }}</p>
                  </div>
              </div>
              <div class="form-group col-sm-5">
                  <div class="col-sm-offset-2 col-sm-10 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
          </form>

      </div>
  </div>
@endsection