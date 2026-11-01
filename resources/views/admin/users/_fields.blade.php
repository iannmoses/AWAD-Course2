<x-input label="Full name" name="name" :value="$user?->name" placeholder="Full name" />
<x-input label="Email" name="email" type="email" :value="$user?->email" placeholder="name@mubs.ac.ug" />
<x-select label="Role" name="role" :options="$roles" :selected="$user?->getRoleNames()->first()" placeholder="Choose a role" hint="The role decides which permissions the user gets." />
<x-input :label="$user ? 'New password' : 'Temporary password'" name="password" type="password" :required="! $user" :hint="$user ? 'Leave blank to keep the current password.' : 'At least 8 characters.'" />
