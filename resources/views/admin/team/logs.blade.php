@extends('layouts.tabler')

@section('title')
    Team Logs
@endsection
@section('me')
    @parent
@endsection

@section('Damage')
<div class="container">
    <h2>Activity Logs for Team</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Activity</th>
                <th>Details</th>  
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->created_at }}</td>
                    <td>{{ $activity->causer->name }}</td>
                    <td>{{ $activity->description }}</td>
                    <td>
                        @if($activity->properties->isNotEmpty())
                            {{ json_encode($activity->properties) }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $activities->links() }}
</div>
@endsection