<tr @if($level==0) class="bg-secondary" @endif >
    <td>{{ $module->id }}</td>
    <td>
        @for($i = 0; $i < $level; $i++)
            &nbsp;&nbsp;&nbsp;
        @endfor
        {{ $module->module_name }}
    </td>
    <td>{{ $module->module_route }}</td>
    <td>{{ $module->icon }}</td>
    <td>{!! $module->disabled ?' <span class="text-danger">Disabled</span>' : 'Enabled' !!}</td>
    <td>{{ $module->parent_id }}</td>
    <td>
        <a href="{{ route('module.add', $module->id) }}" class="btn btn-sm btn-warning">Edit</a>
        {{-- <form action="{{ route('module.delete', $module->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE') --}}
            <button type="button" data-id="{{ $module->id }}" onclick="deleteModule(this)" class="btn btn-sm btn-danger">Delete</button>
        {{-- </form> --}}
    </td>
</tr>
@foreach($module->subModules as $subModule)
    @include('AdminViews.Modules.submodules_row', ['module' => $subModule, 'level' => $level + 1])
@endforeach
