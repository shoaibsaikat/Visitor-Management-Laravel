<x-guest-layout>
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-semibold mb-4">Personal Information List</h1>
        <table class="min-w-full divide-y divide-gray-600">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Designation</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Phone</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-600">
                @foreach ($people as $info)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->designation }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->phone }}</td>
                        <td class="px-6 py-4 ">
                            <a href="#" class="text-indigo-400 hover:text-indigo-600">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-guest-layout>