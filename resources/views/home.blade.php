<x-base-layout>
    <form method="GET">
        @csrf
        <div class="bg-purple-100 flex-1">
            <div class="flex flex-col gap-8 max-w-7xl py-8 mx-auto ">
                <div class="flex flex-col gap-2">
                    <h1 class="text-3xl font-semibold">Welcome to Blablaflight !</h1>
                    <h2 class="text-2xl">Let's book a flight now !</h2>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-end">
                            <div class="flex flex-col w-64">
                                <label for="outbound">Your destination</label>
                                <select name="outbound" id="outbound">
                                    <option value="">-- chose your destination airport --</option>
                                    @foreach ($airports as $airport)
                                        <option @selected($airport->id == request()->outbound) value="{{ $airport->id }}">
                                            {{ $airport->country }} -
                                            {{ $airport->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col w-64">
                                <label for="inbound">Your origin</label>
                                <select name="inbound" id="inbound">
                                    <option value="">-- chose your origin airport --</option>
                                    @foreach ($airports as $airport)
                                        <option @selected($airport->id == request()->inbound) value="{{ $airport->id }}">
                                            {{ $airport->country }} -
                                            {{ $airport->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col w-64">
                                <label>Your start date</label>
                                <input type="date" id="startDateTime" name="startDateTime"
                                    value="{{ request()->startDateTime }}" min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="flex flex-col w-64">
                                <label>Your end date</label>
                                <input type="date" id="endDateTime" name="endDateTime"
                                    value="{{ request()->endDateTime }}" min="{{ date('Y-m-d') }}">
                            </div>
                            <input type="hidden" name="searching" value="true">
                            <button class="btn" type="submit">Validate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50">
            <div class="py-12  mx-auto max-w-7xl">
                @if (!empty($flights))
                    <div class="flex flex-col gap-8">
                        <div class="flex justify-between">
                            <h2 class="text-2xl">Your results - {{ $flights->total() }}
                                flight{{ $flights->total() > 0 ? 's' : '' }}</h2>
                            <select name="orderBy" onchange="this.form.submit()" name="" id="">
                                <option value="" disabled>Order by</option>
                                <option @selected('startDateTime.ASC' == request()->get('orderBy', 'startDateTime.ASC')) value="startDateTime.ASC">Start date ASC
                                </option>
                                <option @selected('startDateTime.DESC' == request()->get('orderBy', 'startDateTime.ASC')) value="startDateTime.DESC">Start date DESC
                                </option>
                                <option @selected('price.ASC' == request()->get('orderBy', 'startDateTime.ASC')) value="price.ASC">Price ASC</option>
                                <option @selected('price.DESC' == request()->get('orderBy', 'startDateTime.ASC')) value="price.DESC">Price DESC</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-3 gap-x-20 gap-y-12">
                            @foreach ($flights as $flight)
                                @include('components.flight-card')
                            @endforeach
                        </div>
                        <div>
                            {{ $flights->links() }}
                        </div>
                    </div>
                @else
                    <div>
                        <h2>No flights found</h2>
                    </div>
                @endif
            </div>
        </div>
    </form>


</x-base-layout>