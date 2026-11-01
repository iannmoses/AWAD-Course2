@extends('layouts.app')
@section('title', 'Users & roles')
@section('content')
    <x-heading title="Users & roles" sub="Who can sign in and what they can do.">
        <x-btn :href="route('admin.users.create')" icon="plus">Add user</x-btn>
    </x-heading>

    <x-filter-bar :action="route('admin.users.index')">
        <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search name or email">
        <select name="role" class="input-field">
            <option value="">All roles</option>
            <option value="student" @selected(request('role') === 'student')>Student</option>
            <option value="lecturer" @selected(request('role') === 'lecturer')>Lecturer</option>
            <option value="admin" @selected(request('role') === 'admin')>Admin</option>
        </select>
    </x-filter-bar>

    <x-table :headers="['Name' => 'left', 'Email' => 'left', 'Role' => 'left', 'Actions' => 'center']">
        @forelse ($users as $user)
            @php $role = $user->getRoleNames()->first(); @endphp
            <tr class="border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                <td class="py-3 px-4"><x-person :name="$user->name" /></td>
                <td class="py-3 px-4 text-sm text-slate-500">{{ $user->email }}</td>
                <td class="py-3 px-4"><x-badge :color="['admin' => 'green', 'lecturer' => 'amber', 'student' => 'blue'][$role] ?? 'slate'">{{ ucfirst($role ?? 'none') }}</x-badge></td>
                <td class="py-3 px-4 text-center">
                    <x-actions :edit="route('admin.users.edit', $user)" :delete="route('admin.users.destroy', $user)" confirm="Delete this user?" />
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="py-8 text-center text-sm text-slate-500">No users found.</td></tr>
        @endforelse
    </x-table>

    <div class="mt-4">{{ $users->links() }}</div>
@endsection
