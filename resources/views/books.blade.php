<x-base-layout>

    <div class="container mx-auto">

        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-3">
                <div class="flex justify-between">
                    <h1 class="text-xl">My flights</h1>
                </div>

                <div class="flex items-center gap-3 mt-3">
                    <a class="btn {{ $incoming == 1 ? 'btn-active' : '' }}" href="?incoming=1">Incoming</a>
                    <a class="btn {{ $incoming == 0 ? 'btn-active' : '' }}" href="?incoming=0">Passed</a>
                </div>
            </div>
        </div>

        <table class="table-style mt-3 w-full">
            <thead>
                <th>#</th>
                <th>Inbound</th>
                <th>Inbound datetime</th>
                <th>Outbound</th>
                <th>Outbound datetime</th>
                <th>Comment</th>
                <th>Passengers</th>
            </thead>
            <tbody>
                @foreach (Auth::user()->books($incoming)->get() as $book)
                    <tr>
                        <th class="text-center hover:underline">
                            <a class="" href="#">{{ $book->flight->flightNumber }}</a>
                        </th>
                        <td class="text-center">{{ $book->flight->airport_inbound->country }} - {{ $book->flight->airport_inbound->city }}</td>
                        <td class="text-center">{{ date_create($book->flight->startDateTime)->format('m/d/Y \a\t h:i a') }}</td>
                        <td class="text-center">{{ $book->flight->airport_outbound->country }} - {{ $book->flight->airport_outbound->city }}</td>
                        <td class="text-center">{{ date_create($book->flight->endDateTime)->format('m/d/Y \a\t h:i a') }}</td>
                        <td class="text-center">{{ $book->comment}}</td>
                        <td class="text-center">{{ $book->passengers}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</x-base-layout>
