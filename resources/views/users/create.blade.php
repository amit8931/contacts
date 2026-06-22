<x-app-layout>
    <x-slot:header>Users / New</x-slot:header>

    <div class="max-w-2xl space-y-4">
        <h1 class="text-2xl font-semibold tracking-tight">Add user</h1>

        <x-ui.card>
            <x-ui.card-content class="p-6">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <x-ui.label for="name">Full name <span class="text-destructive">*</span></x-ui.label>
                            <x-ui.input id="name" name="name" value="{{ old('name') }}" required autofocus />
                            @error('name') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <x-ui.label for="email">Email <span class="text-destructive">*</span></x-ui.label>
                            <x-ui.input id="email" type="email" name="email" value="{{ old('email') }}" required />
                            @error('email') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <x-ui.label for="password">Password <span class="text-destructive">*</span></x-ui.label>
                            <x-ui.input id="password" type="password" name="password" required />
                            @error('password') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <x-ui.label for="password_confirmation">Confirm password <span class="text-destructive">*</span></x-ui.label>
                            <x-ui.input id="password_confirmation" type="password" name="password_confirmation" required />
                        </div>

                        <div class="space-y-1.5 sm:col-span-2">
                            <x-ui.label for="role">Role <span class="text-destructive">*</span></x-ui.label>
                            <select id="role" name="role" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm focus-ring">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" @selected(old('role') === $role)>
                                        {{ ucwords(str_replace('_', ' ', $role)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
                            <p class="text-xs text-muted-foreground">
                                <strong>Clerk</strong>: number search only, max 10 results.
                                <strong>Manager</strong>: number search only, max 20 results.
                                <strong>Admin</strong>: full search, settings access.
                                <strong>Super Admin</strong>: everything.
                            </p>
                        </div>

                        <div class="space-y-1.5 sm:col-span-2">
                            <x-ui.label for="search_quota">Search quota <span class="text-xs font-normal text-muted-foreground">(Clerk &amp; Manager only — 0 = unlimited)</span></x-ui.label>
                            <x-ui.input id="search_quota" type="number" name="search_quota" value="{{ old('search_quota', 0) }}" min="0" placeholder="0 = unlimited" />
                            @error('search_quota') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
                            <p class="text-xs text-muted-foreground">Number of phone searches this user can perform. Set to 0 for unlimited.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-2 pt-2">
                        <a href="{{ route('users.index') }}">
                            <x-ui.button type="button" variant="outline">Cancel</x-ui.button>
                        </a>
                        <x-ui.button type="submit">Create user</x-ui.button>
                    </div>
                </form>
            </x-ui.card-content>
        </x-ui.card>
    </div>
</x-app-layout>
