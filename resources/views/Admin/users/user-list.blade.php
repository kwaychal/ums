<table class="table-fixed w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 w-20">No.</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Address</th>
            <th class="px-4 py-2">Created At</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email}}</td>
            <td class="border px-4 py-2">{{ $user->address}}</td>
            <td class="border px-4 py-2">{{ $user->created_at}}</td>
            <td class="border px-4 py-2">
                <button wire:click="edit({{ $user->id }})"
                    class="flex px-4 py-2 bg-gray-500 text-gray-900 cursor-pointer">Edit</button>
                <button wire:click="delete({{ $user->id }})"
                    class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>