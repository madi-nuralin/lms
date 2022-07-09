@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>@lang('lesson/lessons.lesson'):</b> {{ $lesson->title }}</div>
                    <div class="card-body">
                        {!! $lesson->content !!}
                    </div>
		</div>
		@if ($lesson->course->teacher_id == auth()->user()->id)
		    {{ Form::open(['url' => route('attendance.update', ['lesson' => $lesson->id])]) }}
                    @method('PUT')
                    <div class="card">
                         <div class="card-header d-flex justify-content-between">
			      <h6>Attendance</h6>
                              <input class="btn btn-primary" type="submit" value="Update"/>
                         </div>
			 <div class="card-body">
				<select name="attendances[]" class="w-100" multiple>
					@foreach ($lesson->attendances as $attendance)
						@if ($attendance->status)
							<option value="{{ $attendance->id }}" selected>
								{{ $attendance->user->name }}
							</option>
						@else
							<option value="{{ $attendance->id }}">
								{{ $attendance->user->name }}
							</option>
						@endif
					@endforeach
				</select>
	                 </div>
		     </div>
		     {{ Form::close() }}
		@else
		    <div class="card">
			<div class="card-header">
				Attendance: {{ $lesson->attendances->firstWhere('user_id', auth()->user()->id)->status }}/1
			</div>
		    </div>
		@endif
            </div>
            <div class="col-md-4">
                <chat :user="{{ auth()->user() }}" :resource="{{ $lesson->id }}" :type="'lesson'"></chat>
            </div>
        </div>
    </div>
@endsection

