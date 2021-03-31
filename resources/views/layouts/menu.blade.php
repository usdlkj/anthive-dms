<li class="nav-item">
    <a href="{{route('projects.create')}}" class="nav-link">
        <p>+Create Project</p>
    </a>
</li>

<?php $user = Auth::user(); ?>
@foreach ($user->projects as $project)
<li class="nav-item">
    @if ($user->current_project_id == $project->id)
    <p class="nav-link active">{{$project->project_name}}</p>
    @else
    <a href="{{route('projects.documents.index', [$project->id])}}" class="nav-link">
        <p>{{$project->project_name}}</p>
    </a>
    @endif
</li>
@endforeach
