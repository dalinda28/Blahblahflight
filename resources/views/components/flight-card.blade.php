<div class="p-6 bg-white border border-gray-200 rounded flex flex-col gap-3 shadow">
    <div class="flex justify-between h-20">
        <div class="flex flex-col gap-1">
            <p class="text-xl">From <b>{{ $flight->airport_inbound->country }}</b> to <b>{{ $flight->airport_outbound->country }}</b></p>
            <p>{{ $flight->capacityLeft(1) }}</p>
        </div>
        <div>
            <p class="italic text-gray-500">#{{ $flight->flightNumber }}</p>
        </div>
    </div>
    <hr>
    <div class="flex flex-col gap-2">
        <p>Departure :<br> {{ $flight->airport_inbound->city }}, {{ $flight->formatStartDate() }}</p>
        <p>Arrival :<br> {{ $flight->airport_outbound->city }}, {{ $flight->formatEndDate() }} </p>
    </div>
    <div>
        <p>With {{ $flight->pilot->name }}</p>
    </div>
    <hr>
    <div class="flex justify-between mt-auto">
        <p class="text-2xl">{{ $flight->price }} € / sit</p>
        <a class="btn" href="{{ route( 'singleflight', ['id' => $flight->id]) }}">See details</a>
    </div>
</div>
