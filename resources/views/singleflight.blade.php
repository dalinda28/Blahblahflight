<x-base-layout>
    <div class="bg-purple-100">
        <div class="flex flex-col gap-8 max-w-7xl py-8 mx-auto">
            <div class="flex flex-col gap-2">
                <h1 class="text-xl">Flight from <b>{{ $flight->airport_inbound->country }}</b> to
                    <b>{{ $flight->airport_outbound->country }}</b>
                </h1>
            </div>
        </div>
    </div>
    <div class="flex-1 bg-gray-50">
        <div class="flex flex-col gap-4 max-w-7xl py-8 mx-auto">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between mb-4">
                    <div class="flex flex-col gap-1">
                        <p>{{ $flight->capacityLeft(1) }}</p>
                    </div>
                    <div>
                        <p class="italic text-gray-500">#{{ $flight->flightNumber }}</p>
                    </div>
                </div>
                <hr>
                <div class="flex gap-16 mt-8 mb-8">
                    <p>Departure :<br> {{ $flight->airport_inbound->city }},
                        {{ $flight->formatStartDate() }}</p>
                    <p>Arrival :<br> {{ $flight->airport_outbound->city }},
                        {{ $flight->formatEndDate() }} </p>
                    <p>Pilot :<br> {{ $flight->pilot->name }}</p>
                </div>
                <hr>
                <div class="flex justify-between mt-8">
                    <p class="text-2xl">{{ $flight->price }} € / sit</p>
                    <a class="btn" href="{{ route('bookflight', ['id' => $flight->id]) }}">Book
                        now</a>
                </div>
            </div>
        </div>
</x-base-layout>
