<x-base-layout>
    <div class="flex-1 bg-purple-100">
        <div class="flex flex-col gap-4 max-w-7xl py-8 mx-auto">
            <form action="{{ route('flight.store') }}" method="POST">
                @csrf
                <div class="flex justify-between">
                    <h1 class="text-3xl font-semibold">New flight</h1>
                </div>

                <div class="flex items-center justify-between">
                    <h2 class="mt-2"><span class="text-1xl"><span class="font-semibold text-purple-700">{{ Auth::user()->name }}</span>, fill this
                        form
                        to prepare your Flight :</h2>
                    <div class="flex gap-4">
                        <a href="{{ route('flight.list') }}" class="btn btn-active">Back</a>
                        <button class="btn">Submit</button>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200 mt-8">
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6">
                        <div class="flex flex-col gap-2">
                            <label for="inbound">Flight inbound</label>
                            <select name="inbound" id="inbound">
                                <option value="">-- chose your inbound airport --</option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->country }} -
                                        {{ $airport->city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="startDateTime">Inbound datetime</label>
                            <input type="datetime-local" name="startDateTime" id="startDateTime">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="outbound">Flight outbound</label>
                            <select name="outbound" id="outbound">
                                <option value="">-- chose your outbound airport --</option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->country }} -
                                        {{ $airport->city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="endDateTime">Outbound datetime</label>
                            <input type="datetime-local" name="endDateTime" id="endDateTime">
                        </div>


                        <div class="flex flex-col gap-2">
                            <label for="capacity">Plane capacity</label>
                            <input name="capacity" id="capacity" type="number" min="0" placeholder="ex : 50">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="price">Sit price</label>
                            <input name="price" id="price" type="text" placeholder="ex : 60.80">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-base-layout>
