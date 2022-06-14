<x-base-layout>

    <div class="flex-1 bg-purple-100">
        <div class="flex flex-col gap-4 max-w-7xl py-8 mx-auto">

            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-3">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-3xl font-semibold">My flights</h1>
                    </div>

                    <div class="flex items-center gap-3 mt-3">
                        <a class="btn {{ $incoming == 1 ? 'btn-active' : '' }}" href="?incoming=1">Incoming</a>
                        <a class="btn {{ $incoming == 0 ? 'btn-active' : '' }}" href="?incoming=0">Passed</a>
                    </div>
                </div>
                <div class="flex self-end">
                    <a href="{{ route('flight.new') }}" class="btn">New flight</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-0 p-6 bg-white border-b border-gray-200 mt-8">
                <table class="table-style mt-3 w-full">
                    <thead class="bg-purple-700 text-white">
                        <th>#</th>
                        <th>Inbound</th>
                        <th>Inbound datetime</th>
                        <th>Outbound</th>
                        <th>Outbound datetime</th>
                        <th>Price</th>
                        <th>Passagers</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->flights($incoming)->get() as $flight)
                            <tr>
                                <th class="text-center hover:underline">
                                    <a class="" href="#">{{ $flight->flightNumber }}</a>
                                </th>
                                <td class="text-center">{{ $flight->airport_inbound->country }} -
                                    {{ $flight->airport_inbound->city }}</td>
                                <td class="text-center">
                                    {{ date_create($flight->startDateTime)->format('m/d/Y \a\t h:i a') }}</td>
                                <td class="text-center">{{ $flight->airport_outbound->country }} -
                                    {{ $flight->airport_outbound->city }}</td>
                                <td class="text-center">
                                    {{ date_create($flight->endDateTime)->format('m/d/Y \a\t h:i a') }}</td>
                                <td class="text-center">{{ $flight->price }} $ / sit</td>
                                <td class="text-center">0 / {{ $flight->capacity }}</td>
                                <td class="text-center"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</x-base-layout>
