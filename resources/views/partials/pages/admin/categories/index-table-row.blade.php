<tr>
    <td>
        <input id="{{ 'checkboxInputForCategory'.$category->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$category->id}}>
    </td>
    <td>
        <span>{{ $prefix ?? '' }} {{ $category->name ?: '' }}</span>
    </td>
    <td>
        <span>{{ $category->slug ?: '' }}</span>
    </td>
    <td>
        <span>{{ $category->parentCategory ? $category->parentCategory->name : '' }}</span>
    </td>
    <td class="row">
        <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$category->id" }}">
            <i class="material-icons">more_vert</i>
        </a>
        <ul id="{{ "dropdown-$category->id" }}" class="dropdown-content grey-text">
            <li><a href="{{ route('admin.categories.show', $category->id) }}" @cannot('category-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>
            <li><a href="{{ route('admin.categories.edit', $category->id) }}" @cannot('category-update') style="pointer-events: none; color: #e1e1e1;" @endcannot>Edit</a></li>
        </ul>
    </td>
</tr>
